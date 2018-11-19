<div class="wpbm-general-outer-wrap">
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-show-content" class="wpbm-show-content">
            <?php _e( 'Show Content', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-display-content wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_display_content' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_display_content' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_display_content]" <?php if ( isset( $wpbm_option[ 'wpbm_display_content' ] ) && $wpbm_option[ 'wpbm_display_content' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show posts content in the frontend.', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-content-container-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_display_content' ] ) && $wpbm_option[ 'wpbm_display_content' ] == '1' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Post Content', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label><input type="radio" value="full-text" name="wpbm_option[post_content]" <?php
                    if ( isset( $wpbm_option[ 'post_content' ] ) ) {
                        checked( $wpbm_option[ 'post_content' ], 'full-text' );
                    }
                    ?> class="wpbm-post-content"/><?php _e( "Full Text", WPBM_TD ); ?></label>
                <label><input type="radio" value="excerpt" name="wpbm_option[post_content]" <?php
                    if ( isset( $wpbm_option[ 'post_content' ] ) ) {
                        checked( $wpbm_option[ 'post_content' ], 'excerpt' );
                    }
                    ?>  class="wpbm-post-content"/><?php _e( 'Excerpt Text', WPBM_TD ); ?></label>
                <div class="wpbm-excerpt-wrap" <?php if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'excerpt' ) { ?> style="display:block;" <?php } else {
                        ?>
                         style = "display:none;"
                         <?php
                     }
                     ?> >
                    <input type="number" class="wpbm-post-excerpt" min="10" name="wpbm_option[wpbm_post_excerpt]"  value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_post_excerpt' ] ) ) {
                        echo $wpbm_option[ 'wpbm_post_excerpt' ];
                    } else {
                        echo '15';
                    }
                    ?>"/>
                    <p class="description"><?php _e( 'Enter the length of post content', WPBM_TD ) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-post-option-wrap">
        <label><?php _e( 'Number of Post', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <input type="number" class="wpbm-post-number" min="1" name="wpbm_option[wpbm_post_number]"  value="<?php
            if ( isset( $wpbm_option[ 'wpbm_post_number' ] ) ) {
                echo $wpbm_option[ 'wpbm_post_number' ];
            } else {
                echo '5';
            }
            ?>"/>
            <p class="description"><?php _e( 'Enter the number of post to show in frontend', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-show-pagination" class="wpbm-show-pagination">
            <?php _e( 'Show Pagination', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-display-pagination wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_display_pagination' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_display_pagination' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_display_pagination]" <?php if ( isset( $wpbm_option[ 'wpbm_display_pagination' ] ) && $wpbm_option[ 'wpbm_display_pagination' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show posts associated with certain taxonomy/category.', WPBM_TD ) ?></p>
            <p class="description"><?php _e( 'Note: This is only available for grid,list,vertical timeline and masonary.', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-pagination-wrapper"
    <?php if ( isset( $wpbm_option[ 'wpbm_display_pagination' ] ) && $wpbm_option[ 'wpbm_display_pagination' ] == '1' ) {
        ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display: none;"
             <?php
         }
         ?>>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Pagination', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_select_pagination]" class="wpbm-select-pagination">
                    <option value="standard_pagination"  <?php if ( isset( $wpbm_option[ 'wpbm_select_pagination' ] ) && $wpbm_option[ 'wpbm_select_pagination' ] == 'standard_pagination' ) echo 'selected=="selected"'; ?>><?php _e( 'Standard Pagination', WPBM_TD ) ?></option>
                    <option value="load_more_button"  <?php if ( isset( $wpbm_option[ 'wpbm_select_pagination' ] ) && $wpbm_option[ 'wpbm_select_pagination' ] == 'load_more_button' ) echo 'selected=="selected"'; ?>><?php _e( 'Load More Button', WPBM_TD ) ?></option>
                    <option value="infinite_scroll"  <?php if ( isset( $wpbm_option[ 'wpbm_select_pagination' ] ) && $wpbm_option[ 'wpbm_select_pagination' ] == 'infinite_scroll' ) echo 'selected=="selected"'; ?>><?php _e( 'Infinite Scrolls', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-standard-page-block">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Standard Pagination Template', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_standard_page_template]" class="wpbm-standard-template">
                        <?php for ( $k = 1; $k <= 5; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_standard_page_template' ] ) ) selected( $wpbm_option[ 'wpbm_standard_page_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="wpbm-standard-pagination-demo wpbm-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                            if ( isset( $wpbm_option[ 'wpbm_standard_page_template' ] ) ) {
                                $option_value = $wpbm_option[ 'wpbm_standard_page_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="wpbm-standard-pagination-common" id="wpbm-standard-pagination-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                                <img src="<?php echo WPBM_IMG_DIR . '/demo/pagination/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpbm-load-setting-block" style="display: none;">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Load More Template', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_load_more_template]" class="wpbm-load-more-template">
                        <?php for ( $k = 1; $k <= 5; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_load_more_template' ] ) ) selected( $wpbm_option[ 'wpbm_load_more_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="wpbm-load-more-demo wpbm-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                            if ( isset( $wpbm_option[ 'wpbm_load_more_template' ] ) ) {
                                $option_value = $wpbm_option[ 'wpbm_load_more_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="wpbm-load-more-common" id="wpbm-load-more-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                                <img src="<?php echo WPBM_IMG_DIR . '/demo/loadmore/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class ="wpbm-post-option-wrap">
                <label for="load-more-text" class="wpbm-load-more-text"><?php _e( 'Load More Text', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <input type="text" class="wpbm-load-more-text" placeholder="Load More" name="wpbm_option[wpbm_load_more_text]" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_post_link_text' ] ) && ! empty( $wpbm_option[ 'wpbm_post_link_text' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_load_more_text' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
        <div class="wpbm-loader-block" style="display: none;">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Loader', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <?php
                    $wpbm_loader_previews = array( 'loader-1', 'loader-2', 'loader-3', 'loader-4', 'loader-5', 'loader-6', 'loader-7', 'loader-8', 'loader-9', 'loader-10', 'loader-11', 'loader-12', 'loader-13', 'loader-14', 'loader-15', 'loader-16' );
                    foreach ( $wpbm_loader_previews as $wpbm_loader_preview ) :
                        ?>
                        <div class="wpbm-hide-radio">
                            <input type="radio" id="<?php echo $wpbm_loader_preview; ?>" name="wpbm_option[wpbm_loader_preview_type]" class="wpbm-loader-type" value="<?php echo esc_attr( $wpbm_loader_preview ); ?>" <?php if ( isset( $wpbm_option[ 'wpbm_loader_preview_type' ] ) && $wpbm_option[ 'wpbm_loader_preview_type' ] == $wpbm_loader_preview ) { ?>checked="checked"<?php } ?> <?php if ( ! isset( $wpbm_option[ 'wpbm_loader_preview_type' ] ) ) { ?>checked="checked"<?php } ?> />
                            <label class="wpbm-loader-demo" for="<?php echo $wpbm_loader_preview; ?>">
                                <img src="<?php echo WPBM_IMG_DIR . '/loader/' . $wpbm_loader_preview . '.gif' ?>">
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-category-view-check" class="wpbm-category-view">
            <?php _e( 'Display Post Category', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-category wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_category' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_category]" <?php if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show category', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-tag-view-check" class="wpbm-tag-view"><?php _e( 'Display Post Tag', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-tag wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_tag' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_tag]" <?php if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post tag', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-author-view-check" class="wpbm-author-view"><?php _e( 'Display Post Author', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-author wpbm-checkbox"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_author' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_author]" <?php if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post author', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-comment-view-check" class="wpbm-comment-view"><?php _e( 'Display Post Comment Count', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-comment wpbm-checkbox"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_comment' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_comment]" <?php if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post comment count', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-date-view-check" class="wpbm-date-view"><?php _e( 'Display Post Date', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-date wpbm-checkbox"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_date' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_show_date]" <?php if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post date', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-date-wrapper wpbm-post-option-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '0' ) { ?> style="display:none;" <?php } ?>>
        <label><?php _e( 'Date Format', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_date_format_post]" class="wpbm-select-date-format">
                <option value="F j, Y g:i a"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'F j, Y g:i a' ) echo 'selected=="selected"'; ?>><?php _e( 'March 6, 2017 12:50 am', WPBM_TD ) ?></option>
                <option value="F j, Y"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'F j, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'March 6, 2017', WPBM_TD ) ?></option>
                <option value="F, Y"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'F, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'March, 2017', WPBM_TD ) ?></option>
                <option value="j F  Y"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'j F  Y' ) echo 'selected=="selected"'; ?>><?php _e( '6 March 2017', WPBM_TD ) ?></option>
                <option value="g:i a"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'g:i a' ) echo 'selected=="selected"'; ?>><?php _e( '12:50 am', WPBM_TD ) ?></option>
                <option value="g:i:s a"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'g:i:s a' ) echo 'selected=="selected"'; ?>><?php _e( '12:50:48 am', WPBM_TD ) ?></option>
                <option value="l, F jS, Y"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'l, F jS, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'Saturday, March 6th, 2017', WPBM_TD ) ?></option>
                <option value="M j, Y @ G:i"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'M j, Y @ G:i' ) echo 'selected=="selected"'; ?>><?php _e( 'Nov 6, 2010 @ 0:50', WPBM_TD ) ?></option>
                <option value="Y/m/d \a\t g:i A"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'Y/m/d \a\t g:i A' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06 at 12:50 AM', WPBM_TD ) ?></option>
                <option value="Y/m/d \a\t g:ia"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'Y/m/d \a\t g:ia' ) echo 'selected=="selected"'; ?>><?php _e( ' 2010/11/06 at 12:50am', WPBM_TD ) ?></option>
                <option value="Y/m/d g:i:s A"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'Y/m/d g:i:s A' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06 12:50:48 AM', WPBM_TD ) ?></option>
                <option value="Y/m/d"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'Y/m/d' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06', WPBM_TD ) ?></option>
                <option value="d.m.Y"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'd.m.Y' ) echo 'selected=="selected"'; ?>><?php _e( '11.1.2017', WPBM_TD ) ?></option>
                <option value="d-m-Y"  <?php if ( isset( $wpbm_option[ 'wpbm_date_format_post' ] ) && $wpbm_option[ 'wpbm_date_format_post' ] == 'd-m-Y' ) echo 'selected=="selected"'; ?>><?php _e( '11-1-2017', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-read-more-check" class="wpbm-read-more-view"><?php _e( 'Display Read More Link', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-read-more wpbm-checkbox" name="wpbm_option[wpbm_show_read_more]"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_show_read_more' ] );
                } else {
                    echo '0';
                }
                ?>" <?php if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show read more post link', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-read-more-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                    ?> style="display:block;" <?php } else { ?> style="display:none;" <?php }
                ?>>
        <div class ="wpbm-post-option-wrap">
            <label for="read-more-text" class="wpbm-read-more-text"><?php _e( 'Read More Text', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="text" class="wpbm-post-link-text" placeholder="Read More" name="wpbm_option[wpbm_post_link_text]" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_post_link_text' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] );
                }
                ?>">
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-post-link" class="wpbm-post-label"><?php _e( 'Post Link', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label><input type="radio" value="post_link" name="wpbm_option[post_url]" <?php
                    if ( isset( $wpbm_option[ 'post_url' ] ) ) {
                        checked( $wpbm_option[ 'post_url' ], 'post_link' );
                    }
                    ?> class="wpbm-post-link"/><?php _e( "Post Link", WPBM_TD ); ?></label>
                <label><input type="radio" value="custom_link" name="wpbm_option[post_url]" <?php
                    if ( isset( $wpbm_option[ 'post_url' ] ) ) {
                        checked( $wpbm_option[ 'post_url' ], 'custom_link' );
                    }
                    ?>  class="wpbm-post-link"/><?php _e( 'Custom Link', WPBM_TD ); ?></label>
            </div>
        </div>
        <div class="wpbm-custom-link-wrap"  <?php if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                        ?> style="display:none;" <?php }
                    ?>>
            <div class ="wpbm-post-option-wrap">
                <label for="custom-link-url" class="wpbm-custom-url"><?php _e( 'Custom Link URL', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <input type="text" class="wpbm-custom-link" placeholder="www.example.com" name="wpbm_option[wpbm_custom_url]" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_custom_url' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_custom_url' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-post-option-wrap">
        <label><?php _e( 'Image Size', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_image_size]" class="wpbm-select-image-size">
                <option value="full"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'full' ) echo 'selected=="selected"'; ?>><?php _e( 'Original', WPBM_TD ) ?></option>
                <option value="large"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'large' ) echo 'selected=="selected"'; ?>><?php _e( 'Large', WPBM_TD ) ?></option>
                <option value="medium"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'medium' ) echo 'selected=="selected"'; ?>><?php _e( 'Medium', WPBM_TD ) ?></option>
                <option value="thumbnail"  <?php if ( isset( $wpbm_option[ 'wpbm_image_size' ] ) && $wpbm_option[ 'wpbm_image_size' ] == 'thumbnail' ) echo 'selected=="selected"'; ?>><?php _e( 'Thumbnail', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
</div>