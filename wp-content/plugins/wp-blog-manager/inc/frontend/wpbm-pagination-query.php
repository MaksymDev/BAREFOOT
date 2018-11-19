<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$wpbm_mobile_detector = new WPBM_Mobile_Detect();
$post_id = intval( $_POST[ 'post_id' ] );
$wpbm_option = get_post_meta( $post_id, 'wpbm_option', true );

if ( isset( $wpbm_option[ 'wpbm_post_excerpt' ] ) ) {
    $excerpt = $wpbm_option[ 'wpbm_post_excerpt' ];
}
if ( isset( $wpbm_option[ 'wpbm_post_number' ] ) ) {
    $post_number = $wpbm_option[ 'wpbm_post_number' ];
} else {
    $post_number = 4;
}
if ( isset( $wpbm_option[ 'wpbm_select_order' ] ) ) {
    $order = $wpbm_option[ 'wpbm_select_order' ];
} else {
    $order = 'DESC';
}
if ( isset( $wpbm_option[ 'wpbm_select_orderby' ] ) ) {
    $order_by = $wpbm_option[ 'wpbm_select_orderby' ];
} else {
    $order_by = 'date';
}
if ( isset( $wpbm_option[ 'wpbm_select_post_status' ] ) ) {
    $status = $wpbm_option[ 'wpbm_select_post_status' ];
} else {
    $status = 'publish';
}
if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) ) {
    $date_format = $wpbm_option[ 'wpbm_date_format_post' ];
} else {
    $date_format = '';
}
if ( isset( $wpbm_option[ 'post_type' ] ) ) {
    $post_type = $wpbm_option[ 'post_type' ];
}


/*
 * Condition for taxonomy
 */
if ( isset( $wpbm_option[ 'wpbm_show_taxonomy_query' ] ) && $wpbm_option[ 'wpbm_show_taxonomy_query' ] == '1' ) {
    $tax = $wpbm_option[ 'select_post_taxonomy' ];
    if ( $wpbm_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) {
        if ( $wpbm_option[ 'simple_taxonomy_terms' ] == '' ) {
            $terms = get_terms( $tax, array( 'hide_empty' => false ) );
            $term_ids = wp_list_pluck( $terms, 'term_id' );
            $id = implode( ", ", array_keys( $term_ids ) );
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $id )
                ), );
        } else {
            $simple_term = $wpbm_option[ 'simple_taxonomy_terms' ];
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => $simple_term
                ), );
        }
    }
    /*
     * multiple taxonomy tax query
     */ else {
        $relation = $wpbm_option[ 'wpbm_multiple_tax_relation' ];
        $first_term_array = $wpbm_option[ 'taxonomy_terms' ];
        $first_term_list = substr( implode( ", ", $first_term_array ), 0 );
        $blog_array = array( 'relation' => $relation );
        $blog_array[] = array(
            'taxonomy' => $tax,
            'field' => 'term_id',
            'terms' => array( $first_term_list ),
        );
        foreach ( $wpbm_option[ 'wpbm_blog' ] as $blog_key => $blog_detail ) {
            $tax = $wpbm_option[ 'wpbm_blog' ][ $blog_key ][ 'multiple_post_taxonomy' ];
            $operator = $wpbm_option[ 'wpbm_blog' ][ $blog_key ][ 'wpbm_terms_operator' ];
            $term = $wpbm_option[ 'wpbm_blog' ][ $blog_key ][ 'multiple_taxonomy_terms' ];
            $term_collection = substr( implode( ", ", $term ), 0 );
            if ( isset( $wpbm_option[ 'wpbm_blog' ][ $blog_key ][ 'wpbm_enable_operator' ] ) && $wpbm_option[ 'wpbm_blog' ][ $blog_key ][ 'wpbm_enable_operator' ] == '1' ) {
                $blog_array[] = array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $term_collection ),
                    'operator' => $operator,
                );
            } else {
                $blog_array[] = array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $term_collection ),
                );
            }
        }

        $tax_query[] = $blog_array;
    }
}

/*
 * Condition for custom field
 */
if ( isset( $wpbm_option[ 'wpbm_show_custom_query' ] ) && $wpbm_option[ 'wpbm_show_custom_query' ] == '1' ) {
    if ( $wpbm_option[ 'meta_keys_type' ] == 'pre-available' ) {
        $meta_key = $wpbm_option[ 'pre_meta_key' ];
    } else {
        $meta_key = $wpbm_option[ 'wpbm_other_meta_key' ];
    }
    if ( $wpbm_option[ 'wpbm_meta_value_type' ] == 'string' ) {
        $meta_value = $wpbm_option[ 'wpbm_meta_value' ];
    } else {
        $meta_value = $wpbm_option[ 'wpbm_meta_value_number' ];
    }
    $compare = $wpbm_option[ 'wpbm_compare_operator' ];
    if ( $wpbm_option[ 'wpbm_custom_field_type' ] == 'single_field' ) {
        $meta_value = $wpbm_option[ 'wpbm_meta_value_type' ];
        $meta_query = array(
            array(
                'key' => $meta_key,
                'value' => $meta_value,
                'compare' => $compare,
            ),
        );
    }
    /*
     * Multiple field
     */ else {
        $meta_array = array();
        $meta_array[] = array(
            'key' => $meta_key,
            'value' => $meta_value,
            'compare' => $compare,
        );
        foreach ( $wpbm_option[ 'wpbm_custom' ] as $custom_key => $custom_detail ) {
            if ( $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'multiple_meta_key_type' ] == 'pre-available' ) {
                $multi_meta_key = $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_pre_multiple_meta_key' ];
            } else {
                $multi_meta_key = $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_multiple_other_key' ];
            }
            $multi_meta_value = $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_multiple_meta_value' ];
            $multi_compare = $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_compare_operator' ];
            $multi_type = $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_field_compare_type' ];
            if ( isset( $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_show_type_filter' ] ) && $wpbm_option[ 'wpbm_custom' ][ $custom_key ][ 'wpbm_show_type_filter' ] == '1' ) {
                $meta_array[] = array(
                    'key' => $multi_meta_key,
                    'value' => $multi_meta_value,
                    'type' => $multi_type,
                    'compare' => $multi_compare,
                );
            } else {
                $meta_array[] = array(
                    'key' => $multi_meta_key,
                    'value' => $multi_meta_value,
                    'compare' => $multi_compare,
                );
            }
        }
        $meta_query[] = $meta_array;
    }
}
/*
 * Condition for search keyword
 */
if ( isset( $wpbm_option[ 'wpbm_show_keyword_query' ] ) && $wpbm_option[ 'wpbm_show_keyword_query' ] == '1' ) {

    if ( ! empty( $wpbm_option[ 'wpbm_search_keyword' ] ) ) {
        $keyword = $wpbm_option[ 'wpbm_search_keyword' ];
    }
}
/*
 * Condition for popular post
 */
if ( isset( $wpbm_option[ 'wpbm_show_popular_query' ] ) && $wpbm_option[ 'wpbm_show_popular_query' ] == '1' ) {
    if ( $wpbm_option[ 'wpbm_select_popular' ] == 'view' ) {
        $view_meta = 'post_views_count';
    }
}
$page_num = sanitize_text_field( $_POST[ 'page_num' ] );
$offset = ($page_num - 1) * $post_number;
$args = array(
    'post_type' => $post_type,
    'order' => $order,
    'orderby' => $order_by,
    'posts_per_page' => $post_number,
    'post_status' => $status,
    'offset' => $offset
);
if ( ! empty( $tax_query ) ) {
    $args[ 'tax_query' ] = $tax_query;
}
if ( ! empty( $keyword ) ) {
    $args[ 's' ] = $keyword;
}
if ( ! empty( $meta_query ) ) {
    $args[ 'meta_query' ] = $meta_query;
}
if ( ! empty( $view_meta ) ) {
    $args[ 'meta_key' ] = $view_meta;
}
//$this -> print_array( $args );
include(WPBM_PATH . 'inc/frontend/wpbm-pagination-template.php');




