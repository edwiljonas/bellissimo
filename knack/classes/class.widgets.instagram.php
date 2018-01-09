<?php

class knack_widgets_instagram extends WP_Widget{

	#CONSTRUCT
	public function __construct(){
		parent::__construct(
			'htheme_image_instagram_widget', // Base ID
			esc_html__( 'Knack Instagram Widget', 'knack' ), // Name
			array( 'description' => esc_html__( 'Custom widget for sidebars, add an image and text.', 'knack' ), ) // Args
		);
	}

	#WIDGET FRONT END
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['htheme_image_count'] ) || ! empty( $instance['htheme_instagram_title'] ) ) {
			?>
				<?php if($instance['htheme_instagram_title']){ ?>
				<h5><span> <?php echo esc_html($instance['htheme_instagram_title']); ?> </span></h5>
				<?php } ?>
				<div class="htheme_image_instagram_widget">
					<?php
					#RUN INSTAGRAM
					$htheme_instagram = new htheme_get_content();
					$htheme_instagram->htheme_get_instagram($instance['htheme_image_count']);
					?>
				</div>
			<?php
		}
		echo $args['after_widget'];
	}

	#WIDGET BACK END
	public function form( $instance ) {
		$htheme_instagram_title = ! empty( $instance['htheme_instagram_title'] ) ? $instance['htheme_instagram_title'] : esc_html__( '', 'knack' );
		$htheme_image_count = ! empty( $instance['htheme_image_count'] ) ? $instance['htheme_image_count'] : esc_html__( '', 'knack' );
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'knack' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'htheme_instagram_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'htheme_instagram_title' )); ?>" type="text" value="<?php echo esc_attr( $htheme_instagram_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'htheme_image_count' )); ?>"><?php esc_html_e( 'Image count:', 'knack' ); ?></label>
			<?php $options = array(3,6,9,12); ?>
			<select name="<?php echo esc_attr($this->get_field_name( 'htheme_image_count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'htheme_image_count' )); ?>">
				<?php foreach($options as $opt){ ?>
					<option <?php selected( esc_attr( $htheme_image_count ), $opt ) ?> value="<?php echo esc_attr($opt); ?>"><?php esc_html_e('Images to show', 'knack') ?> - <?php echo esc_attr($opt); ?></option>
				<?php } ?>
			</select>
		</p>
		<?php

	}

	#WIDGET SAVE
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['htheme_instagram_title'] = ( ! empty( $new_instance['htheme_instagram_title'] ) ) ? strip_tags( $new_instance['htheme_instagram_title'] ) : '';
		$instance['htheme_image_count'] = ( ! empty( $new_instance['htheme_image_count'] ) ) ? strip_tags( $new_instance['htheme_image_count'] ) : '';
		return $instance;
	}


}