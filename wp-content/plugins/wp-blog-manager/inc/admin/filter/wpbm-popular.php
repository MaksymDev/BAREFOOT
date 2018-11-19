<div class ="wpbm-post-option-wrap">
    <label for="wpbm-show-popular-query" class="wpbm-popular-relation">
        <?php _e( 'Filter Popular Post', WPBM_TD ); ?>
    </label>
    <div class="wpbm-post-field-wrap">
        <label class="wpbm-switch">
            <input type="checkbox" class="wpbm-show-popular-relation wpbm-checkbox" value="<?php
            if ( isset( $wpbm_option[ 'wpbm_show_popular_query' ] ) ) {
                echo esc_attr( $wpbm_option[ 'wpbm_show_popular_query' ] );
            } else {
                echo '0';
            }
            ?>" name="wpbm_option[wpbm_show_popular_query]" <?php if ( isset( $wpbm_option[ 'wpbm_show_popular_query' ] ) && $wpbm_option[ 'wpbm_show_popular_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="wpbm-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show popular posts.', WPBM_TD ) ?></p>
    </div>
</div>
<div class="wpbm-popular-inner-wrap" <?php if ( isset( $wpbm_option[ 'wpbm_show_popular_query' ] ) && $wpbm_option[ 'wpbm_show_popular_query' ] == '1' ) { ?>
         style="display: block;" <?php } else { ?>
         style="display: none;" <?php } ?>>
    <div class ="wpbm-post-option-wrap">
        <label><?php _e( 'Choose Popular Posts By', WPBM_TD ); ?></label>
        <div class="wpbm-post-field-wrap">
            <select name="wpbm_option[wpbm_select_popular]" class="wpbm-select-popular">
                <option value="view"  <?php if ( isset( $wpbm_option[ 'wpbm_select_popular' ] ) && $wpbm_option[ 'wpbm_select_popular' ] == 'view' ) echo 'selected == "selected"'; ?>><?php _e( 'View', WPBM_TD ) ?></option>
                <option value="comment"  <?php if ( isset( $wpbm_option[ 'wpbm_select_popular' ] ) && $wpbm_option[ 'wpbm_select_popular' ] == 'comment' ) echo 'selected == "selected"'; ?>><?php _e( 'Comment', WPBM_TD ) ?></option>
            </select>
        </div>
    </div>
</div>