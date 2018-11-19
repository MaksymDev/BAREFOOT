<div class ="wpbm-post-option-wrap">
    <label for="wpbm-show-keyword-query" class="wpbm-keyword-relation">
        <?php _e( 'Filter Keyword Search', WPBM_TD ); ?>
    </label>
    <div class="wpbm-post-field-wrap">
        <label class="wpbm-switch">
            <input type="checkbox" class="wpbm-show-keyword-relation wpbm-checkbox" value="<?php
            if ( isset( $wpbm_option[ 'wpbm_show_keyword_query' ] ) ) {
                echo esc_attr( $wpbm_option[ 'wpbm_show_keyword_query' ] );
            } else {
                echo '0';
            }
            ?>" name="wpbm_option[wpbm_show_keyword_query]" <?php if ( isset( $wpbm_option[ 'wpbm_show_keyword_query' ] ) && $wpbm_option[ 'wpbm_show_keyword_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="wpbm-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show posts based on a keyword search.', WPBM_TD ) ?></p>
    </div>
</div>
<div class="wpbm-keyword-inner-wrap"  <?php if ( isset( $wpbm_option[ 'wpbm_show_keyword_query' ] ) && $wpbm_option[ 'wpbm_show_keyword_query' ] == '1' ) { ?>
         style="display: block;" <?php } else { ?>
         style="display: none;" <?php } ?>>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Enter the keyword', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <input type="text" class="wpbm-search-keyword"  name="wpbm_option[wpbm_search_keyword]"  value="<?php
                   if ( isset( $wpbm_option[ 'wpbm_search_keyword' ] ) ) {
                       echo $wpbm_option[ 'wpbm_search_keyword' ];
                   }
                   ?>"/>
        </div>
    </div>
</div>