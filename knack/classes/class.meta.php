<?php

# CLASS META

class knack_meta{

	public function __construct(){

		#CUSTOM METABOXES FOR PAGES AND PRODUCTS
		add_action( 'add_meta_boxes', array($this, 'knack_add_metabox') );
		add_action( 'save_post', array( $this, 'knack_save_metabox' ) );

		# USER FIELDS
		add_action( 'show_user_profile', array( $this, 'knack_user_fields') );
		add_action( 'edit_user_profile', array( $this, 'knack_user_fields') );
		add_action( 'personal_options_update',  array( $this, 'knack_user_save_fields') );
		add_action( 'edit_user_profile_update',  array( $this, 'knack_user_save_fields') );

	}

    #ADD METABOX
    public function knack_add_metabox( $post_type ) {

        #ADD METABOX TO THE FOLLOWING
        $types = array('page');

        #PAGE & POST TYPE META
        if(in_array($post_type, $types)){
            add_meta_box(
                'knack_header'
                , esc_html__('Header Settings', 'knack')
                , array($this, 'knack_header_meta')
                , $post_type
                , 'normal'
                , 'low'
            );
        }

    }

    public function knack_header_meta( $post ) {

        wp_nonce_field( 'knack_inner_custombox', 'knack_inner_custombox_nonce' );

        $shortcode = get_post_meta( $post->ID, 'meta_shortcode', true );
        if($shortcode == ''){
            $shortcode = '';
        }

        echo '<script>';
        echo 'var global_theme_directory = "' . get_template_directory_uri() . '"';
        echo '</script>';

        ?>
        <div class="metabox">
            <div class="row">
                <p><label class="post-attributes-label">Shortcode for Slider</label></p>
                <input type="text" name="meta_shortcode" id="meta_shortcode" value="<?php echo esc_attr( $shortcode ) ?>">
            </div>
        </div>
        <?php

    }

    public function knack_save_metabox( $post_id ) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // CHECK IF NONCE IS SET
        if (!isset($_POST['knack_inner_custombox_nonce']))
            return $post_id;

        $nonce = $_POST['knack_inner_custombox_nonce'];

        // VERIFY THAT NONCE IS VALID
        if (!wp_verify_nonce($nonce, 'knack_inner_custombox'))
            return $post_id;

        // If this is an autosave, our form has not been submitted,
        // so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        // CHECK THE USERS PERMISSIONS
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else if ('product' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {
            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }

        if('page' == $_POST['post_type']){

            # SHORTCODE
            $shortcode = sanitize_text_field($_POST['meta_shortcode']);
            update_post_meta($post_id, 'meta_shortcode', $shortcode);

        }

    }

	/*
	 * CUSTOM USER FIELDS
	 */

	# CUSTOM USER META FIELDS
	public function knack_user_fields( $user )  {  wp_enqueue_media(); ?>

		<h3><?php esc_html_e('Extra profile information', 'knack'); ?></h3>

		<table class="form-table">

			<tr>
				<th><label for="twitter"><?php esc_html_e('Twitter', 'knack'); ?></label></th>

				<td>
					<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'user_twitter', $user->ID ) ); ?>" class="regular-text" />
					<span class="description"><?php esc_html_e('Please enter your Twitter username.', 'knack'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="facebook"><?php esc_html_e('Facebook', 'knack'); ?></label></th>

				<td>
					<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'user_facebook', $user->ID ) ); ?>" class="regular-text" />
					<span class="description"><?php esc_html_e('Please enter your Facebook page url.', 'knack'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="pinterest"><?php esc_html_e('Pinterest', 'knack'); ?></label></th>

				<td>
					<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'user_pinterest', $user->ID ) ); ?>" class="regular-text" />
					<span class="description"><?php esc_html_e('Please enter your Pinterest tag/ID.', 'knack'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="linkdin"><?php esc_html_e('Linkdin', 'knack'); ?></label></th>

				<td>
					<input type="text" name="linkdin" id="linkdin" value="<?php echo esc_attr( get_the_author_meta( 'user_linkdin', $user->ID ) ); ?>" class="regular-text" />
					<span class="description"><?php esc_html_e('Please enter your Linkdin url.', 'knack'); ?></span>
				</td>
			</tr>

            <tr>
                <td>
                    <input type="text" name="wishlist" id="wishlist" value="<?php echo esc_attr( get_the_author_meta( 'user_wishlist', $user->ID ) ); ?>" class="regular-text" />
                </td>
            </tr>

		</table>

	<?php }

    # SAVE USER DATA
    public function knack_user_save_fields( $user_id ) {

        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;

        /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
        update_user_meta( $user_id, 'user_twitter', $_POST['twitter'] );
        update_user_meta( $user_id, 'user_facebook', $_POST['facebook'] );
        update_user_meta( $user_id, 'user_pinterest', $_POST['pinterest'] );
        update_user_meta( $user_id, 'user_linkdin', $_POST['linkdin'] );
        update_user_meta( $user_id, 'user_wishlist', $_POST['wishlist'] );

    }

}