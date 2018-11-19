<?php if ( $display_content == '1' ) { ?>
    <div class="wpbm-car-content">
    <?php
    if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
        the_content();
    } else {
        echo substr( get_the_excerpt(), 0, $excerpt );
    }
    ?>
    </div>
        <?php
    }
