<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

class WPBM_Widget extends WP_Widget{

    public function __construct(){
        parent::__construct( 'WPBM_Widget', 'WP Blog Manager', array( 'description' => __( 'WP Blog Manager Widget', WPBM_TD ) ) );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ){

        echo $args[ 'before_widget' ];
        echo '<div class="wpbm-widget-wrap">';
        if ( ! empty( $instance[ 'title' ] ) ) {
            echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
        }
        $wpbm_id = isset( $instance[ 'wpbm_id' ] ) ? $instance[ 'wpbm_id' ] : '';
        echo do_shortcode( "[wpbm id='" . $wpbm_id . "']" );
        echo '</div>';
        echo $args[ 'after_widget' ];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ){
        global $post;
        $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $id = isset( $instance[ 'wpbm_id' ] ) ? $instance[ 'wpbm_id' ] : '';
        ?>
        <p>
            <label for="<?php echo $this -> get_field_id( 'title' ); ?>"><?php _e( 'Title:', WPBM_TD ); ?></label>
            <input class="widefat" id="<?php echo $this -> get_field_id( 'title' ); ?>" name="<?php echo $this -> get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this -> get_field_id( 'wpbm_id' ); ?>"><?php _e( 'Select WP Blog Manager:', WPBM_TD ); ?></label>
            <select name="<?php echo $this -> get_field_name( 'wpbm_id' ); ?>" class='widefat' id="<?php echo $this -> get_field_id( 'wpbm_id' ); ?>" type="text">
                <?php
                $wpbm_id = get_terms( 'wpbm_id', array( 'order' => 'ASC', 'orderby' => 'id' ) );
                $args = array(
                    'post_type' => 'wpblogmanager',
                    'post_status' => 'publish',
                    'posts_per_page' => -1
                );
                $posts = get_posts( $args );
                if ( ! empty( $posts ) ) {

                    foreach ( $posts as $post ) {
                        ?>

                        <option value="<?php echo $post -> ID; ?>" <?php if ( $post -> ID == $id ) { ?>selected="selected"<?php } ?>><?php echo $post -> post_title; ?></option>

                        <?php
                    }
                }$post
                ?>
            </select>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ){

        $instance = $old_instance;
        $instance[ 'title' ] = isset( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '';
        $instance[ 'wpbm_id' ] = isset( $new_instance[ 'wpbm_id' ] ) ? strip_tags( $new_instance[ 'wpbm_id' ] ) : '';
        return $instance;
    }

}
