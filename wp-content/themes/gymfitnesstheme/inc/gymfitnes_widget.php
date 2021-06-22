<?php

/**
 * Adds Foo_Widget widget.
 */
class Gymfitness_Classes_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'gymfitness_classes_widget', // Base ID
            esc_html__( 'Classes List', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Display different classes in the widget', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget']; ?>
            <h2 class="text-primary text-center classes-header"><?php echo esc_html($instance['title']); ?></h2>
            <ul class="sidebar-classes-list">
                <?php
                    $classes = new WP_Query(array(
                        'post_type' => 'fitness_classes',
                        'posts_per_page' => $instance['quantity']
                    ));
                ?>
                <?php while ($classes->have_posts()) : $classes->the_post();?>
                    <li class="sidebar-class">
                        <div class="sidebar-widget-image">
                            <?php the_post_thumbnail('thumbnail');?>
                        </div>

                        <div class="class-content">
                            <a href="<?php the_permalink();?>">
                                <h3 class="text-primary"><?php the_title(); ?></h3>
                            </a>
                            <?php
                                $startTime = get_field('start_time');
                                $endTime = get_field('end_time');
                            ?>
                            <p class="content-class">
                                <?php echo the_field('class_days') . " - " . $startTime. " to " . $endTime;;?>
                            </p>
                        </div
                    </li>
                <?php endwhile; wp_reset_postdata();?>
            </ul>
        <?php echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__( '1', 'text_domain' ); ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'text_domain' ); ?>
            </label>
            <input class="widefat"
                   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>">
                <?php esc_attr_e( 'Amount to Classes to Display ', 'text_domain' ); ?>
            </label>
            <input class="widefat"
                   id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>"
                   type="number"
                   value="<?php echo esc_attr( $quantity ); ?>"
                   min="1"
            >
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
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

        return $instance;
    }

} // class Foo_Widget


// register Foo_Widget widget
function gymfitmess_classes_widget() {
    register_widget( 'Gymfitness_Classes_Widget' );
}
add_action( 'widgets_init', 'gymfitmess_classes_widget' );


/*** Gymfitness Shirtcode ***/

 function gymfitness_location_shortcode(){ ?>
     <div class="location">
         <?php $location = get_field('location'); // it returns an array ?>
         <input type="hidden" id="lat" value="<?php echo $location['lat']; ?>">
         <input type="hidden" id="lng" value="<?php echo $location['lng']; ?>">
         <input type="hidden" id="address" value="<?php echo $location['address']; ?>">
     </div>

     <div id="map"></div>

<?php }
 add_shortcode('gymfitness_location', 'gymfitness_location_shortcode'); // [gymfitness_location]