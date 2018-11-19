<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_tax = sanitize_text_field( $_POST[ 'select_tax' ] );
if ( $select_tax == 'select' ) {
    ?>
    <option value = "select" ><?php echo _e( 'Please Select Taxonomy', WPBM_TD ); ?></option>
    <?php
} else {
    echo $this -> wpbm_fetch_category_list( $select_tax, $wpbm_option[ 'multiple_taxonomy_terms' ] );
}