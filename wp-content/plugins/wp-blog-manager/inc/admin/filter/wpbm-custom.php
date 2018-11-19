<?php
global $wpdb;
?>
<div class ="wpbm-post-option-wrap">
    <label for="wpbm-show-custom-query" class="wpbm-custom-relation">
        <?php _e( 'Filter Custom Field Post', WPBM_TD ); ?>
    </label>
    <div class="wpbm-post-field-wrap">
        <label class="wpbm-switch">
            <input type="checkbox" class="wpbm-fetch-custom-field-post wpbm-checkbox" value="<?php
            if ( isset( $wpbm_option[ 'wpbm_show_custom_query' ] ) ) {
                echo esc_attr( $wpbm_option[ 'wpbm_show_custom_query' ] );
            } else {
                echo '0';
            }
            ?>" name="wpbm_option[wpbm_show_custom_query]" <?php if ( isset( $wpbm_option[ 'wpbm_show_custom_query' ] ) && $wpbm_option[ 'wpbm_show_custom_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="wpbm-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show posts associated with a certain custom field.', WPBM_TD ) ?></p>
    </div>
</div>
<div class="wpbm-custom-field-wrapper" <?php if ( isset( $wpbm_option[ 'wpbm_show_custom_query' ] ) && $wpbm_option[ 'wpbm_show_custom_query' ] == '1' ) { ?>
         style="display: block;" <?php } else { ?>
         style="display: none;" <?php } ?>>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Custom Field Query Types', WPBM_TD ); ?></label>
        <div class="wpbm-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="wpbm-tooltip-info">
                <ul>
                    <li>
                        <?php _e( "Single Custom Field Handling: Display post where the meta key is 'price' and the meta value that is LESS THAN OR EQUAL TO 22", WPBM_TD ); ?>

                    </li>
                    <li>
                        <?php _e( "Multiple Custom Field Handling: Display posts that have meta key 'color' NOT LIKE value 'blue' OR meta key 'price' with values BETWEEN 20 and 100", WPBM_TD ); ?>

                    </li>
                </ul>
            </span>
        </div>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_custom_field_type]" class="wpbm-custom-field-type">
                <option value="single_field"  <?php if ( isset( $wpbm_option[ 'wpbm_custom_field_type' ] ) && $wpbm_option[ 'wpbm_custom_field_type' ] == 'single_field' ) echo 'selected == "selected"'; ?>><?php _e( 'Single Custom Field Handling', WPBM_TD ) ?></option>
                <option value="multiple_field"  <?php if ( isset( $wpbm_option[ 'wpbm_custom_field_type' ] ) && $wpbm_option[ 'wpbm_custom_field_type' ] == 'multiple_field' ) echo 'selected == "selected"'; ?>><?php _e( 'Multiple Custom Field Handling', WPBM_TD ) ?></option>
            </select>

        </div>
    </div>
    <div class="wpbm-meta-key-wrap">
        <div class = "wpbm-post-option-wrap">
            <label><?php _e( 'Meta Keys', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <label><input type="radio" value="pre-available" name="wpbm_option[meta_keys_type]" <?php
                    if ( isset( $wpbm_option[ 'meta_keys_type' ] ) ) {
                        checked( $wpbm_option[ 'meta_keys_type' ], 'pre-available' );
                    }
                    ?> class="wpbm-meta-key-type"/><?php _e( "Pre Available Meta Keys", WPBM_TD ); ?></label>
                <label><input type="radio" value="other" name="wpbm_option[meta_keys_type]" <?php
                    if ( isset( $wpbm_option[ 'meta_keys_type' ] ) ) {
                        checked( $wpbm_option[ 'meta_keys_type' ], 'other' );
                    }
                    ?>  class="wpbm-meta-key-type"/><?php _e( 'Other Meta Keys', WPBM_TD ); ?></label>
                <div class="wpbm-other-meta-wrap" <?php if ( isset( $wpbm_option[ 'meta_keys_type' ] ) && $wpbm_option[ 'meta_keys_type' ] == 'pre-available' ) { ?> style="display: none;" <?php } ?>>
                    <input type="text" class="wpbm-other-meta-key" placeholder="<?php _e( 'Enter meta key', WPBM_TD ); ?>" name="wpbm_option[wpbm_other_meta_key]"  value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_other_meta_key' ] ) ) {
                        echo $wpbm_option[ 'wpbm_other_meta_key' ];
                    }
                    ?>"/>
                </div>
                <div class="wpbm-pre-meta-key-wrap" <?php if ( isset( $wpbm_option[ 'meta_keys_type' ] ) && $wpbm_option[ 'meta_keys_type' ] == 'other' ) { ?> style="display:none;" <?php } ?>>
                    <?php
                    $post_meta_table = $wpdb -> postmeta;
                    $meta_keys = $wpdb -> get_results( "SELECT DISTINCT(meta_key) FROM $post_meta_table" );
                    ?>
                    <select class="wpbm-pre-metakey" name="wpbm_option[pre_meta_key]">
                        <option value=""><?php _e( 'None' ); ?></option>
                        <?php
                        foreach ( $meta_keys as $meta_key ) {
                            ?>
                            <option value="<?php echo $meta_key -> meta_key; ?>"  <?php if ( isset( $wpbm_option[ 'pre_meta_key' ] ) && $wpbm_option[ 'pre_meta_key' ] == $meta_key -> meta_key ) echo 'selected == "selected"'; ?>><?php echo $meta_key -> meta_key; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Meta Value Type', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_meta_value_type]" class="wpbm-meta-value-type">
                <option value="string"  <?php if ( isset( $wpbm_option[ 'wpbm_meta_value_type' ] ) && $wpbm_option[ 'wpbm_meta_value_type' ] == 'string' ) echo 'selected=="selected"'; ?>><?php _e( 'String', WPBM_TD ) ?></option>
                <option value="number"  <?php if ( isset( $wpbm_option[ 'wpbm_meta_value_type' ] ) && $wpbm_option[ 'wpbm_meta_value_type' ] == 'number' ) echo 'selected=="selected"'; ?>><?php _e( 'Number', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="wpbm-meta-value-wrap">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Enter Meta Value', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="text" class="wpbm-meta-value"  name="wpbm_option[wpbm_meta_value]"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_meta_value' ] ) ) {
                    echo esc_attr( $wpbm_option[ 'wpbm_meta_value' ] );
                }
                ?>"/>
                <p class="description"><?php _e( "Please leave empty if don't need to filter from meta value", WPBM_TD ); ?></p>
            </div>
        </div>
    </div>
    <div class="wpbm-meta-number-wrap" style="display:none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Meta Value Number', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <input type="number" min="1" class="wpbm-meta-value-number"  name="wpbm_option[wpbm_meta_value_number]"  value="<?php
                if ( isset( $wpbm_option[ 'wpbm_meta_value_number' ] ) ) {
                    echo $wpbm_option[ 'wpbm_meta_value_number' ];
                }
                ?>"/>
                <p class="description"><?php _e( "Please leave empty if don't need to filter from meta value number", WPBM_TD ); ?></p>
            </div>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Compare', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_compare_operator]" class="wpbm-compare-post">
                <option value="="  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == '=' ) echo 'selected=="selected"'; ?>><?php _e( 'Equal To', WPBM_TD ) ?></option>
                <option value="!="  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == '!=' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Equal To', WPBM_TD ) ?></option>
                <option value=">"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == '>' ) echo 'selected=="selected"'; ?>><?php _e( 'Greater Than', WPBM_TD ) ?></option>
                <option value=">="  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == '>=' ) echo 'selected=="selected"'; ?>><?php _e( 'Greater Than Equal To', WPBM_TD ) ?></option>
                <option value="<"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == '<' ) echo 'selected=="selected"'; ?>><?php _e( 'Smaller Than', WPBM_TD ) ?></option>
                <option value="<="  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == '<=' ) echo 'selected=="selected"'; ?>><?php _e( 'Smaller Than Equal To', WPBM_TD ) ?></option>
                <option value="LIKE"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'LIKE' ) echo 'selected=="selected"'; ?>><?php _e( 'Like', WPBM_TD ) ?></option>
                <option value="NOT LIKE"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'NOT LIKE' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Like', WPBM_TD ) ?></option>
                <option value="IN"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'IN' ) echo 'selected=="selected"'; ?>><?php _e( 'In', WPBM_TD ) ?></option>
                <option value="NOT IN"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'NOT IN' ) echo 'selected=="selected"'; ?>><?php _e( 'Not In', WPBM_TD ) ?></option>
                <option value="BETWEEN"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'BETWEEN' ) echo 'selected=="selected"'; ?>><?php _e( 'Between', WPBM_TD ) ?></option>
                <option value="NOT BETWEEN"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'NOT BETWEEN' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Between', WPBM_TD ) ?></option>
                <option value="EXISTS"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'Exists', WPBM_TD ) ?></option>
                <option value="NOT EXISTS"  <?php if ( isset( $wpbm_option[ 'wpbm_compare_operator' ] ) && $wpbm_option[ 'wpbm_compare_operator' ] == 'NOT EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Exists', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="wpbm-multiple-custom-field-wrap" style="display: none;">
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-show-relation-blogs" class="wpbm-relation-bogs">
                <?php _e( 'Relation', WPBM_TD ); ?>
            </label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-custom-relation wpbm-checkbox" value="<?php
                    if ( isset( $wpbm_option[ 'wpbm_show_custom_relation' ] ) ) {
                        echo esc_attr( $wpbm_option[ 'wpbm_show_custom_relation' ] );
                    } else {
                        echo 0;
                    }
                    ?>" name="wpbm_option[wpbm_show_custom_relation]" <?php if ( isset( $wpbm_option[ 'wpbm_show_custom_relation' ] ) && $wpbm_option[ 'wpbm_show_custom_relation' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show relation between meta queries', WPBM_TD ) ?></p>
            </div>
        </div>
        <div class="wpbm-relation-main-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_show_custom_relation' ] ) && $wpbm_option[ 'wpbm_show_custom_relation' ] == '1' ) { ?> style="display: block;" <?php } else { ?>  style="display: none;" <?php } ?>>
            <div class ="wpbm-post-option-wrap">
                <label><?php _e( 'Relation', WPBM_TD ); ?></label>
                <div class="wpbm-post-field-wrap">
                    <select name="wpbm_option[wpbm_relation_field]" class="wpbm-relation-field">
                        <option value="AND"  <?php if ( isset( $wpbm_option[ 'wpbm_relation_field' ] ) && $wpbm_option[ 'wpbm_relation_field' ] == 'AND' ) echo 'selected=="selected"'; ?>><?php _e( 'AND', WPBM_TD ) ?></option>
                        <option value="OR"  <?php if ( isset( $wpbm_option[ 'wpbm_relation_field' ] ) && $wpbm_option[ 'wpbm_relation_field' ] == 'OR' ) echo 'selected=="selected"'; ?>><?php _e( 'OR', WPBM_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="wpbm-custom-field-inner-wrap">
            <?php
            if ( isset( $wpbm_option[ 'wpbm_custom' ] ) && is_array( $wpbm_option[ 'wpbm_custom' ] ) ) {
                $wpbm_custom_count = count( $wpbm_option[ 'wpbm_custom' ] );
            } else {
                $wpbm_custom_count = 0;
            }
            if ( $wpbm_custom_count > 0 ) {

                foreach ( $wpbm_option[ 'wpbm_custom' ] as $custom_key => $custom_detail ) {
                    include(WPBM_PATH . 'inc/admin/forms/wpbm-blog-detail.php');
                }
            }
            ?>
        </div>
        <div class="wpbm-query-button">
            <input type="button" class="button-primary wpbm-add-meta-query" value="<?php _e( 'Add New Meta Condition', WPBM_TD ); ?>">
        </div>
    </div>
</div>