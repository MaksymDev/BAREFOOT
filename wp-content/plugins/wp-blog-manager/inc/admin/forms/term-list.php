<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$name_prefix = "wpbm_option[wpbm_blog][$blog_key]";
$value_prefix = $wpbm_option[ 'wpbm_blog' ][ $blog_key ];
?>
<div class="wpbm-each-taxonomy-wrap">
    <div class="wpbm-delete-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class="wpbm-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="<?php echo esc_attr( $name_prefix . '[multiple_post_taxonomy]' ); ?>" class="wpbm-multiple-taxonomy">
                <option value="select" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', WPBM_TD ); ?></option>
                <?php
                $post_type = $wpbm_option[ 'post_type' ];
                $taxonomies = get_object_taxonomies( $post_type, 'objects' );
                if ( $post_type == 'post' ) {
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
                            <option value="<?php echo $value; ?>" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                            <?php
                        }
                    }
                }
                else {
                    foreach ( $taxonomies as $tax ) {
                        $value = $tax -> name;
                        $label = $tax -> label;
                        ?>
                        <option value="<?php echo $value; ?>" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', WPBM_TD ); ?></p>
        </div>
    </div>
    <div class="wpbm-post-option-wrap">
        <label><?php _e( 'Terms', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap wpbm-multiple-select">
            <select name="<?php echo esc_attr( $name_prefix . '[multiple_taxonomy_terms][]' ); ?>" multiple="multiple" class="wpbm-hierarchy-taxonomy-term">
                <option value=""><?php echo 'Choose Terms'; ?></option>
                <?php
                $select_tax = $value_prefix[ 'multiple_post_taxonomy' ];
                if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) ) {
                    echo $this -> wpbm_fetch_category_list( $select_tax, $value_prefix[ 'multiple_taxonomy_terms' ] );
                }
                ?>
            </select>
        </div>
    </div>
    <div class="wpbm-post-option-wrap">
        <label for="wpbm-enable-operator" class="wpbm-enable-operator">
            <?php _e( 'Operator', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-operator wpbm-checkbox" value="<?php
                if ( isset( $value_prefix[ 'wpbm_enable_operator' ] ) ) {
                    echo esc_attr( $value_prefix[ 'wpbm_enable_operator' ] );
                } else {
                    echo '0';
                }
                ?>" name="<?php echo esc_attr( $name_prefix . '[wpbm_enable_operator]' ); ?>" <?php if ( isset( $value_prefix[ 'wpbm_enable_operator' ] ) && $value_prefix[ 'wpbm_enable_operator' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable operator to test and filter the post', WPBM_TD ) ?></p>
            <div class="wpbm-operator-inner-wrap" <?php if ( isset( $value_prefix[ 'wpbm_enable_operator' ] ) && $value_prefix[ 'wpbm_enable_operator' ] == '1' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                <select name="<?php echo esc_attr( $name_prefix . '[wpbm_terms_operator]' ); ?>" class="wpbm-terms-operator">
                    <option value="IN" <?php if ( isset( $value_prefix[ 'wpbm_terms_operator' ] ) && $value_prefix[ 'wpbm_terms_operator' ] == 'IN' ) echo 'selected=="selected"'; ?>><?php _e( 'IN', WPBM_TD ) ?></option>
                    <option value="NOT IN" <?php if ( isset( $value_prefix[ 'wpbm_terms_operator' ] ) && $value_prefix[ 'wpbm_terms_operator' ] == 'NOT IN' ) echo 'selected=="selected"'; ?>><?php _e( 'NOT IN', WPBM_TD ) ?></option>
                    <option value="AND" <?php if ( isset( $value_prefix[ 'wpbm_terms_operator' ] ) && $value_prefix[ 'wpbm_terms_operator' ] == 'AND' ) echo 'selected=="selected"'; ?>><?php _e( 'AND', WPBM_TD ) ?></option>
                    <option value="EXISTS" <?php if ( isset( $value_prefix[ 'wpbm_terms_operator' ] ) && $value_prefix[ 'wpbm_terms_operator' ] == 'EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'EXISTS', WPBM_TD ) ?></option>
                    <option value="NOT EXISTS" <?php if ( isset( $value_prefix[ 'wpbm_terms_operator' ] ) && $value_prefix[ 'wpbm_terms_operator' ] == 'NOT EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'NOT EXISTS', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>