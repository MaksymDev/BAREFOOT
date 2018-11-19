<div class="wpbm-filter-setting-wrap">
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-enable-filter" class="wpbm-enable-filter">
            <?php _e( 'Enable Filter', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-display-filter wpbm-checkbox" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_display_filter' ] );
                } else {
                    echo '0';
                }
                ?>" name="wpbm_option[wpbm_display_filter]" <?php if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show filter on grid and masonry layout.', WPBM_TD ) ?></p>
        </div>
    </div>
    <div class="wpbm-filter-enable-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) { ?>
             style="display: block;" <?php } else {
                    ?>
             style="display: none;" <?php } ?>>
        <div class ="wpbm-post-option-wrap">
            <label for="all-items-label" class="wpbm-all-items"><?php _e( 'All Items Label', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="text" class="wpbm-all-items-label" placeholder="All" name="wpbm_option[wpbm_all_items_label]" value="<?php
                if ( isset( $wpbm_option[ 'wpbm_all_items_label' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_all_items_label' ] );
                }
                ?>">
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Taxonomy/Category', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[select_filter_taxonomy]" class="wpbm-filter-taxonomy">
                    <option value="" <?php if ( isset( $wpbm_option[ 'select_filter_taxonomy' ] ) && $wpbm_option[ 'select_filter_taxonomy' ] == '' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', WPBM_TD ); ?></option>
                    <?php
                    $taxonomies = get_object_taxonomies( 'post', 'objects' );
                    $exclude = array( 'post_format' );
                    // Filter out all unwanted post types
                    foreach ( $taxonomies as $key => $value ) {
                        if ( in_array( $key, $exclude ) ) {
                            unset( $taxonomies[ $key ] );
                        }
                    }
                    if ( is_array( $taxonomies ) ) {
                        foreach ( $taxonomies as $tax ) {
                            $value = $tax -> name;
                            $label = $tax -> label;
                            ?>
                            <option value="<?php echo $value;
                            ?>" <?php if ( isset( $wpbm_option[ 'select_filter_taxonomy' ] ) && $wpbm_option[ 'select_filter_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                                    <?php
                                }
                            }
                            ?>
                </select>
                <p class="description"><?php _e( 'Please note the taxonomy will be listed according to the post type selected in post setting block', WPBM_TD ); ?></p>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Terms Type', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label><input type="radio" value="all" name="wpbm_option[filter_terms_type]" <?php
                    if ( isset( $wpbm_option[ 'filter_terms_type' ] ) ) {
                        checked( $wpbm_option[ 'filter_terms_type' ], 'all' );
                    }
                    ?> class="wpbm-filter-terms-type"/><?php _e( "All", WPBM_TD ); ?></label>
                <label><input type="radio" value="specific" name="wpbm_option[filter_terms_type]" <?php
                    if ( isset( $wpbm_option[ 'filter_terms_type' ] ) ) {
                        checked( $wpbm_option[ 'filter_terms_type' ], 'specific' );
                    }
                    ?>  class="wpbm-filter-terms-type"/><?php _e( 'Specific', WPBM_TD ); ?></label>
                <div class="wpbm-specific-wrap" <?php if ( isset( $wpbm_option[ 'filter_terms_type' ] ) && $wpbm_option[ 'filter_terms_type' ] == 'specific' ) { ?> style="display:block;" <?php } else {
                        ?>
                         style = "display:none;"
                         <?php
                     }
                     ?>>
                         <?php
                         global $form;
                         if ( ! empty( $wpbm_option[ 'select_filter_taxonomy' ] ) ) {
                             $select_taxonomy = $wpbm_option[ 'select_filter_taxonomy' ];
                         } else {
                             $select_taxonomy = 'category';
                         }
                         $field_title = 'wpbm_option[filter]';
                         $terms = get_terms( $select_taxonomy, array( 'hide_empty' => 0 ) );
                         $categoryHierarchy = array();
                         $this -> wpbm_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
                         $form .= '<div class="wpbm-checkbox-wrap">';
                         if ( ! empty( $wpbm_option[ 'filter' ] ) ) {
                             $selected_term = $wpbm_option[ 'filter' ];
                             if ( count( $categoryHierarchy ) > 0 ) {
                                 $form .= $this -> wpbm_print_checkbox( $categoryHierarchy, '', $field_title, $selected_term );
                             }
                         } else {
                             $form .= $this -> wpbm_print_checkbox( $categoryHierarchy, '', $field_title );
                         }

                         $form .= '</div>';
                         echo $form;
                         ?>
                </div>
            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Filter Template', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_filter_template]" class="wpbm-filter-template">
                    <?php for ( $j = 1; $j <= 5; $j ++ ) { ?>
                        <option value="template-<?php echo $j; ?>" <?php if ( ! empty( $wpbm_option[ 'wpbm_filter_template' ] ) ) selected( $wpbm_option[ 'wpbm_filter_template' ], 'template-' . $j ); ?>><?php _e( 'Template ', WPBM_TD ) ?><?php echo $j; ?></option>
                    <?php } ?>    </select>
                <div class="wpbm-filter-demo wpbm-preview-image">
                    <?php
                    for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                        if ( isset( $wpbm_option[ 'wpbm_filter_template' ] ) ) {
                            $option_value = $wpbm_option[ 'wpbm_filter_template' ];
                            $exploed_array = explode( '-', $option_value );
                            $cnt_num = $exploed_array[ 1 ];
                            if ( $cnt != $cnt_num ) {
                                $style = "style='display:none;'";
                            } else {
                                $style = '';
                            }
                        }
                        ?>
                        <div class="wpbm-filter-common" id="wpbm-filter-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                            <h4><?php _e( 'Template', WPBM_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', WPBM_TD ); ?></h4>
                            <img src=" <?php echo WPBM_IMG_DIR . '/demo/filter/' . $cnt . '.jpg' ?>"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <p class="description"><?php _e( 'Note: Filter is only available for Grid and Masonary Layout' ) ?></p>
    </div>
</div>