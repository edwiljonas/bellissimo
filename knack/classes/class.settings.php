<?php

# CLASS SETTINGS PANEL

class knack_settings{

	# CONSTRUCT
	public function __construct(){

		# HOOK ADMIN MENU TO BACKEND
		add_action( 'admin_menu', array( $this, 'knack_admin_menu') );

	}

	# SETUP ADMIN MENU
	public function knack_admin_menu() {

		add_theme_page(
			'Knack',
			esc_html__('Knack Settings', 'knack'),
			'manage_options',
			'knack_settings',
			array($this, 'knack_settings_page')
		);

	}

	# SETTINGS HTML
	public function knack_settings_page(){

		echo '<script>';
			echo 'var global_theme_directory = "' . get_template_directory_uri() . '"';
		echo '</script>';

		?>

        <div class="knack-settings">
            <div class="sidebar">
                <div class="logo">
                    <div class="version">
                        v<?php echo KNACK_VERSION; ?>
                    </div>
                </div>
                <div class="nav">
                    <ul>
                        <?php echo $this->knack_get_sidebar_data(); ?>
                    </ul>
                </div>
            </div>
            <div class="options">
                <div class="heading">
                    <div class="heading-wrap">
                        <h1></h1>
                        <span><?php esc_html_e('Welcome to the dashboard for knack options', 'knack') ?></span>
                        <div class="options-button save-button"><?php esc_html_e('UPDATE', 'knack') ?></div>
                    </div>
                </div>
                <div class="loader">
                    <div class="load-elements">
                        <!-- LOAD ELEMENTS -->
                    </div>
                    <div class="row save-row">
                        <div class="col-md-12">
                            <div class="options-button save-button"><?php esc_html_e('UPDATE', 'knack') ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="animate-loader">
                <div class="la-ball-clip-rotate-multiple">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <?php

	}

	# GET SIDEBAR DATA
	public function knack_get_sidebar_data(){

		# GET OPTION DATA
		$options = get_option( 'knack_theme_options' );

		# CONVERT STRING BACK TO ARRAY
		$data = $options;

		# SETUP HTML FOR SIDEBAR
		$html = '';

		# LOOP EACH SECTION
		foreach($data['settings'] as $sidebar){
			if($sidebar['_slug'] !== 'translate'){
				$html .= '<li data-text="'.esc_html($sidebar['_label']).'" data-slug="'. esc_attr($sidebar['_slug']) .'" class="'. esc_attr($sidebar['_slug']) .'"><span>' . esc_html($sidebar['_label']) . '</span></li>';
			}
		}

		# RETURN SIDEBAR HTML
		return $html;

	}

}