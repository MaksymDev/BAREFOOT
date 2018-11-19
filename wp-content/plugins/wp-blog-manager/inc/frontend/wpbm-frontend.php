<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$wpbm_mobile_detector = new WPBM_Mobile_Detect();
$post_id = $atts[ 'id' ];
//global $post;
$wpbm_option = get_post_meta( $post_id, 'wpbm_option', true );
//$wpbm_extra_option = get_post_meta( $post_id, 'wpbm_extra_option', true );
$class_layout = 'wpbm-layout-' . $wpbm_option[ 'wpbm_select_layout' ] . '-section';
$random_num = rand( 111111111, 999999999 );
if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) {
    if ( isset( $wpbm_option[ 'wpbm_image_design' ] ) && $wpbm_option[ 'wpbm_image_design' ] == 'normal' ) {
        if ( isset( $wpbm_option[ 'list_image_position' ] ) && $wpbm_option[ 'list_image_position' ] == 'left' ) {
            $wpbm_layout_class = 'wpbm-list-' . $wpbm_option[ 'wpbm_list_template' ] . ' wpbm-list wpbm-left-image';
        } else {
            $wpbm_layout_class = 'wpbm-list-' . $wpbm_option[ 'wpbm_list_template' ] . ' wpbm-list wpbm-right-image';
        }
    } else {
        if ( isset( $wpbm_option[ 'list_image_position' ] ) && $wpbm_option[ 'list_image_position' ] == 'left' ) {
            $wpbm_layout_class = 'wpbm-circular-list-' . $wpbm_option[ 'wpbm_list_circular_template' ] . ' wpbm-list wpbm-left-image';
        } else {
            $wpbm_layout_class = 'wpbm-circular-list-' . $wpbm_option[ 'wpbm_list_circular_template' ] . ' wpbm-list wpbm-right-image';
        }
    }
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'grid' ) {

    //  global $wpbm_mobile_detector;
    $desktop = esc_attr( $wpbm_option[ 'desktop_column' ] );
    $mobile = esc_attr( $wpbm_option[ 'mobile_column' ] );
    $tablet = esc_attr( $wpbm_option[ 'tablet_column' ] );
    if ( $wpbm_mobile_detector -> isMobile() && ! $wpbm_mobile_detector -> isTablet() ) {
        $wpbm_layout_class = 'wpbm-grid-' . $wpbm_option[ 'wpbm_grid_template' ] . ' wpbm-grid' . ' wpbm-mobile-col-' . $mobile;
    } else if ( $wpbm_mobile_detector -> isTablet() ) {
        $wpbm_layout_class = 'wpbm-grid-' . $wpbm_option[ 'wpbm_grid_template' ] . ' wpbm-grid' . ' wpbm-tablet-col-' . $tablet;
    } else {
        $wpbm_layout_class = 'wpbm-grid-' . $wpbm_option[ 'wpbm_grid_template' ] . ' wpbm-grid' . ' wpbm-desktop-col-' . $desktop;
    }
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'carousel' ) {
    if ( isset( $wpbm_option[ 'wpbm_carousel_template' ] ) && $wpbm_option[ 'wpbm_carousel_template' ] == 'template-3' ) {
        $wpbm_layout_class = 'wpbm-car-' . $wpbm_option[ 'wpbm_carousel_template' ] . ' wpbm-car-outer-wrap wpbm-upper-arrow';
    } else {
        $wpbm_layout_class = 'wpbm-car-' . $wpbm_option[ 'wpbm_carousel_template' ] . ' wpbm-car-outer-wrap';
    }
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'masonry' ) {
    $wpbm_layout_class = 'wpbm-masonry-wrapper' . ' wpbm-masonry-' . $wpbm_option[ 'wpbm_masonry_template' ];
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'timeline' ) {
    if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'vertical' ) {
        $wpbm_layout_class = 'wpbm-vertical-timeline' . ' wpbm-ver-timeline-' . $wpbm_option[ 'timeline_vertical_template' ];
    } else if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'horizontal' ) {
        $wpbm_layout_class = 'wpbm-horizontal-timeline' . ' wpbm-hor-timeline-' . $wpbm_option[ 'timeline_horizontal_template' ];
    } else if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'left' ) {
        $wpbm_layout_class = 'wpbm-left-timeline' . ' wpbm-left-timeline-' . $wpbm_option[ 'timeline_left_template' ];
    } else {
        $wpbm_layout_class = 'wpbm-right-timeline' . ' wpbm-right-timeline-' . $wpbm_option[ 'timeline_right_template' ];
    }
} else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) {
    $wpbm_layout_class = 'wpbm-slider-wrapper' . ' wpbm-slider-' . $wpbm_option[ 'wpbm_slider_template' ];
}
//Content Block
else {
    if ( $wpbm_option[ 'wpbm_content_template' ] == 'template-7' ) {
        $wpbm_layout_class = 'wpbm-content-block-container' . ' wpbm-content-' . $wpbm_option[ 'wpbm_content_template' ] . ' wpbm-img-background';
    } else {
        $wpbm_layout_class = 'wpbm-content-block-container' . ' wpbm-content-' . $wpbm_option[ 'wpbm_content_template' ];
    }
}
?>
<div class="wpbm-post-outer-wrapper-<?php echo $random_num; ?> <?php
if ( $wpbm_option[ 'wpbm_select_pagination' ] == 'infinite_scroll' ) {
    echo 'wpbm-infinite-scroll-wrapper';
}
?> wpbm-main-blog-wrapper <?php echo esc_attr( $wpbm_layout_class ); ?>" <?php if ( $wpbm_option[ 'wpbm_select_layout' ] == 'carousel' ) { ?>

         data-column = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_column' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_column' ] );
         }
         ?>"
         data-controls = "<?php
         if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_nav_controls' ] );
         }
         ?>"
         data-auto = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_auto' ] );
         }
         ?>"
         data-speed = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_speed' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_speed' ] );
         }
         ?>"
         data-pager = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_pager' ] );
         }
         ?>"
         data-template = "<?php
         if ( isset( $wpbm_option[ 'wpbm_carousel_template' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_carousel_template' ] );
         }
         ?>"
         <?php
     }
     if ( $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) {
         ?>
         data-template = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slider_template' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slider_template' ] );
         }
         ?>"
         data-controls = "<?php
         if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_nav_controls' ] );
         }
         ?>"
         data-auto = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_auto' ] );
         }
         ?>"
         data-speed = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_speed' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_speed' ] );
         }
         ?>"
         data-pager = "<?php
         if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) ) {
             echo esc_attr( $wpbm_option[ 'wpbm_slide_pager' ] );
         }
         ?>"
     <?php }
     ?>

     data-id="wpbm_<?php
     echo rand( 1111111, 9999999 );
     ?>">
         <?php
         //Filter tabs
         if ( $wpbm_option[ 'wpbm_select_layout' ] == 'grid' || $wpbm_option[ 'wpbm_select_layout' ] == 'masonry' ) {

             if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
                 include(WPBM_PATH . 'inc/frontend/wpbm-filter-collect.php');
             }
         }
         if ( $wpbm_option[ 'wpbm_select_layout' ] == 'grid' || ($wpbm_option[ 'wpbm_select_layout' ] == 'timeline' && $wpbm_option[ 'timeline_layout' ] == 'vertical') || $wpbm_option[ 'wpbm_select_layout' ] == 'list' || $wpbm_option[ 'wpbm_select_layout' ] == 'masonry' ) {
             ?>
        <div class="<?php echo esc_attr( $class_layout ); ?>">
            <?php
        }

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
                if(!empty( $wpbm_option[ 'wpbm_blog' ])){
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
        $args = array(
            'post_type' => $post_type,
            'order' => $order,
            'orderby' => $order_by,
            'posts_per_page' => $post_number,
            'post_status' => $status
                //'paged' => $paged
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

        include(WPBM_PATH . 'inc/frontend/wpbm-template.php');
        if ( $wpbm_option[ 'wpbm_select_layout' ] == 'grid' || ($wpbm_option[ 'wpbm_select_layout' ] == 'timeline' && $wpbm_option[ 'timeline_layout' ] == 'vertical') || $wpbm_option[ 'wpbm_select_layout' ] == 'list' || $wpbm_option[ 'wpbm_select_layout' ] == 'masonry' ) {
            ?>
        </div>
        <?php
        include(WPBM_PATH . 'inc/frontend/wpbm-pagination.php');
    }
    ?>
</div>



