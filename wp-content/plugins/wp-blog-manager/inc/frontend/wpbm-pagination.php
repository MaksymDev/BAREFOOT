<?php
if ( isset( $wpbm_option[ 'wpbm_display_pagination' ] ) && $wpbm_option[ 'wpbm_display_pagination' ] == 1 ) {

    $per_page = ($wpbm_option[ 'wpbm_post_number' ] == '') ? 1 : esc_attr( $wpbm_option[ 'wpbm_post_number' ] );
    $total_items = $rowCount;
    $total_page = $total_items / $per_page;
    if ( $total_items % $per_page != 0 ) {
        $total_page = intval( $total_page ) + 1;
    }

    if ( $wpbm_option[ 'wpbm_select_pagination' ] == 'standard_pagination' ) {
        $pagination_layout_class = isset( $wpbm_option[ 'wpbm_standard_page_template' ] ) ? 'wpbm-standard-page-' . esc_attr( $wpbm_option[ 'wpbm_standard_page_template' ] ) : 'wpbm-standard-page-template-1';
        $upper_limit = ($total_page <= 5) ? $total_page : 5;
        if ( isset( $wpbm_option[ 'wpbm_standard_page_template' ] ) && $wpbm_option[ 'wpbm_standard_page_template' ] == 'template-1' ) {
            $next_arrow = "<i class='fa fa-angle-double-right' aria-hidden='true'></i>";
            $prev_arrow = "<i class='fa fa-angle-double-left' aria-hidden='true'></i>";
        } else if ( isset( $wpbm_option[ 'wpbm_standard_page_template' ] ) && $wpbm_option[ 'wpbm_standard_page_template' ] == 'template-2' ) {
            $next_arrow = "<i class='fa fa-arrow-right' aria-hidden='true'></i>";
            $prev_arrow = "<i class='fa fa-arrow-left' aria-hidden='true'></i>";
        } else if ( isset( $wpbm_option[ 'wpbm_standard_page_template' ] ) && $wpbm_option[ 'wpbm_standard_page_template' ] == 'template-3' ) {
            $next_arrow = 'Next';
            $prev_arrow = 'Previous';
        } else if ( isset( $wpbm_option[ 'wpbm_standard_page_template' ] ) && $wpbm_option[ 'wpbm_standard_page_template' ] == 'template-4' ) {
            $next_arrow = 'Next';
            $prev_arrow = 'Prev';
        } else {
            $next_arrow = "<i class='fa fa-long-arrow-right' aria-hidden='true'></i>";
            $prev_arrow = "<i class='fa fa-long-arrow-left' aria-hidden='true'></i>";
        }
        ?>
        <div class="wpbm-pagination-block <?php echo $pagination_layout_class; ?>">
            <ul class="wpbm-inner-paginate">
                <?php
                for ( $i = 1; $i <= $upper_limit; $i ++ ) {
                    ?>
                    <li><a href="javascript:void(0);" data-total-page="<?php echo $total_page; ?>" data-layout-type="<?php echo esc_attr( $wpbm_option[ 'wpbm_select_layout' ] ); ?>" data-post-id="<?php echo $post_id; ?>" data-page-number="<?php echo $i; ?>" data-next-arrow="<?php echo $next_arrow; ?>" data-prev-arrow="<?php echo $prev_arrow; ?>" class= "<?php echo ($i == 1) ? 'wpbm-current-page' : ''; ?> wpbm-page-link"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="wpbm-next-page-wrap"><a href="javascript:void(0);" data-total-page="<?php echo $total_page; ?>" data-layout-type="<?php echo esc_attr( $wpbm_option[ 'wpbm_select_layout' ] ); ?>" data-post-id="<?php echo $post_id; ?>" data-page-number="2" data-next-arrow="<?php echo $next_arrow; ?>" data-prev-arrow="<?php echo $prev_arrow; ?>" class="wpbm-next-page"><?php echo $next_arrow; ?></a></li>
            </ul>
            <img src="<?php echo WPBM_IMG_DIR . '/ajax-loader-add.gif'; ?>" class="wpbm-ajax-loader" style="display:none;"/>
        </div>
        <?php
    } else if ( $wpbm_option[ 'wpbm_select_pagination' ] == 'load_more_button' ) {
        $load_more_layout_class = isset( $wpbm_option[ 'wpbm_load_more_template' ] ) ? 'wpbm-load-more-' . esc_attr( $wpbm_option[ 'wpbm_load_more_template' ] ) : 'wpbm-load-more-template-1';
        ?>
        <div class="wpbm-load-more-block <?php echo $load_more_layout_class; ?>">
            <a class="wpbm-load-more-trigger" href="javascript:void(0);"
               data-page-number="1"
               data-layout-type="<?php echo $wpbm_option[ 'wpbm_select_layout' ]; ?>"
               data-post-id="<?php echo $post_id; ?>"
               data-total-page="<?php echo $total_page; ?>"
               >
                   <?php
                   if ( isset( $wpbm_option[ 'wpbm_load_more_template' ] ) && $wpbm_option[ 'wpbm_load_more_template' ] == 'template-4' ) {
                       ?>
                    <span class="wpbm-top"></span><?php echo ($wpbm_option[ 'wpbm_load_more_text' ] != '') ? esc_attr( $wpbm_option[ 'wpbm_load_more_text' ] ) : __( 'Load More', WPBM_TD ); ?><span class="wpbm-bottom"></span>

                    <?php
                } else {
                    echo ($wpbm_option[ 'wpbm_load_more_text' ] != '') ? esc_attr( $wpbm_option[ 'wpbm_load_more_text' ] ) : __( 'Load More', WPBM_TD );
                }
                ?>
            </a>
            <?php $loader = isset( $wpbm_option[ 'wpbm_loader_preview_type' ] ) ? esc_attr( $wpbm_option[ 'wpbm_loader_preview_type' ] ) : 'loader-1'; ?>
            <img src="<?php echo WPBM_IMG_DIR . '/loader/' . $loader . '.gif'; ?>" class="wpbm-ajax-loader" style="display:none;"/>
        </div>
        <?php
    } else {
        ?>
        <div class="wpbm-infinite-load">
            <a class="wpbm-infinite-load-trigger" href="javascript:void(0);"
               data-page-number="1"
               data-layout-type="<?php echo $wpbm_option[ 'wpbm_select_layout' ]; ?>"
               data-post-id="<?php echo $post_id; ?>"
               data-total-page="<?php echo $total_page; ?>"
               >
            </a>
            <?php $loader = isset( $wpbm_option[ 'wpbm_loader_preview_type' ] ) ? esc_attr( $wpbm_option[ 'wpbm_loader_preview_type' ] ) : 'loader-1'; ?>
            <img src="<?php echo WPBM_IMG_DIR . '/loader/' . $loader . '.gif'; ?>" class="wpbm-infinite-loader" style="display:none;"/>
        </div>
        <?php
    }
}