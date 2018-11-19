<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: WP Blog Manager
 * Plugin URI:  https://accesspressthemes.com/wordpress-plugins/wp-blog-manager/
 * Description:  Plugin to Manage / Design WordPress Blog | 100+ stunning, responsive, creative and powerful design.
 * Version:     1.1.3
 * Author:      AccessPress Themes
 * Author URI:  http://accesspressthemes.com/
 * Domain Path: /languages/
 * Text Domain: wp-blog-manager
 * */
/**
 * Declaration of necessary constants for plugin
 * */
defined( 'WPBM_VERSION' ) or define( 'WPBM_VERSION', '1.1.3' ); //plugin version
defined( 'WPBM_TD' ) or define( 'WPBM_TD', 'wp-blog-manager' ); //plugin's text domain
defined( 'WPBM_IMG_DIR' ) or define( 'WPBM_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' ); //plugin image directory
defined( 'WPBM_JS_DIR' ) or define( 'WPBM_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );  //plugin js directory
defined( 'WPBM_CSS_DIR' ) or define( 'WPBM_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); // plugin css dir
defined( 'WPBM_PATH' ) or define( 'WPBM_PATH', plugin_dir_path( __FILE__ ) );
defined( 'WPBM_URL' ) or define( 'WPBM_URL', plugin_dir_url( __FILE__ ) );
include(WPBM_PATH . '/inc/frontend/wpbm-mobile-detect.php');
if ( ! class_exists( 'WPBM_Class' ) ) {

    class WPBM_Class{

        /**
         * Initializes the plugin functions
         */
        function __construct(){

            add_action( 'init', array( $this, 'wpbm_plugin_text_domain' ) ); //loads text domain for translation ready
            add_action( 'wp_enqueue_scripts', array( $this, 'wpbm_register_assets' ) ); //registers scripts and styles for front end
            add_action( 'init', array( $this, 'wpbm_register_post_type' ) ); //register custom post type
            add_action( 'admin_enqueue_scripts', array( $this, 'wpbm_register_admin_assets' ) ); //register plugin scripts and css in wp-admin
            add_action( 'add_meta_boxes', array( $this, 'wpbm_add_blog_metabox' ) ); //added blog showcase metabox
            add_action( 'add_meta_boxes', array( $this, 'wpbm_shortcode_usage_metabox' ) ); //added shortcode usages metabox
            add_action( 'add_meta_boxes', array( $this, 'wpbm_add_settings_metabox' ) ); //added blog showcase metabox
            add_action( 'save_post', array( $this, 'wpbm_meta_save' ) );
            add_action( 'save_post', array( $this, 'wpbm_extra_field_save' ) );
            add_filter( 'the_content', array( $this, 'wpbm_preview_page' ) );
            add_action( 'wp_ajax_wpbm_post_submit', array( $this, 'wpbm_post_submit' ) );
            add_action( 'wp_ajax_wpbm_slider_images', array( $this, 'wpbm_slider_images' ) );
            add_action( 'wp_ajax_wpbm_all_post_submit', array( $this, 'wpbm_all_post_submit' ) );
            add_action( 'wp_ajax_wpbm_selected_post_taxonomy', array( $this, 'wpbm_selected_post_taxonomy' ) );
            add_action( 'wp_ajax_wpbm_selected_taxonomy_terms', array( $this, 'wpbm_selected_taxonomy_terms' ) );
            add_action( 'wp_ajax_wpbm_hierarchy_terms', array( $this, 'wpbm_hierarchy_terms' ) );
            add_action( 'wp_ajax_wpbm_add_meta_condition', array( $this, 'wpbm_add_meta_condition' ) );
            add_action( 'wp_ajax_wpbm_add_tax_condition', array( $this, 'wpbm_add_tax_condition' ) );
            add_shortcode( 'wpbm', array( $this, 'wpbm_generate_shortcode' ) ); // generating shortcode
            add_action( 'template_redirect', array( $this, 'wpbm_page_template_redirect' ) );
            add_action( 'wp_ajax_wpbm_filter_tax_terms', array( $this, 'wpbm_filter_tax_terms' ) );
            add_action( 'wp_ajax_wpbm_pagination_action', array( $this, 'wpbm_pagination_action' ) );
            add_action( 'wp_ajax_nopriv_wpbm_pagination_action', array( $this, 'wpbm_pagination_action' ) );
            add_action( 'admin_menu', array( $this, 'wpbm_register_about_us_page' ) ); //add submenu page
            add_action( 'admin_menu', array( $this, 'wpbm_register_stuff_page' ) ); //add submenu page
            add_filter( 'post_row_actions', array( $this, 'wpbm_remove_row_actions' ), 10, 1 );
            add_filter( 'manage_wpblogmanager_posts_columns', array( $this, 'wpbm_columns_head' ) );
            add_action( 'manage_wpblogmanager_posts_custom_column', array( $this, 'wpbm_columns_content' ), 10, 2 );
            add_action( 'admin_head-post-new.php', array( $this, 'wpbm_posttype_admin_css' ) );
            add_action( 'admin_head-post.php', array( $this, 'wpbm_posttype_admin_css' ) );
            add_action( 'widgets_init', array( $this, 'wpbm_widget_register' ) );
        }

//load the text domain for language translation
        function wpbm_plugin_text_domain(){
            load_plugin_textdomain( 'wp-blog-manager', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

//register admin assets
        function wpbm_register_admin_assets( $hook ){
            global $post;
            wp_enqueue_media();
            wp_enqueue_style( 'thickbox' );
            wp_enqueue_script( 'thickbox' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_script( 'wpbm-admin-script', WPBM_JS_DIR . '/wpbm-admin-script.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-ui-core' ), WPBM_VERSION );
            $admin_ajax_nonce = wp_create_nonce( 'wpbm-admin-ajax-nonce' );
            $admin_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $admin_ajax_nonce );
            wp_localize_script( 'wpbm-admin-script', 'wpbm_backend_js_params', $admin_ajax_object );
            wp_enqueue_style( 'wpbm-backend-style', WPBM_CSS_DIR . '/wpbm-backend-style.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-jquery-ui-style', WPBM_CSS_DIR . '/jquery-ui-css-1.12.1.css', false, WPBM_VERSION );
        }

//register frontend assests
        function wpbm_register_assets(){
            wp_enqueue_style( 'wpbm-owl-style', WPBM_CSS_DIR . '/owl.carousel.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-bxslider-style', WPBM_CSS_DIR . '/jquery.bxslider.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-fontawesome', WPBM_CSS_DIR . '/font-awesome.min.css', false, WPBM_VERSION );
            wp_enqueue_style( 'wpbm-font', '//fonts.googleapis.com/css?family=Bitter|Hind|Playfair+Display:400,400i,700,700i,900,900i|Open+Sans:400,500,600,700,900|Lato:300,400,700,900|Montserrat|Droid+Sans|Roboto|Lora:400,400i,700,700i|Roboto+Slab|Rubik|Merriweather:300,400,700,900|Poppins|Ropa+Sans|Playfair+Display|Rubik|Source+Sans+Pro|Roboto+Condensed|Roboto+Slab:300,400,700|Amatic+SC:400,700|Quicksand|Oswald|Quicksand:400,500,700', false );
            wp_enqueue_style( 'wpbm-frontend-style', WPBM_CSS_DIR . '/wpbm-frontend.css', array( 'wpbm-owl-style', 'wpbm-bxslider-style', 'wpbm-font' ), WPBM_VERSION );
            wp_enqueue_style( 'wpbm-responsive-style', WPBM_CSS_DIR . '/wpbm-responsive.css', false, WPBM_VERSION );
            wp_enqueue_script( 'wpbm-owl-script', WPBM_JS_DIR . '/owl.carousel.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-owl-script-1', WPBM_JS_DIR . '/owl.carousel.1.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-isotope-script', WPBM_JS_DIR . '/isotope.min.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-bxslider-script', WPBM_JS_DIR . '/jquery.bxslider.min.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-imageloaded-script', WPBM_JS_DIR . '/imagesloaded.min.js', array( 'jquery' ), WPBM_VERSION );
            wp_enqueue_script( 'wpbm-frontend-script', WPBM_JS_DIR . '/wpbm-frontend.js', array( 'jquery', 'wpbm-owl-script', 'wpbm-imageloaded-script', 'wpbm-isotope-script', 'wpbm-bxslider-script' ), WPBM_VERSION );
            $frontend_ajax_nonce = wp_create_nonce( 'wpbm-frontend-ajax-nonce' );
            $frontend_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $frontend_ajax_nonce );
            wp_localize_script( 'wpbm-frontend-script', 'wpbm_frontend_js_params', $frontend_ajax_object );
        }

//register blog manager custom post type
        function wpbm_register_post_type(){
            include('inc/admin/register/wpbm-register-post.php');
            register_post_type( 'WP Blog Manager', $args );
        }

//adding Blog metabox
        function wpbm_add_blog_metabox(){
            add_meta_box( 'wpbm_add_blog', __( 'WP Blog Manager', WPBM_TD ), array( $this, 'wpbm_add_blog_callback' ), 'wpblogmanager', 'normal', 'high' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function wpbm_add_blog_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'wpbm_blog_nonce' );
            include('inc/admin/wpbm-blog-meta.php');
        }

        /*
         * Preview page
         */

        function wpbm_preview_page( $content ){
            if ( in_array( 'get_the_excerpt', $GLOBALS[ 'wp_current_filter' ] ) ) {

                return $content;
            }
            if ( is_singular( 'wpblogmanager' ) ) {

                if ( isset( $_GET[ 'preview_id' ] ) && is_user_logged_in() ) {

                    $wpbm_preview_id = intval( sanitize_text_field( $_GET[ 'preview_id' ] ) );

                    return do_shortcode( "[wpbm id='$wpbm_preview_id']" );
                }if ( isset( $_GET[ 'p' ] ) && is_user_logged_in() ) {

                    $wpbm_p_id = intval( sanitize_text_field( $_GET[ 'p' ] ) );

                    return do_shortcode( "[wpbm id='$wpbm_p_id']" );
                } else {
                    return $content;
                }
            } else {
                return $content;
            }
        }

//save the metabox
        function wpbm_meta_save( $post_id ){
            global $post;
            if ( ! empty( $post ) ) {
// Checks save status
                $is_autosave = wp_is_post_autosave( $post_id );
                $is_revision = wp_is_post_revision( $post_id );
                $is_valid_nonce = ( isset( $_POST[ 'wpbm_blog_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpbm_blog_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
                if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                    return;
                }

                if ( isset( $_POST[ 'wpbm_option' ] ) ) {
                    $wpbm_array = ( array ) $_POST[ 'wpbm_option' ];
                    $val = $this -> sanitize_array( $wpbm_array );
                    update_post_meta( $post_id, 'wpbm_option', $val );
                }
                return;
            }
        }

//adding Blog metabox
        function wpbm_add_settings_metabox(){
            foreach ( array_keys( $GLOBALS[ 'wp_post_types' ] ) as $post_type ) {
// Skip:
                if ( in_array( $post_type, array( 'attachment', 'revision', 'nav_menu_item', 'wpblogmanager' ) ) )
                    continue;

                add_meta_box( 'wpbm_add_setting_blog', __( 'WP Blog Manager', WPBM_TD ), array( $this, 'wpbm_extra_field_callback' ), $post_type, 'normal', 'core' );
            }
        }

        /*
         * callback function for Blog manager metabox
         */

        function wpbm_extra_field_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'wpbm_blog_nonce' );
            include('inc/admin/extra-field/wpbm-extra-field.php');
        }

//save the extra field metabox values
        function wpbm_extra_field_save( $post_id ){

// Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST[ 'wpbm_blog_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpbm_blog_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }
            if ( isset( $_POST[ 'wpbm_extra_option' ] ) ) {

                $wpbm_extra = ( array ) $_POST[ 'wpbm_extra_option' ];

                $extra_field = $this -> sanitize_array( $wpbm_extra );
// save data
                update_post_meta( $post_id, 'wpbm_extra_option', $extra_field );
            }
            return;
        }

        function print_array( $array ){
            echo '<pre>';
            print_r( $array );
            echo '</pre>';
        }

        /*
         * Ajax call for submiting the post details
         */

        function wpbm_post_submit(){
            global $wpdb;
            include( 'inc/ajax/wpbm-post-submit.php' );
            die();
        }

        /*
         * Ajax call for slider images
         */

        function wpbm_slider_images(){
            global $wpdb;
            include( 'inc/admin/wpbm-slider-image.php' );
            die();
        }

        function wpbm_all_post_submit(){
            global $wpdb;
            include( 'inc/ajax/wpbm-all-post-submit.php' );
            die();
        }

        function wpbm_selected_post_taxonomy(){
            global $wpdb;
            include( 'inc/ajax/fetch-taxonomy.php' );
            die();
        }

        function wpbm_selected_taxonomy_terms(){
            global $wpdb;
            include( 'inc/ajax/fetch-terms.php' );
            die();
        }

        function wpbm_hierarchy_terms(){
            global $wpdb;
            include( 'inc/ajax/hierarchy-terms.php' );
            die();
        }

        function wpbm_add_meta_condition(){
            global $wpdb;
            include( 'inc/ajax/add-meta.php' );
            die();
        }

        function wpbm_add_tax_condition(){
            global $wpdb;
            include( 'inc/ajax/add-tax.php' );
            die();
        }

        function wpbm_filter_tax_terms(){
            global $wpdb;
            include( 'inc/ajax/filter-tax.php' );
            die();
        }

        /*
         * Generate random key string
         */

        function wpbm_generate_random_string( $length ){
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i ++ ) {
                $random_string .= $string[ rand( 0, 61 ) ];
            }
            return $random_string;
        }

        function wpbm_generate_shortcode( $atts, $content = null ){

            ob_start();
            include('inc/frontend/wpbm-frontend.php');
            $blog = ob_get_contents();
            ob_end_clean();
            return $blog;
        }

        /*
         * Shortcode Usage Metabox
         */

        function wpbm_shortcode_usage_metabox(){
            add_meta_box( 'wpbm_shortcode_usage_option', __( 'WP Blog Manager Usage', WPBM_TD ), array( $this, 'wpbm_shortcode_usage' ), 'wpblogmanager', 'side', 'default' );
        }

        function wpbm_shortcode_usage( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wpbm_shortcode_usage_option_nonce' );
            include('inc/admin/settings/wpbm-usages.php');
        }

//returns all the terms for category dropdown as options
        function wpbm_fetch_category_list( $taxonomy, $term_id ){
            $option_html = "";
            $taxonomies_array[] = $taxonomy;
            $terms = get_terms( $taxonomy, array( 'hide_empty' => false ) );
            $categoryHierarchy = array();
            $this -> wpbm_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
            if ( count( $categoryHierarchy ) > 0 ) { //condition check if the taxonomy has atleast single term
                $terms_exclude = array();
                $option_html .= $this -> wpbm_print_option( $categoryHierarchy, 1, '', '', $term_id );
            }

            return $option_html;
        }

        function wpbm_sort_terms_hierarchicaly( Array &$cats, Array &$into, $parentId = 0 ){
            foreach ( $cats as $i => $cat ) {
                if ( $cat -> parent == $parentId ) {
                    $into[ $cat -> term_id ] = $cat;
                    unset( $cats[ $i ] );
                }
            }

            foreach ( $into as $topCat ) {
                $topCat -> children = array();
                $this -> wpbm_sort_terms_hierarchicaly( $cats, $topCat -> children, $topCat -> term_id );
            }
        }

        function wpbm_print_option( $terms, $hierarchical = 1, $form = '', $field_title = '', $selected_term = array() ){

            foreach ( $terms as $term ) {
                $space = $this -> wpbm_check_parent( $term );
                $option_value = $term -> term_id;
                if ( is_array( $selected_term ) ) {
                    $selected = (in_array( $option_value, $selected_term )) ? 'selected="selected"' : '';
                } else {
                    $selected = ($selected_term == $option_value) ? 'selected="selected"' : '';
                }

                $form .= '<option value="' . $option_value . '" ' . $selected . '>' . $space . $term -> name . '</option>';


                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> wpbm_print_option( $term -> children, $hierarchical, '', $field_title, $selected_term );
                }
            }
            return $form;
        }

        function wpbm_check_parent( $term, $space = '' ){
            if ( is_object( $term ) ) {
                if ( $term -> parent != 0 ) {
                    $space .= str_repeat( '&nbsp;', 2 );
                    $parent_term = get_term_by( 'id', $term -> parent, $term -> taxonomy );
// var_dump($space);
                    $space .= $this -> wpbm_check_parent( $parent_term, $space );
                }
            }

            return $space;
        }

        function wpbm_print_checkbox( $terms, $form = '', $field_title = '', $selected_term = array() ){
            foreach ( $terms as $term ) {
                $space = $this -> wpbm_check_parent( $term );
                $option_value = $term -> slug;
                if ( is_array( $selected_term ) ) {
                    $checked = (in_array( $option_value, $selected_term )) ? 'checked="checked"' : '';
                } else {
                    $checked = ($selected_term == $option_value) ? 'checked="checked"' : '';
                }
                $form .= '<label class="wpbm-checkbox-label">' . $space . '<input type="checkbox" name="' . $field_title . '[]"  value="' . $option_value . '" ' . $checked . '/>' . $term -> name . '</label>';

                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> wpbm_print_checkbox( $term -> children, '', $field_title, $selected_term );
                }
            }

            return $form;
        }

        /*
         * Redirect function for view count
         */

        function wpbm_get_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = get_post_meta( $postID, $count_key, true );
            if ( $count == '' ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );

                return '0 View';
            }

            return $count . ' Views';
        }

        function wpbm_set_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = ( int ) get_post_meta( $postID, $count_key, true );
            if ( $count < 1 ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $count_key, ( string ) $count );
            }
        }

        function wpbm_page_template_redirect(){
            if ( is_single() ) {
                $this -> wpbm_set_post_view( get_the_ID() );
            }
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array( $array = array(), $sanitize_rule = array() ){
            if ( ! is_array( $array ) || count( $array ) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( ! is_array( $v ) ) {

                    $default_sanitize_rule = (is_numeric( $k )) ? 'html' : 'text';
                    $sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this -> sanitize_value( $v, $sanitize_type );
                }
                if ( is_array( $v ) ) {
                    $array[ $k ] = $this -> sanitize_array( $v, $sanitize_rule );
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value( $value = '', $sanitize_type = 'text' ){
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html( 'post' );
                    return wp_kses( $value, $allowed_html );
                    break;
                default:
                    return sanitize_text_field( $value );
                    break;
            }
        }

        function generate_foods_meta_keys(){
            global $wpdb;
            $post_type = 'foods';
            $query = "
                SELECT DISTINCT($wpdb -> postmeta.meta_key)
                FROM $wpdb -> posts
                LEFT JOIN $wpdb -> postmeta
                ON $wpdb -> posts.ID = $wpdb -> postmeta.post_id
                WHERE $wpdb -> posts.post_type = '%s'
                AND $wpdb -> postmeta.meta_key != ''
                AND $wpdb -> postmeta.meta_key NOT RegExp '(^[_0-9].+$)'
                AND $wpdb -> postmeta.meta_key NOT RegExp '(^[0-9]+$)'
                ";
            $meta_keys = $wpdb -> get_col( $wpdb -> prepare( $query, $post_type ) );
            set_transient( 'foods_meta_keys', $meta_keys, 60 * 60 * 24 ); # create 1 Day Expiration
            return $meta_keys;
        }

        /*
         * pagination
         */

        function wpbm_pagination_action(){
            include('inc/frontend/wpbm-pagination-query.php');
            die();
        }

        /*
         * Adding Submenu page
         */

        function wpbm_register_about_us_page(){
            add_submenu_page(
                    'edit.php?post_type=wpblogmanager', __( 'About Us', WPBM_TD ), __( 'About Us', WPBM_TD ), 'manage_options', 'wpbm-about-us', array( $this, 'wpbm_about_callback' ) );
        }

        function wpbm_about_callback(){

            include('inc/admin/wpbm-about-page.php');
        }

        function wpbm_register_stuff_page(){
            add_submenu_page(
                    'edit.php?post_type=wpblogmanager', __( 'More WordPress Stuff', WPBM_TD ), __( 'More WordPress Stuff', WPBM_TD ), 'manage_options', 'wpbm-stuff-page', array( $this, 'wpbm_stuff_callback' ) );
        }

        function wpbm_stuff_callback(){

            include('inc/admin/wpbm-stuff-page.php');
        }

        function wpbm_remove_row_actions( $actions ){
            if ( get_post_type() == 'wpblogmanager' ) { // choose the post type where you want to hide the button
                unset( $actions[ 'view' ] ); // this hides the VIEW button on your edit post screen
                unset( $actions[ 'inline hide-if-no-js' ] );
            }
            return $actions;
        }

        /* Add custom column to post list */

        function wpbm_columns_head( $columns ){
            $columns[ 'shortcodes' ] = __( 'Shortcodes', WPBM_TD );
            $columns[ 'template' ] = __( 'Template Include', WPBM_TD );
            return $columns;
        }

        function wpbm_columns_content( $column, $post_id ){

            if ( $column == 'shortcodes' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="20" readonly="readonly">[wpbm id="<?php echo $post_id; ?>"]</textarea><?php
            }
            if ( $column == 'template' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="41" readonly="readonly">&lt;?php echo do_shortcode("[wpbm id='<?php echo $post_id; ?>']"); ?&gt;</textarea><?php
            }
        }

        /*
         * Remove view and preview from wp blog post
         */

        function wpbm_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                /* set post types */
                'wpblogmanager'
            );
            if ( in_array( $post_type, $post_types ) )
                echo '<style type="text/css">#view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        function wpbm_widget_register(){
            register_widget( 'WPBM_Widget' );
        }

        // retrieves the attachment ID from the file URL
        function wpbm_get_image_id( $image_url ){
            global $wpdb;
            $query = "SELECT ID FROM {$wpdb -> posts} WHERE guid='$image_url'";
            $id = $wpdb -> get_var( $query );
            return $id;
        }

    }

//class terminations

    $wpbm_obj = new WPBM_Class();
}//class exist check close

include('inc/admin/register/wpbm-widget.php');
