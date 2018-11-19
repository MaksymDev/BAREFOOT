<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$key = $this -> wpbm_generate_random_string( 15 );
$custom_key = 'custom_' . $key;
$custom_prefix = "wpbm_option[wpbm_custom][$custom_key]";
?>
<div class="wpbm-each-meta-container-wrap">
    <div class="wpbm-delete-meta-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class = "wpbm-post-option-wrap">
        <label><?php _e( 'Meta Keys', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <label><input type="radio" value="pre-available" name="<?php echo esc_attr( $custom_prefix . '[multiple_meta_key_type]' ); ?>" class="wpbm-multiple-meta-keys"/><?php _e( "Pre Available Meta Keys", WPBM_TD ); ?></label>
            <label><input type="radio" value="other" name="<?php echo esc_attr( $custom_prefix . '[multiple_meta_key_type]' ); ?>" class="wpbm-multiple-meta-keys"/><?php _e( 'Other Meta Keys', WPBM_TD ); ?></label>
            <div class ="wpbm-pre-multiple-key-wrap" style="display: none;">
                <?php
                $post_meta_table = $wpdb -> postmeta;
                $meta_keys = $wpdb -> get_results( "SELECT DISTINCT(meta_key) FROM $post_meta_table" );
                ?>
                <select class="wpbm-pre-multiple-metakey" name="<?php echo esc_attr( $custom_prefix . '[wpbm_pre_multiple_meta_key]' ); ?>">
                    <option value=""><?php _e( 'None' ); ?></option>
                    <?php
                    foreach ( $meta_keys as $meta_key ) {
                        ?>
                        <option value="<?php echo $meta_key -> meta_key; ?>"><?php echo $meta_key -> meta_key; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="wpbm-multiple-other-key-wrap" style="display: none;">
                <input type="text" class="wpbm-multiple-other-key"  name="<?php echo esc_attr( $custom_prefix . '[wpbm_multiple_other_key]' ); ?>"  value=""/>
            </div>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Meta Value', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <input type="text" class="wpbm-multiple-meta-value"  name="<?php echo esc_attr( $custom_prefix . '[wpbm_multiple_meta_value]' ); ?>"  value=""/>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Compare', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="<?php echo esc_attr( $custom_prefix . '[wpbm_compare_operator]' ); ?>" class="wpbm-compare-post">
                <option value="="><?php _e( 'Equal To', WPBM_TD ) ?></option>
                <option value="!="><?php _e( 'Not Equal To', WPBM_TD ) ?></option>
                <option value=">"><?php _e( 'Greater Than', WPBM_TD ) ?></option>
                <option value=">="><?php _e( 'Greater Than Equal To', WPBM_TD ) ?></option>
                <option value="<"><?php _e( 'Smaller Than', WPBM_TD ) ?></option>
                <option value="<="><?php _e( 'Smaller Than Equal To', WPBM_TD ) ?></option>
                <option value="LIKE"><?php _e( 'Like', WPBM_TD ) ?></option>
                <option value="NOT LIKE"><?php _e( 'Not Like', WPBM_TD ) ?></option>
                <option value="IN"><?php _e( 'In', WPBM_TD ) ?></option>
                <option value="NOT IN"><?php _e( 'Not In', WPBM_TD ) ?></option>
                <option value="BETWEEN"><?php _e( 'Between', WPBM_TD ) ?></option>
                <option value="NOT BETWEEN"><?php _e( 'Not Between', WPBM_TD ) ?></option>
                <option value="EXISTS"><?php _e( 'Exists', WPBM_TD ) ?></option>
                <option value="NOT EXISTS"><?php _e( 'Not Exists', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="wpbm-custom-type-main-wrap">
        <div class ="wpbm-post-option-wrap">
            <label for="wpbm-show-type-check" class="wpbm-show-type">
                <?php _e( 'Type', WPBM_TD ); ?>
            </label>
            <div class="wpbm-post-field-wrap">
                <label class="wpbm-switch">
                    <input type="checkbox" class="wpbm-show-type-filter wpbm-checkbox" value="0" name="<?php echo esc_attr( $custom_prefix . '[wpbm_show_type_filter]' ); ?>"/>
                    <div class="wpbm-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to filter logo by custom field type', WPBM_TD ) ?></p>
                <div class="wpbm-type-filter-wrap" style="display: none;">
                    <select name="<?php echo esc_attr( $custom_prefix . '[wpbm_field_compare_type]' ); ?>" class="wpbm-field-compare-type">
                        <option value="NUMERIC"><?php _e( 'Numeric', WPBM_TD ) ?></option>
                        <option value="BINARY"><?php _e( 'Binary', WPBM_TD ) ?></option>
                        <option value="CHAR"><?php _e( 'Char', WPBM_TD ) ?></option>
                        <option value="DATETIME"><?php _e( 'Date Time', WPBM_TD ) ?></option>
                        <option value="DECIMAL"><?php _e( 'Decimal', WPBM_TD ) ?></option>
                        <option value="SIGNED"><?php _e( 'Signed', WPBM_TD ) ?></option>
                        <option value="TIME"><?php _e( 'Time', WPBM_TD ) ?></option>
                        <option value="UNSIGNED"><?php _e( 'Unsigned', WPBM_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>