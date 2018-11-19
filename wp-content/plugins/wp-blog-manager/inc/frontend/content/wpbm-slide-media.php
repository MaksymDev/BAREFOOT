<?php
$media_type = isset( $wpbm_extra_option[ 'media_type' ] ) ? esc_attr( $wpbm_extra_option[ 'media_type' ] ) : 'image';
if ( $media_type == 'video' ) {
    $vid_url = $wpbm_extra_option[ 'video_url' ];
    ?>
    <div class="wpbm-video wpbm-common-wrap">
        <?php
        if ( isset( $wpbm_extra_option[ 'video_type' ] ) && $wpbm_extra_option[ 'video_type' ] == 'youtube' ) {
            parse_str( parse_url( $vid_url, PHP_URL_QUERY ), $vid );
            $video = $vid[ 'v' ];
            ?>
            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $video ); ?>?enablejsapi=1&
                    modestbranding=1&showinfo=0&rel=0; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php
                } else if ( isset( $wpbm_extra_option[ 'video_type' ] ) && $wpbm_extra_option[ 'video_type' ] == 'vimeo' ) {
                    $urlParts = explode( "/", parse_url( $vid_url, PHP_URL_PATH ) );
                    $video = ( int ) $urlParts[ count( $urlParts ) - 1 ];
                    ?>
            <iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $video ); ?>?api=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            <?php
        }
        //HTML video
        else {
            $ext = pathinfo( $vid_url, PATHINFO_EXTENSION );
            ?>
            <video>
                <source src="<?php echo esc_attr( $vid_url ); ?>" type="video/<?php echo $ext; ?>">
            </video>
            <?php
        }
        ?>
    </div>
    <?php
}
//Soundcloud audio
else if ( $media_type == 'sound_cloud' ) {
    $audio_type = isset( $wpbm_extra_option[ 'soundclound_audio_type' ] ) ? esc_attr( $wpbm_extra_option[ 'soundclound_audio_type' ] ) : 'client-id';

    if ( $audio_type == 'client-id' ) {
        $url = $wpbm_extra_option[ 'upload_audio_url' ];
        $client_id = $wpbm_extra_option[ 'audio_client_id' ];
        $get = wp_remote_get( "https://api.soundcloud.com/resolve.json?url=$url&client_id=$client_id" );
        $retrieve = wp_remote_retrieve_body( $get );
        $result = json_decode( $retrieve, true );
        if ( preg_match( "/(errors)+/", $retrieve ) ) {
            return false;
        }
        $track_id = $result[ 'id' ];
    } else {
        $track_id = $wpbm_extra_option[ 'audio_track_id' ];
    }
    ?>
    <div class="wpbm-audio-wrap wpbm-common-wrap">
        <iframe  scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $track_id; ?>&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;visual=true"></iframe>
    </div>
    <?php
} else {
    if ( $wpbm_option[ 'wpbm_select_layout' ] == 'content-block' ) {
        $image = 'medium';
    } else {
        $image = isset( $wpbm_option[ 'wpbm_image_size' ] ) ? esc_attr( $wpbm_option[ 'wpbm_image_size' ] ) : 'full';
    }
    ?>
    <div class="wpbm-image">
        <?php if ( has_post_thumbnail( $product_post_id ) ) { ?>
            <a href="<?php echo get_permalink( $product_post_id ); ?>" ><?php echo get_the_post_thumbnail( $product_post_id, $image ); ?></a>
            <?php
        } else {
            ?>
            <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
            <?php
        }
        ?></div>
        <?php
}