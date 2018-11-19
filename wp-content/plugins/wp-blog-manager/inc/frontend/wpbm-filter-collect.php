<div class="wpbm-filter-wrap wpbm-filter-<?php echo esc_attr( $wpbm_option[ 'wpbm_filter_template' ] ); ?>">
    <ul>
        <?php $all = (isset( $wpbm_option[ 'wpbm_all_items_label' ] ) && $wpbm_option[ 'wpbm_all_items_label' ] != '') ? esc_attr( $wpbm_option[ 'wpbm_all_items_label' ] ) : __( 'All', 'WPBM_TD' ); ?>
        <li><a href="javascript:void(0);" class="wpbm-filter-trigger wpbm-active-filter" data-filter-key="wpbm-filter-all" data-layout-type="<?php echo esc_attr( $wpbm_option[ 'wpbm_select_layout' ] ); ?>"><?php echo $all; ?></a></li>
        <?php
        if ( isset( $wpbm_option[ 'filter_terms_type' ] ) && $wpbm_option[ 'filter_terms_type' ] == 'specific' ) {
            if ( count( $wpbm_option[ 'filter' ] ) ) {
                foreach ( $wpbm_option[ 'filter' ] as $filter_key => $filter_details ) {
                    $name = get_term_by( 'slug', $filter_details, $wpbm_option[ 'select_filter_taxonomy' ] );
                    ?>
                    <li><a href="javascript:void(0);" data-filter-key="wpbm-filter-cat-<?php echo esc_attr( $filter_details ); ?>" class="wpbm-filter-trigger" data-layout-type="<?php echo esc_attr( $wpbm_option[ 'wpbm_select_layout' ] ); ?>"><?php echo esc_attr( $name -> name ); ?></a></li>
                    <?php
                }
            }
        } else {
            $wpbm_terms = get_terms( $wpbm_option[ 'select_filter_taxonomy' ], 'orderby=count&hide_empty=0' );
            foreach ( $wpbm_terms as $wpbm_term ) {
                ?>
                <li><a href="javascript:void(0);" data-filter-key="wpbm-filter-cat-<?php echo esc_attr( $wpbm_term -> slug ); ?>" class="wpbm-filter-trigger" data-layout-type="<?php echo esc_attr( $wpbm_option[ 'wpbm_select_layout' ] ); ?>"><?php echo esc_attr( $wpbm_term -> name ); ?></a></li>
                    <?php
                }
            }
            ?>
    </ul>
</div>
