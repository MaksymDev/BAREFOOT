<?php
if ( $display_content == '1' ) {
    ?>
    <div class = "wpbm-content"> <?php
        if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
            the_content();
        } else {
            //echo substr( get_the_excerpt(), 0, $excerpt );
            echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), $excerpt, '...' );
        }
        ?></div>
    <?php
}