<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$query = new WP_Query( $args );

$rowCount = $query -> found_posts;
$class_layout = 'wpbm-layout-' . $wpbm_option[ 'wpbm_select_layout' ] . '-section';

if ( $query -> have_posts() ) {
    $display_content = isset( $wpbm_option[ 'wpbm_display_content' ] ) ? esc_attr( $wpbm_option[ 'wpbm_display_content' ] ) : '0';

    if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'timeline' ) {
        $current_date = '';
    }
    if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'timeline' ) {
        if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'vertical' ) {
            ?>
            <div class="wpbm-clearfix wpbm-blog-cover">
                <?php
                while ( $query -> have_posts() ) {

                    $query -> the_post();
                    $product_post_id = get_the_ID();
                    $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
                    include(WPBM_PATH . 'inc/frontend/content/wpbm-timeline.php');
                }
                ?></div>
            <?php
        } else if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'horizontal' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-horizontal.php');
        }
    } else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'masonry' ) {
        $wpbm_row = 1;
        ?>
        <div class="wpbm-masonry-item-wrap" data-masonary-id="wpbm_<?php
        echo rand( 1111111, 9999999 );
        ?>">
            <div class="wpbm-masonry-sizer"></div>

            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $product_post_id = get_the_ID();
                $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
                include(WPBM_PATH . 'inc/frontend/content/wpbm-masonry.php');
            }
            ?>

        </div>
        <?php
    } else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'content-block' ) {
        $wpbm_row = 1;
        if ( $wpbm_option[ 'wpbm_content_template' ] == 'template-7' ) {
            ?>
            <div class="wpbm-seven-content wpbm-clearfix">
                <span></span>
                <div class="wpbm-mag-wrapper">
                <?php } else {
                    ?>
                    <div class="wpbm-mag-wrapper wpbm-clearfix">
                        <?php
                    }
                    while ( $query -> have_posts() ) {
                        $query -> the_post();
                        $product_post_id = get_the_ID();
                        $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
                        include(WPBM_PATH . 'inc/frontend/content/wpbm-maglayout.php');
                    }
                    ?>
                </div>
                <?php if ( $wpbm_option[ 'wpbm_content_template' ] == 'template-7' ) {
                    ?>
                </div>
                <?php
            }
            if ( $wpbm_option[ 'wpbm_content_template' ] == 'template-1' || $wpbm_option[ 'wpbm_content_template' ] == 'template-2' || $wpbm_option[ 'wpbm_content_template' ] == 'template-3' || $wpbm_option[ 'wpbm_content_template' ] == 'template-4' || $wpbm_option[ 'wpbm_content_template' ] == 'template-6' || $wpbm_option[ 'wpbm_content_template' ] == 'template-7' || $wpbm_option[ 'wpbm_content_template' ] == 'template-8' || $wpbm_option[ 'wpbm_content_template' ] == 'template-10' ) {
                ?>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    } else {
        $wpbm_row = 1;
        while ( $query -> have_posts() ) {
            $query -> the_post();

            $product_post_id = get_the_ID();
            $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
            if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) {
                include(WPBM_PATH . 'inc/frontend/content/wpbm-list.php');
            } else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'grid' ) {
                include(WPBM_PATH . 'inc/frontend/content/wpbm-grid.php');
            } else if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'carousel' ) {
                include(WPBM_PATH . 'inc/frontend/content/wpbm-carousel.php');
            }
            //slider
            else {
                include(WPBM_PATH . 'inc/frontend/content/wpbm-slider.php');
            }
        }
    }
} else {
    _e( 'No post found', WPBM_TD );
}

wp_reset_postdata();
