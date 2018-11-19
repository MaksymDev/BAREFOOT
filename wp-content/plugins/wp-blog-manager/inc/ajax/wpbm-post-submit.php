<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$fetch_type = sanitize_text_field( $_POST[ 'fetch_type' ]);
$desc_length = sanitize_text_field( $_POST[ 'desc_length' ]);
$key = $this -> wpbm_generate_random_string( 15 );
$post_key = 'post_' . $key;
if ( $fetch_type === 'category' || $fetch_type === 'tag' || $fetch_type === 'author' || $fetch_type === 'post_type' ) {
    $checked_id = sanitize_text_field( $_POST[ 'checked_id' ]);
    $total_post = count( $checked_id );
    $post_title = sanitize_text_field( $_POST[ 'checked_post' ]);
    $post_content = sanitize_text_field( $_POST[ 'post_content' ]);
    $cat_list = sanitize_text_field( $_POST[ 'cat_list' ]);
    $post_tag = sanitize_text_field( $_POST[ 'post_tag' ]);
    $author_name =sanitize_text_field($_POST[ 'author_name' ]);
    $comment_count = sanitize_text_field($_POST[ 'comment' ]);
    $post_date = sanitize_text_field( $_POST[ 'post_date' ]);
    $image_url = sanitize_text_field( $_POST[ 'image_url' ]);
    $post_link = sanitize_text_field( $_POST[ 'post_link' ]);

    for ( $i = 1; $i <= $total_post; $i ++ ) {
        $title = $post_title[ $i - 1 ];
        $content = $post_content[ $i - 1 ];
        $link = $post_link[ $i - 1 ];
        $date = $post_date[ $i - 1 ];
        $tag = $post_tag[ $i - 1 ];
        $category = $cat_list[ $i - 1 ];
        $author = $author_name [ $i - 1 ];
        $comment = $comment_count[ $i - 1 ];
        $link = $post_link[ $i - 1 ];
        include( WPBM_PATH . 'inc/ajax/wpbm-content.php' );
    }
} else {
    $post_number = sanitize_text_field( $_POST[ 'post_number' ] );
    if ( $fetch_type === 'popular_post' ) {
        ?>
        <ul>
            <?php
            global $post;
            $args = array( 'numberposts' => $post_number,
                'orderby' => 'meta_value', /* this will look at the meta_key you set below */
                'meta_key' => 'post_views_count',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish' );
            $myposts = get_posts( $args );
            $this -> print_array( $myposts );
            foreach ( $myposts as $post ) : setup_postdata( $post );
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php
    } else {

        $args = array( 'numberposts' => $post_number );
        $recent_posts = wp_get_recent_posts( $args );
        foreach ( $recent_posts as $post ) {
            echo $desc_length;
            $post_id = $post[ 'ID' ];
            $title = $post[ 'post_title' ];
            $content = $post[ 'post_content' ];
            $author_id = $post[ 'post_author' ];
            $comment = $post[ 'comment_count' ];
            $date = get_the_date( 'M d, Y', $post_id );
            $user = get_userdata( $author_id );
            $author = $user -> user_login;
            $category = get_the_category_list( ',', '', $post_id );
            $tag = get_the_tag_list( '', ',', '', $post_id );
            $image_url = get_the_post_thumbnail_url( $post_id, 'full' );
            $link = get_permalink( $post_id );
            include( WPBM_PATH . 'inc/ajax/wpbm-content.php' );
        }
    }
}