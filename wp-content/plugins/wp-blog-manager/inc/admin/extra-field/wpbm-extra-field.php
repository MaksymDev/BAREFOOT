<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$wpbm_extra_option = get_post_meta( $post_id, 'wpbm_extra_option', true );
?>
<div class="wpbm-media-wrap">
    <div class ="wpbm-blog-wrap">
        <label><?php _e( 'Media Type', WPBM_TD ); ?></label>
        <div class="wpbm-blog-field">
            <select name="wpbm_extra_option[media_type]" class="wpbm-media-type">
                <option value="image"  <?php if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) echo 'selected=="selected"'; ?>><?php _e( 'Image', WPBM_TD ) ?></option>
                <option value="slider"  <?php if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'slider' ) echo 'selected=="selected"'; ?>><?php _e( 'Slider', WPBM_TD ) ?></option>
                <option value="video"  <?php if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'video' ) echo 'selected=="selected"'; ?>><?php _e( 'Video', WPBM_TD ) ?></option>
                <option value="sound_cloud"  <?php if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'sound_cloud' ) echo 'selected=="selected"'; ?>><?php _e( 'Sound Cloud', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>

    <div class="wpbm-post-slider-wrap" style="display:none;">
        <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Slider Images', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <input type="button" class="wpbm-upload-slider-button button-secondary" name="wpbm-upload-slider-image"  value="Upload Images" size="25"/>
            </div>
            <div class="wpbm-slider-image-collection">
                <?php
                if ( isset( $wpbm_extra_option[ 'image' ] ) ) {
                    foreach ( $wpbm_extra_option[ 'image' ] as $image_key => $detail ) {
                        ?>
                        <div class="wpbm-slider-wrap">
                            <div class="wpbm-slider-image-preview">
                                <div class="wpbm-each-slider-wrap clearfix">
                                    <a href="javascript:void(0)" class="wpbm-sort-slider-image"><span class="dashicons dashicons-move"></span></a>
                                    <a href="javascript:void(0)" class="wpbm-delete-slider-image"><span class="dashicons dashicons-trash"></span></a>
                                </div>
                                <div class="wpbm-slider-collection-wrap">
                                    <img  class="wpbm-slider-image" src="<?php
                                    if ( isset( $wpbm_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] ) ) {
                                        echo esc_url( $wpbm_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] );
                                    }
                                    ?>" alt="">
                                </div>
                                <input type="hidden" class="wpbm-slider-image-url" name="wpbm_extra_option[image][<?php echo $image_key; ?>][slider_image_url]"  value="<?php
                                if ( isset( $wpbm_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] ) ) {
                                    echo esc_url( $wpbm_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] );
                                }
                                ?>" />
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="wpbm-post-video-wrap">
        <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Choose Video Type', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <select name="wpbm_extra_option[video_type]" class="wpbm-video-type">
                    <option value="youtube"  <?php if ( isset( $wpbm_extra_option[ 'video_type' ] ) && $wpbm_extra_option[ 'video_type' ] == 'youtube' ) echo 'selected=="selected"'; ?>><?php _e( 'Youtube', WPBM_TD ) ?></option>
                    <option value="vimeo"  <?php if ( isset( $wpbm_extra_option[ 'video_type' ] ) && $wpbm_extra_option[ 'video_type' ] == 'vimeo' ) echo 'selected=="selected"'; ?>><?php _e( 'Vimeo', WPBM_TD ) ?></option>
                    <option value="html_video"  <?php if ( isset( $wpbm_extra_option[ 'video_type' ] ) && $wpbm_extra_option[ 'video_type' ] == 'html_video' ) echo 'selected=="selected"'; ?>><?php _e( 'Upload Your Own', WPBM_TD ) ?></option>
                </select>
                <div class="wpbm-video-url-wrap">
                    <input type="text" name="wpbm_extra_option[video_url]" placeholder="Enter the video URL" class="wpbm-video-url"
                           value="<?php
                           if ( isset( $wpbm_extra_option[ 'video_url' ] ) ) {
                               echo esc_attr( $wpbm_extra_option[ 'video_url' ] );
                           }
                           ?>" />
                </div>
                <div class="wpbm-upload-video-wrap" style="display: none;">
                    <input type="text" class="wpbm-upload-url" name="wpbm_extra_option[upload_video_url]"
                           value="<?php
                           if ( isset( $wpbm_extra_option[ 'upload_video_url' ] ) ) {
                               echo esc_attr( $wpbm_extra_option[ 'upload_video_url' ] );
                           }
                           ?>" />
                    <input type="button" class="wpbm-upload-video-button button-secondary" name="wpbm-upload-url"  value="Upload Video" size="25"/>
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-sound-cloud-wrap" style="display: none;">
        <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Audio Type', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
               <select name="wpbm_extra_option[soundclound_audio_type]" class="wpbm-audio-type">
                    <option value="client-id"  <?php if ( isset( $wpbm_extra_option[ 'soundclound_audio_type' ] ) && $wpbm_extra_option[ 'soundclound_audio_type' ] == 'client-id' ) echo 'selected=="selected"'; ?>><?php _e( 'Client ID', WPBM_TD ) ?></option>
                    <option value="track-id"  <?php if ( isset( $wpbm_extra_option[ 'soundclound_audio_type' ] ) && $wpbm_extra_option[ 'soundclound_audio_type' ] == 'track-id' ) echo 'selected=="selected"'; ?>><?php _e( 'Track ID', WPBM_TD ) ?></option>
                </select>
                <p class="description"><?php _e('If the SoundCloud refuse to give Client ID then please use Track ID',WPBM_TD); ?></p>
            </div>
        </div>
        <div class="wpbm-client-wrapper">
        <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Client ID', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <input type="text" class="wpbm-audio-client-id" name="wpbm_extra_option[audio_client_id]"
                       value="<?php
                       if ( isset( $wpbm_extra_option[ 'audio_client_id' ] ) ) {
                           echo esc_attr( $wpbm_extra_option[ 'audio_client_id' ] );
                       }
                       ?>" />
            </div>
        </div>
        </div>
        <div class="wpbm-track-wrapper">
          <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Track ID', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <input type="text" class="wpbm-audio-track-id" name="wpbm_extra_option[audio_track_id]"
                       value="<?php
                       if ( isset( $wpbm_extra_option[ 'audio_track_id' ] ) ) {
                           echo esc_attr( $wpbm_extra_option[ 'audio_track_id' ] );
                       }
                       ?>" />
                       <p class="description"><a target="_blank" href="https://accesspressthemes.com/documentation/wp-blog-manager/"><?php _e('Please follow documentation to get Track ID',WPBM_TD); ?></a></p>
            </div>
        </div>
        </div>
        <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Audio URL', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <input type="text" class="wpbm-upload-audio-url" name="wpbm_extra_option[upload_audio_url]"
                       value="<?php
                       if ( isset( $wpbm_extra_option[ 'upload_audio_url' ] ) ) {
                           echo esc_attr( $wpbm_extra_option[ 'upload_audio_url' ] );
                       }
                       ?>" />
            </div>
        </div>
    </div>
</div>