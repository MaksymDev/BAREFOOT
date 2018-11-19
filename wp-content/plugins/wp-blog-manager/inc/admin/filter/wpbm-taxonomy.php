<div class ="wpbm-post-option-wrap">
    <label for="wpbm-show-taxonomy-query" class="wpbm-taxonomy-relation">
        <?php _e( 'Filter Taxonomies/Categories Post', WPBM_TD ); ?>
    </label>
    <div class="wpbm-post-field-wrap">
        <label class="wpbm-switch">
            <input type="checkbox" class="wpbm-show-taxonomy-relation wpbm-checkbox" value="<?php
            if ( isset( $wpbm_option[ 'wpbm_show_taxonomy_query' ] ) ) {
                echo esc_attr( $wpbm_option[ 'wpbm_show_taxonomy_query' ] );
            } else {
                echo '0';
            }
            ?>" name="wpbm_option[wpbm_show_taxonomy_query]" <?php if ( isset( $wpbm_option[ 'wpbm_show_taxonomy_query' ] ) && $wpbm_option[ 'wpbm_show_taxonomy_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="wpbm-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show posts associated with certain taxonomy/category.', WPBM_TD ) ?></p>
    </div>
</div>
<div class="wpbm-taxonomy-main-wrap"
<?php if ( isset( $wpbm_option[ 'wpbm_show_taxonomy_query' ] ) && $wpbm_option[ 'wpbm_show_taxonomy_query' ] == '1' ) { ?>
         style="display: block;" <?php } else {
    ?>
         style="display: none;" <?php } ?>>
    <div class = "wpbm-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category Queries Type', WPBM_TD ); ?></label>
        <div class="wpbm-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="wpbm-tooltip-info"><?php _e( 'Choose Simple Taxonomy/Category Query to display post from a single taxonomy or category with single term.For example display posts tagged with bob, under people custom taxonomy.Choose Multiple Taxonomy/Category Handling to display posts from several custom taxonomies or categories.', WPBM_TD ); ?></span>
        </div>
        <div class="wpbm-post-field-wrap">
            <div class="wpbm-info-wrap">
                <select name="wpbm_option[taxonomy_queries_type]" class="wpbm-taxonomy-queries-type">
                    <option value="simple-taxonomy"  <?php if ( isset( $wpbm_option[ 'taxonomy_queries_type' ] ) && $wpbm_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) echo 'selected=="selected"'; ?>><?php _e( 'Simple Taxonomy/Category Query', WPBM_TD ) ?></option>
                    <option value="multiple-taxonomy"  <?php if ( isset( $wpbm_option[ 'taxonomy_queries_type' ] ) && $wpbm_option[ 'taxonomy_queries_type' ] == 'multiple-taxonomy' ) echo 'selected=="selected"'; ?>><?php _e( 'Multiple Taxonomy/Category Handling', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[select_post_taxonomy]" class="wpbm-select-taxonomy">
                <option value="select" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', WPBM_TD ); ?></option>
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
                        ?>" <?php if ( isset( $wpbm_option[ 'select_post_taxonomy' ] ) && $wpbm_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', WPBM_TD ); ?></p>
        </div>
    </div>
    <div class="wpbm-simple-terms-wrap" style="display: none;">
        <div class="wpbm-post-option-wrap">
            <label><?php _e( 'Term', WPBM_TD ); ?></label>
            <div class="wpbm-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="wpbm-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', WPBM_TD ); ?></span>
            </div>
            <div class="wpbm-post-field-wrap">
                <div class="wpbm-info-wrap">
                    <select name="wpbm_option[simple_taxonomy_terms]" class="wpbm-simple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Term', WPBM_TD ); ?></option>
                        <?php
                        if ( ! empty( $wpbm_option[ 'simple_taxonomy_terms' ] ) ) {
                            echo $this -> wpbm_fetch_category_list( $wpbm_option[ 'select_post_taxonomy' ], $wpbm_option[ 'simple_taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', WPBM_TD ); ?></p>
                </div>

            </div>
        </div>
    </div>
    <div class ="wpbm-multiple-terms-wrap" style= "display: none;">
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Terms', WPBM_TD );
                        ?></label>
            <div class="wpbm-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="wpbm-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', WPBM_TD ); ?></span>
            </div>
            <div class ="wpbm-post-field-wrap">
                <div class="wpbm-info-wrap wpbm-multiple-select">
                    <select name="wpbm_option[taxonomy_terms][]" multiple="multiple" class="wpbm-multiple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Terms', WPBM_TD ); ?></option>
                        <?php
                        if ( isset( $wpbm_option[ 'taxonomy_terms' ] ) ) {
                            echo $this -> wpbm_fetch_category_list( $wpbm_option[ 'select_post_taxonomy' ], $wpbm_option[ 'taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', WPBM_TD ); ?></p>
                </div>

            </div>
        </div>
        <div class ="wpbm-post-option-wrap">
            <label><?php _e( 'Relation', WPBM_TD ); ?></label>
            <div class="wpbm-post-field-wrap">
                <select name="wpbm_option[wpbm_multiple_tax_relation]" class="wpbm-multiple-tax-relation">
                    <option value="AND"  <?php if ( isset( $wpbm_option[ 'wpbm_multiple_tax_relation' ] ) && $wpbm_option[ 'wpbm_multiple_tax_relation' ] == 'AND' ) echo 'selected=="selected"'; ?>><?php _e( 'AND', WPBM_TD ) ?></option>
                    <option value="OR"  <?php if ( isset( $wpbm_option[ 'wpbm_multiple_tax_relation' ] ) && $wpbm_option[ 'wpbm_multiple_tax_relation' ] == 'OR' ) echo 'selected=="selected"'; ?>><?php _e( 'OR', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-tax-inner-wrap">
            <?php
            if ( isset( $wpbm_option[ 'wpbm_blog' ] ) && is_array( $wpbm_option[ 'wpbm_blog' ] ) ) {

                $wpbm_blog_count = count( $wpbm_option[ 'wpbm_blog' ] );
            } else {
                $wpbm_blog_count = 0;
            }
            if ( $wpbm_blog_count > 0 ) {

                foreach ( $wpbm_option[ 'wpbm_blog' ] as $blog_key => $blog_detail ) {
                    include(WPBM_PATH . 'inc/admin/forms/term-list.php');
                }
            }
            ?>
        </div>
        <div class="wpbm-taxonomy-button">
            <input type="button" class="button-primary wpbm-add-tax-condition" value="<?php _e( 'Add New Taxonomy Condition', WPBM_TD ); ?>">
        </div>
    </div>
</div>