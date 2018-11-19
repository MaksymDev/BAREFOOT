<div class="wpbm-layout-outer-wrap">
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Layout', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_select_layout]" class="wpbm-select-layout">
                <option value="grid"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'grid' ) echo 'selected=="selected"'; ?>><?php _e( 'Grid', WPBM_TD ) ?></option>
                <option value="timeline"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'timeline' ) echo 'selected=="selected"'; ?>><?php _e( 'Timeline', WPBM_TD ) ?></option>
                <option value="list"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'list' ) echo 'selected=="selected"'; ?>><?php _e( 'List', WPBM_TD ) ?></option>
                <option value="masonry"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'masonry' ) echo 'selected=="selected"'; ?>><?php _e( 'Masonry', WPBM_TD ) ?></option>
                <option value="carousel"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'carousel' ) echo 'selected=="selected"'; ?>><?php _e( 'Carousel', WPBM_TD ) ?></option>
                <option value="slider"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'slider' ) echo 'selected=="selected"'; ?>><?php _e( 'Slider', WPBM_TD ) ?></option>
                <option value="content-block"  <?php if ( isset( $wpbm_option[ 'wpbm_select_layout' ] ) && $wpbm_option[ 'wpbm_select_layout' ] == 'content-block' ) echo 'selected=="selected"'; ?>><?php _e( 'Magazine', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="wpbm-grid-setting-wrap">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Grid Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_grid_template]" class="wpbm-grid-template">
                    <?php for ( $k = 1; $k <= 30; $k ++ ) { ?>
                        <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_grid_template' ] ) ) selected( $wpbm_option[ 'wpbm_grid_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                    <?php } ?>    </select>
                <p class="description"><?php _e( 'Note: The template 29 and 30 is only available for image.', WPBM_TD ) ?></p>
                <div class="wpbm-grid-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 30; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_grid_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_grid_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-grid-common" id="wpbm-grid-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/grid/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Desktop Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <?php
                $desktop_column = isset( $wpbm_option[ 'desktop_column' ] ) ? esc_attr( $wpbm_option[ 'desktop_column' ] ) : '2';
                ?>
                <div class="wpbm-grid-column" data-max="4" data-min="1" data-value="<?php echo $desktop_column; ?>"></div>
                <input type="number" min="1" name="wpbm_option[desktop_column]" max="4" class="wpbm-desktop-column" value="<?php echo $desktop_column; ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Tablet/IPad Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <?php
                $tablet_column = isset( $wpbm_option[ 'tablet_column' ] ) ? esc_attr( $wpbm_option[ 'tablet_column' ] ) : '2';
                ?>
                <div class="wpbm-grid-column" data-max="3" data-min="1" data-value="<?php echo $tablet_column; ?>"></div>
                <input type="number" min="1" name="wpbm_option[tablet_column]" max="3" class="wpbm-tablet-column" value="<?php echo $tablet_column; ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Mobile Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <?php
                $mobile_column = isset( $wpbm_option[ 'mobile_column' ] ) ? esc_attr( $wpbm_option[ 'mobile_column' ] ) : '1';
                ?>
                <div class="wpbm-grid-column" data-max="2" data-min="1" data-value="<?php echo $mobile_column; ?>"></div>
                <input type="number" min="1" name="wpbm_option[mobile_column]" max="3" class="wpbm-mobile-column" value="<?php echo $mobile_column; ?>" readonly="readonly"/>
            </div>
        </div>
    </div>
    <div class="wpbm-timeline-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Timeline Layout', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[timeline_layout]" class="wpbm-timeline-layout">
                    <option value="vertical"  <?php if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'vertical' ) echo 'selected=="selected"'; ?>><?php _e( 'Vertical Timeline Layout', WPBM_TD ) ?></option>
                    <option value="horizontal"  <?php if ( isset( $wpbm_option[ 'timeline_layout' ] ) && $wpbm_option[ 'timeline_layout' ] == 'horizontal' ) echo 'selected=="selected"'; ?>><?php _e( 'Horizontal Timeline Layout', WPBM_TD ) ?></option>
                </select>
                <p class="description"><?php _e( 'Timeline layout is only available for image, video & soundcloud audio.', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class="wpbm-vertical-wrap">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Vertical Template', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[timeline_vertical_template]" class="wpbm-vertical-template">
                        <?php for ( $k = 1; $k <= 8; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'timeline_vertical_template' ] ) ) selected( $wpbm_option[ 'timeline_vertical_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="wpbm-vertical-timeline-demo wpbm-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 8; $cnt ++ ) {
                            if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) ) {
                                $option_value = $wpbm_option[ 'timeline_vertical_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="wpbm-vertical-timeline-common" id="wpbm-vertical-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                                <img src="<?php echo WPBM_IMG_DIR . '/demo/vertical-timeline/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpbm-horizontal-wrap" style="display: none;">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Horizontal Template', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[timeline_horizontal_template]" class="wpbm-horizontal-template">
                        <?php for ( $k = 1; $k <= 3; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'timeline_horizontal_template' ] ) ) selected( $wpbm_option[ 'timeline_horizontal_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="wpbm-horizontal-timeline-demo wpbm-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 3; $cnt ++ ) {
                            if ( isset( $wpbm_option[ 'timeline_horizontal_template' ] ) ) {
                                $option_value = $wpbm_option[ 'timeline_horizontal_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="wpbm-horizontal-timeline-common" id="wpbm-horizontal-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                                <img src="<?php echo WPBM_IMG_DIR . '/demo/horizontal-timeline/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-list-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Image Design', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_image_design]" class="wpbm-img-design">
                    <option value="normal"  <?php if ( isset( $wpbm_option[ 'wpbm_image_design' ] ) && $wpbm_option[ 'wpbm_image_design' ] == 'normal' ) echo 'selected=="selected"'; ?>><?php _e( 'Normal Design', WPBM_TD ) ?></option>
                    <option value="circular"  <?php if ( isset( $wpbm_option[ 'wpbm_image_design' ] ) && $wpbm_option[ 'wpbm_image_design' ] == 'circular' ) echo 'selected=="selected"'; ?>><?php _e( 'Circular Design', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-normal-list-wrap">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'List Template', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_list_template]" class="wpbm-list-template">
                        <?php for ( $k = 1; $k <= 14; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_list_template' ] ) ) selected( $wpbm_option[ 'wpbm_list_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="wpbm-list-demo wpbm-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 14; $cnt ++ ) {
                            if ( isset( $wpbm_option[ 'wpbm_list_template' ] ) ) {
                                $option_value = $wpbm_option[ 'wpbm_list_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="wpbm-list-common" id="wpbm-list-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                                <img src="<?php echo WPBM_IMG_DIR . '/demo/list/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpbm-circular-wrap" style="display: none;">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'List Template', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_list_circular_template]" class="wpbm-list-circular-template">
                        <?php for ( $k = 1; $k <= 5; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_list_circular_template' ] ) ) selected( $wpbm_option[ 'wpbm_list_circular_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <p class="description"><?php _e( 'Note: The circular template is only available for image.' ) ?></p>
                    <div class="wpbm-list-circular-demo wpbm-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                            if ( isset( $wpbm_option[ 'wpbm_list_circular_template' ] ) ) {
                                $option_value = $wpbm_option[ 'wpbm_list_circular_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="wpbm-list-circular-common" id="wpbm-list-circular-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                                <img src="<?php echo WPBM_IMG_DIR . '/demo/list-circular/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class = "wpbm-post-option-wrap">
            <label><?php _e( 'Image Position', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label><input type="radio" value="left" name="wpbm_option[list_image_position]" <?php
                    if ( isset( $wpbm_option[ 'list_image_position' ] ) ) {
                        checked( $wpbm_option[ 'list_image_position' ], 'left' );
                    }
                    ?> class="wpbm-list-position"/><?php _e( "Left", WPBM_TD ); ?></label>
                <label><input type="radio" value="right" name="wpbm_option[list_image_position]" <?php
                    if ( isset( $wpbm_option[ 'list_image_position' ] ) ) {
                        checked( $wpbm_option[ 'list_image_position' ], 'right' );
                    }
                    ?>  class="wpbm-list-position"/><?php _e( 'Right', WPBM_TD ); ?></label>
            </div>
        </div>
    </div>

    <div class="wpbm-masonry-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Masonry Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_masonry_template]" class="wpbm-masonry-template">
                    <?php for ( $k = 1; $k <= 7; $k ++ ) { ?>
                        <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_masonry_template' ] ) ) selected( $wpbm_option[ 'wpbm_masonry_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-masonry-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 7; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_masonry_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-masonry-common" id="wpbm-masonry-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/masonry/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-slider-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Slider Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_slider_template]" class="wpbm-slider-template">
                    <?php for ( $k = 1; $k <= 10; $k ++ ) { ?>
                        <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_slider_template' ] ) ) selected( $wpbm_option[ 'wpbm_slider_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-slider-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 10; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_slider_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_slider_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-slider-common" id="wpbm-slider-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/slider/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-carousel-setting-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Carousel Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_carousel_template]" class="wpbm-carousel-template">
                    <?php for ( $k = 1; $k <= 15; $k ++ ) { ?>
                        <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_carousel_template' ] ) ) selected( $wpbm_option[ 'wpbm_carousel_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-carousel-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 15; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_carousel_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_carousel_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-carousel-common" id="wpbm-carousel-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/carousel/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Slide Column', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="number" name="wpbm_option[wpbm_slide_column]" min="1" max="4" class="wpbm-slide-column" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_slide_column' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_slide_column' ] );
                } else {
                    echo '3';
                }
                ?>">
            </div>
        </div>
    </div>
    <div class="wpbm-slider-option-block" style="display: none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Controls', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_nav_controls]" class="wpbm-nav-controls">
                    <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) && $wpbm_option[ 'wpbm_nav_controls' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_nav_controls' ] ) && $wpbm_option[ 'wpbm_nav_controls' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Auto', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_slide_auto]" class="wpbm-slide-auto">
                    <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) && $wpbm_option[ 'wpbm_slide_auto' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_auto' ] ) && $wpbm_option[ 'wpbm_slide_auto' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Auto Play Timeout', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="number" name="wpbm_option[wpbm_slide_speed]" class="wpbm-slide-speed" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_slide_speed' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_slide_speed' ] );
                } else {
                    echo '1000';
                }
                ?>">
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Pager', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_slide_pager]" class="wpbm-slide-pager">
                    <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) && $wpbm_option[ 'wpbm_slide_pager' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_slide_pager' ] ) && $wpbm_option[ 'wpbm_slide_pager' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="wpbm-content-block-setting" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Magazine Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_content_template]" class="wpbm-content-template">
                    <?php for ( $k = 1; $k <= 10; $k ++ ) { ?>
                        <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_content_template' ] ) ) selected( $wpbm_option[ 'wpbm_content_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $k; ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-content-block-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 10; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_content_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-content-block-common" id="wpbm-content-block-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src="<?php echo WPBM_IMG_DIR . '/demo/magazine/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="wpbm-content-slides-container">
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Number of slides', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <input type="number" name="wpbm_option[wpbm_mag_slide_column]" min="1" max="7" class="wpbm-mag-slide-column" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                    } else {
                        echo '3';
                    }
                    ?>">
                </div>
            </div>
            <div class="wpbm-post-option-wrap">
                <label><?php _e( 'Controls', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_mag_nav_controls]" class="wpbm-mag-nav-controls">
                        <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) && $wpbm_option[ 'wpbm_mag_nav_controls' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                        <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) && $wpbm_option[ 'wpbm_mag_nav_controls' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                    </select>
                </div>
            </div>
            <div class="wpbm-post-option-wrap">
                <label><?php _e( 'Auto', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_mag_slide_auto]" class="wpbm-mag-slide-auto">
                        <option value="true"  <?php if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) && $wpbm_option[ 'wpbm_mag_slide_auto' ] == 'true' ) echo 'selected=="selected"'; ?>><?php _e( 'True', WPBM_TD ) ?></option>
                        <option value="false"  <?php if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) && $wpbm_option[ 'wpbm_mag_slide_auto' ] == 'false' ) echo 'selected=="selected"'; ?>><?php _e( 'False', WPBM_TD ) ?></option>
                    </select>
                </div>
            </div>
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Auto Play Timeout', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <input type="number" name="wpbm_option[wpbm_mag_slide_speed]" class="wpbm-mag-slide-speed" value="<?php
                           if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                               echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                           } else {
                               echo '1000';
                           }
                           ?>">
                </div>
            </div>
        </div>
    </div>
</div>

