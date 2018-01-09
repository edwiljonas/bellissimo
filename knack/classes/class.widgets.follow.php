<?php

class knack_widgets_follow extends WP_Widget{

	public function __construct(){
		parent::__construct(
			'knack_follow_widget', // Base ID
			esc_html__( 'Knack follow us widget', 'knack' ), // Name
			array( 'description' => esc_html__( 'Custom knack widget for sidebars, add social icons.', 'knack' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {

		$items = $GLOBALS['knack']['settings']['social']['socialItems'];

		echo $args['before_widget'];
			?>
			<?php if($instance['knack_follow_title']){ ?>
			<h3><span><?php echo esc_html($instance['knack_follow_title']); ?></span></h3>
			<?php } ?>
			<div class="knack-social">
                <?php
                foreach($items as $social){
                    if($social['status'] == 'true'){
                        ?>
                        <a href="<?php echo esc_url($social['url']); ?>" target="<?php echo esc_attr($social['target']); ?>" class="fa fa-<?php echo esc_attr($social['label']); ?>"></a>
                        <?php
                    }
                }
                ?>
			</div>
			<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {

		$knack_follow_title = ! empty( $instance['knack_follow_title'] ) ? $instance['knack_follow_title'] : esc_html__( '', 'knack' );
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'knack_follow_title' )); ?>"><?php esc_html_e( 'Title:', 'knack' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'knack_follow_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'knack_follow_title' )); ?>" type="text" value="<?php echo esc_attr( $knack_follow_title ); ?>">
		</p>
		<?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['knack_follow_title'] = ( ! empty( $new_instance['knack_follow_title'] ) ) ? strip_tags( $new_instance['knack_follow_title'] ) : '';
		return $instance;
	}


}