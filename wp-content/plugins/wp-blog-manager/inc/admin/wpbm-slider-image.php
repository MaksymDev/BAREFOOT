<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$slider_url = $_POST[ 'image_url' ];
$slider_key = $this -> wpbm_generate_random_string( 10 );
$wpbm_slider_prefix = "wpbm_extra_option[image][image_$slider_key]";
?>
<div class="wpbm-slider-wrap">
    <div class="wpbm-slider-image-preview">
        <div class="wpbm-each-slider-wrap clearfix">
            <a href="javascript:void(0)" class="wpbm-sort-slider-image"><span class="dashicons dashicons-move"></span></a>
            <a href="javascript:void(0)" class="wpbm-delete-slider-image"><span class="dashicons dashicons-trash"></span></a>
        </div>
        <div class="wpbm-slider-collection-wrap">
            <img  class="wpbm-slider-image" src="<?php echo esc_attr( $slider_url ); ?>" alt="">
        </div>
        <input type="hidden" class="wpbm-slider-image-url" name="<?php echo esc_attr( $wpbm_slider_prefix . '[slider_image_url]' ); ?>"  value="<?php echo esc_attr( $slider_url ); ?>" />
    </div>
</div>
