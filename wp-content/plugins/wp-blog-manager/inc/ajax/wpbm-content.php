<div class="wpbm-each-post-wrap" data-post-key="<?php echo esc_attr( $post_key ); ?>">
    <div class="wpbm-blog-wrap">
        <label><?php _e( 'Post Title', WPBM_TD ) ?></label>
        <div class="wpbm-blog-field">
            <input type="text" class="wpbm-post-title" name="wpbm_option[post][<?php echo $post_key; ?>][title]" value="<?php echo esc_attr( $title ); ?>">
            <input type="hidden" class="wpbm-post-link" name="wpbm_option[post][<?php echo $post_key; ?>][post_link]" value="<?php echo esc_url( $link ); ?>">
        </div>
    </div>
    <div class="wpbm-blog-wrap">
        <label><?php _e( 'Post Description', WPBM_TD ) ?></label>
        <div class="wpbm-blog-field">
            <textarea class="wpbm-post-description" name="wpbm_option[post][<?php echo $post_key; ?>][description]" rows="8" cols="35"><?php echo esc_attr( wp_trim_words( $content, $desc_length ) ); ?></textarea>
        </div>
    </div>
    <div class="wpbm-blog-wrap">
        <label><?php _e( 'Post Date', WPBM_TD ) ?></label>
        <div class="wpbm-blog-field">
            <input type="text" class="wpbm-post-date" name="wpbm_option[post][<?php echo $post_key; ?>][post_date]" value="<?php echo esc_attr( $date ); ?>">
            <input type="hidden" class="wpbm-post-tag" name="wpbm_option[post][<?php echo $post_key; ?>][post_tags]" value="<?php echo esc_attr( $tag ); ?>">
            <input type="hidden" class="wpbm-post-category" name="wpbm_option[post][<?php echo $post_key; ?>][post_category]" value="<?php echo esc_attr( $category ); ?>">
            <input type="hidden" class="wpbm-post-author" name="wpbm_option[post][<?php echo $post_key; ?>][post_author]" value="<?php echo esc_attr( $author ); ?>">
            <input type="hidden" class="wpbm-post-comment" name="wpbm_option[post][<?php echo $post_key; ?>][post_comment_count]" value="<?php echo esc_attr( $comment ); ?>">
            <input type="hidden" class="wpbm-post-link" name="wpbm_option[post][<?php echo $post_key; ?>][post_link]" value="<?php echo esc_attr( $link ); ?>">
        </div>
    </div>
    <div class="wpbm-media-wrap">
        <div class ="wpbm-blog-wrap">
            <label><?php _e( 'Media Type', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <select name="wpbm_option[post][<?php echo $post_key; ?>][media_type]" class="wpbm-media-type">
                    <option value="image"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] == 'image' ) echo 'selected=="selected"'; ?>><?php _e( 'Image', WPBM_TD ) ?></option>
                    <option value="slider"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] == 'slider' ) echo 'selected=="selected"'; ?>><?php _e( 'Slider', WPBM_TD ) ?></option>
                    <option value="video"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] == 'video' ) echo 'selected=="selected"'; ?>><?php _e( 'Video', WPBM_TD ) ?></option>
                    <option value="sound_cloud"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'media_type' ] == 'sound_cloud' ) echo 'selected=="selected"'; ?>><?php _e( 'Sound Cloud', WPBM_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wpbm-post-slider-wrap" style="display:none;">
            <div class ="wpbm-blog-wrap">
                <label><?php _e( 'Slider Images', WPBM_TD ); ?></label>
                <div class="wpbm-blog-field">
                    <input type="button" class="wpbm-upload-slider-button" name="wpbm-upload-slider-image"  value="Upload Images" size="25"/>
                </div>
                <div class="wpbm-slider-image-collection">
                </div>
            </div>
        </div>
        <div class="wpbm-post-video-wrap">
            <div class ="wpbm-blog-wrap">
                <label><?php _e( 'Choose Video Type', WPBM_TD ); ?></label>
                <div class="wpbm-blog-field">
                    <select name="wpbm_option[post][<?php echo $post_key; ?>][video_type]" class="wpbm-video-type">
                        <option value="youtube"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'video_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'video_type' ] == 'youtube' ) echo 'selected=="selected"'; ?>><?php _e( 'Youtube', WPBM_TD ) ?></option>
                        <option value="vimeo"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'video_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'video_type' ] == 'vimeo' ) echo 'selected=="selected"'; ?>><?php _e( 'Vimeo', WPBM_TD ) ?></option>
                        <option value="html_video"  <?php if ( isset( $wpbm_option[ 'post' ][ $post_key ][ 'video_type' ] ) && $wpbm_option[ 'post' ][ $post_key ][ 'video_type' ] == 'html_video' ) echo 'selected=="selected"'; ?>><?php _e( 'Upload Your Own', WPBM_TD ) ?></option>
                    </select>
                    <div class="wpbm-video-url-wrap">
                        <input type="text" name="wpbm_option[post][<?php echo $post_key; ?>][video_url]" placeholder="Enter the video URL" class="wpbm-video-url" value="" />
                    </div>
                    <div class="wpbm-upload-video-wrap" style="display: none;">
                        <input type="text" class="wpbm-upload-url" name="wpbm_option[post][<?php echo $post_key; ?>][upload_video_url]"  value="" />
                        <input type="button" class="wpbm-upload-video-button" name="wpbm-upload-url"  value="Upload Video" size="25"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="wpbm-sound-cloud-wrap" style="display: none;">
            <div class ="wpbm-blog-wrap">
                <label><?php _e( 'Client ID', WPBM_TD ); ?></label>
                <div class="wpbm-blog-field">
                    <input type="text" class="wpbm-audio-client-id" name="wpbm_option[post][<?php echo $post_key; ?>][audio-client-id]"  value="" />
                </div>
            </div>
            <div class ="wpbm-blog-wrap">
                <label><?php _e( 'Audio URL', WPBM_TD ); ?></label>
                <div class="wpbm-blog-field">
                    <input type="text" class="wpbm-upload-url" name="wpbm_option[post][<?php echo $post_key; ?>][upload_video_url]"  value="" />
                </div>
            </div>
        </div>
    </div>
    <div class="wpbm-blog-wrap">
        <label><?php _e( 'Post Link Button', WPBM_TD ) ?></label>
        <div class="wpbm-blog-field">
            <label class="wpbm-button-check"><input type="checkbox" class="wpbm-show-post-button" ><?php _e( 'Check to post link button', WPBM_TD ) ?></label>
            <input type="hidden" name="wpbm_option[post][<?php echo $post_key; ?>][show-post-button]" class="wpbm-post-button-val" value="0" />
        </div>
    </div>
    <div class="wpbm-post-link-wrap" style="display: none;">
        <div class="wpbm-blog-wrap">
            <label  class="wpbm-button-text"><?php _e( 'Button Text', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <input type="text" class="wpbm-button-text" name="wpbm_option[post][<?php echo $post_key; ?>][button_text]" placeholder="<?php _e( 'Read More', WPBM_TD ); ?>" value=""/>
            </div>
        </div>
        <div class="wpbm-blog-wrap">
            <label><?php _e( 'Button URL', WPBM_TD ); ?></label>
            <div class="wpbm-blog-field">
                <label><input type="radio" value="post_link" name="wpbm_option[post][<?php echo $post_key; ?>][choose_post_link]" <?php
                    if ( isset( $wpbm_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ] ) ) {
                        checked( $wpbm_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ], 'post_link' );
                    }
                    ?> class="wpbm-select-post-link"/><?php _e( 'Post link', WPBM_TD ); ?></label>
                <label><input type="radio" value="custom_link" name="wpbm_option[post][<?php echo $post_key; ?>][choose_post_link]" <?php
                    if ( isset( $wpbm_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ] ) ) {
                        checked( $wpbm_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ], 'custom_link' );
                    }
                    ?>  class="wpbm-select-post-link"/><?php _e( 'Custom link', WPBM_TD ); ?></label>
                <div class="wpbm-custom-link" style="display:none;">
                    <input type="text" class="wpbm-button-url" name="wpbm_option[post][<?php echo $post_key; ?>][button_url]" placeholder="http://example.com" value=""/>
                </div>
            </div>
        </div>
    </div>
</div>