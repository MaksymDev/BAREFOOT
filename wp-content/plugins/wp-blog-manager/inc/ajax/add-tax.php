<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$post_type =sanitize_text_field(  $_POST[ 'post_type' ] );
$key = $this -> wpbm_generate_random_string( 15 );
$blog_key = 'blog_' . $key;
$blog_prefix = "wpbm_option[wpbm_blog][$blog_key]";
?>
<div class="wpbm-each-taxonomy-wrap">
    <div class="wpbm-delete-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Post Taxonomy', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="<?php echo esc_attr( $blog_prefix . '[multiple_post_taxonomy]' ); ?>" class="wpbm-multiple-taxonomy">
                <option value="select" ><?php echo _e( 'Choose Taxonomy', WPBM_TD ); ?></option>
                <?php
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
                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                            <?php
                        }
                    }
                } else {
                    foreach ( $taxonomies as $tax ) {
                        $value = $tax -> name;
                        $label = $tax -> label;
                        ?>
                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', WPBM_TD ); ?></p>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Terms', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap wpbm-multiple-select">
            <select name="<?php echo esc_attr( $blog_prefix . '[multiple_taxonomy_terms][]' ); ?>" multiple="multiple" class="wpbm-hierarchy-taxonomy-term">
                <option value="" ><?php echo _e( 'Select Taxonomy First', WPBM_TD ); ?></option>
            </select>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label for="wpbm-enable-operator" class="wpbm-enable-operator">
            <?php _e( 'Operator', WPBM_TD ); ?>
        </label>
        <div class="wpbm-post-field-wrap">
            <label class="wpbm-switch">
                <input type="checkbox" class="wpbm-show-operator wpbm-checkbox" value="0" name="<?php echo esc_attr( $blog_prefix . '[wpbm_enable_operator]' ); ?>"/>
                <div class="wpbm-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable operator to test and filter the post', WPBM_TD ) ?></p>
            <div class="wpbm-operator-inner-wrap" style="display: none;">
                <select name="<?php echo esc_attr( $blog_prefix . '[wpbm_terms_operator]' ); ?>" class="wpbm-terms-operator">
                    <option value="IN"><?php _e( 'IN', WPBM_TD ) ?></option>
                    <option value="NOT IN"><?php _e( 'NOT IN', WPBM_TD ) ?></option>
                    <option value="AND"><?php _e( 'AND', WPBM_TD ) ?></option>
                    <option value="EXISTS"><?php _e( 'EXISTS', WPBM_TD ) ?></option>
                    <option value="NOT EXISTS"><?php _e( 'NOT EXISTS', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>