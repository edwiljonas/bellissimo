<?php

# CLASS COMPOSER

class knack_composer{

	# VARIABLES
	public $knack_content, $knack_array = [];

	# CONSTRUCT
	public function __construct(){

		# RUN HOOKS
		$this->knack_hooks();

		# CONTENT CLASS
		$this->knack_content = new knack_content();

	}

	public function knack_hooks(){
		
		////////////////////////////
		// ~ SET ROW ICON
		////////////////////////////

		$settings = array (
			'icon' => 'icon_element_row'
		);
		vc_map_update( 'vc_row', $settings );

		$settings = array (
			'icon' => 'icon_element_text_block'
		);
		vc_map_update( 'vc_column_text', $settings );

		$settings = array (
			'icon' => 'icon_element_icon'
		);
		vc_map_update( 'vc_icon', $settings );
		
		////////////////////////////
		// ~ REMOVE DEFAULTS
		////////////////////////////
				
		# REMOVE DEFAULT ELEMENTS
		//add_filter( 'vc_build_admin_page', array($this,'knack_remove_default_elements'), 11 );

		# ACTION FOR REMOVING DEFAULT TEMPLATES
		add_filter( 'vc_load_default_templates', array($this, 'knack_my_custom_template_modify_array') );
		
		////////////////////////////
		// ~ ELEMENTS
		////////////////////////////

		# ACTION FOR ADDING CUSTOM ELEMENT
		add_action('vc_before_init', array($this, 'knack_element') );
		add_action('vc_before_init', array($this, 'knack_products') );
		add_action('vc_before_init', array($this, 'knack_brands') );
		add_action('vc_before_init', array($this, 'knack_signup') );
		add_action('vc_before_init', array($this, 'knack_posts') );
		add_action('vc_before_init', array($this, 'knack_map') );

		# ADD PARAMS
		//add_action('vc_before_init', array($this, 'knack_add_params')); // ~ HORIZONTAL LINE ELEMENT

		# REMOVE PARAMS
		add_action('vc_before_init', array($this, 'knack_remove_params')); // ~ HORIZONTAL LINE ELEMENT

		////////////////////////////
		// ~ TEMPLATES
		////////////////////////////

		#ACTION FOR ADDING A TEMPLATE
		add_filter( 'vc_load_default_templates', array($this, 'knack_home_template') );

	}

	/************************************************
	 * VISUAL COMPOSER NEW PARAMS
	 ************************************************/

	#ADD PARAMS
	public function knack_add_params(){

		#VC ROW PARAMS
		vc_add_param("vc_row", array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Padding (Row)",
			'category' => esc_html__( 'Knack', 'js_composer' ),
			"param_name" => "row_padding",
			"value" => array(
				"None" => "knack_row_padding_none",
				"Top and Bottom" => "knack_row_padding_top_bottom",
				"Top Only" => "knack_row_padding_top",
				"Bottom Only" => "knack_row_padding_bottom",
			),
			'description' => esc_html__( 'Select the row padding (Top, Bottom)', 'js_composer' ),
		));

		vc_add_param("vc_row", array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Margin (Row)",
			'category' => esc_html__( 'Knack', 'js_composer' ),
			"param_name" => "row_margin",
			"value" => array(
				"None" => "knack_row_margin_none",
				"Top and Bottom" => "knack_row_margin_top_bottom",
				"Top Only" => "knack_row_margin_top",
				"Bottom Only" => "knack_row_margin_bottom",
			),
			'std' => 'knack_row_margin_top_bottom',
			'description' => esc_html__( 'Select the row margin (Top, Bottom)', 'js_composer' ),
		));

	}

	#REMOVE PARAMS
	public function knack_remove_params(){

		#VC ROW PARAMS REMOVE
		//	vc_remove_param( "vc_row", "gap" );
		//	vc_remove_param( "vc_row", "full_height" );
		//	vc_remove_param( "vc_row", "equal_height" );
		//	vc_remove_param( "vc_row", "content_placement" );
		//	vc_remove_param( "vc_row", "columns_placement" );
		//	vc_remove_param( "vc_row", "video_bg" );
		//	vc_remove_param( "vc_row", "parallax" );
		//	vc_remove_param( "vc_row", "el_id" );
		//	vc_remove_param( "vc_row", "el_class" );
		//	vc_remove_param( "vc_row", "video_bg_url" );
		//	vc_remove_param( "vc_row", "video_bg_parallax" );
		//	vc_remove_param( "vc_row", "gallery_widget_attached_images_ids" );
		//	vc_remove_param( "vc_row", "parallax_speed_bg" );
		//	vc_remove_param( "vc_row", "parallax_speed_video" );
		//	vc_remove_param( "vc_row", "parallax_image" );

	}

	/************************************************
	 * VISUAL COMPOSER ELEMENTS
	 ************************************************/
	
	# BASIC ELEMENT
	public function knack_element(){
		
		//SETUP VC MAP
		vc_map(
			array(
				"name" => esc_html__( "Basic Element", "js_composer" ),
				"base" => "knack_shortcode_element",
				"class" => "",
				'icon' => 'knack_icon_element',
				"category" => esc_html__( "Knack", "js_composer"),
				'description' => esc_html__( "Basic element for the current site.", "js_composer" ),
				"params" => array(
					array(
						"type" => "attach_images",
						"holder" => "div",
						"class" => "knack_element_class",
						"heading" => esc_html__( "Images", "js_composer" ),
						"param_name" => "knack_images",
						"value" => __( "", "js_composer" ),
						"description" => esc_html__( "Add multiple images for you image carousel.", "js_composer" )
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "knack_element_class",
						"heading" => esc_html__( "Image background sizing", "js_composer" ),
						"param_name" => "knack_size",
						"value" => array(
							'Contain' => 'contain',
							'Cover' => 'cover',
							'Auto' => 'auto'
						),
						'std' => '',
						"description" => esc_html__( "Choose the image sizing.", "js_composer" ),
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "knack_element_class",
						"heading" => esc_html__( "Carousel height", "js_composer" ),
						"param_name" => "knack_height",
						"value" => array(
							'100px'   => 100,
							'200px'   => 200,
							'300px'   => 300,
							'400px'   => 400,
							'500px'   => 500,
						),
						'std' => '',
						"description" => esc_html__( "Set the height for your image carousel.", "js_composer" ),
					),
				)
			)
		);
		
	}
	
	# BASIC ELEMENT SHORTCODE FUNCTION
	function knack_shortcode_element( $atts ) {
		
		# SETUP CONTENT CLASS
		$knack_data = $this->knack_content->knack_element($atts);
		
		# RETURN DATA/HTML
		echo $knack_data;
		
	}

    # BASIC ELEMENT
    public function knack_map(){

        //SETUP VC MAP
        vc_map(
            array(
                "name" => esc_html__( "Google Map", "js_composer" ),
                "base" => "knack_shortcode_map",
                "class" => "",
                'icon' => 'knack_icon_element',
                "category" => esc_html__( "Knack", "js_composer"),
                'description' => esc_html__( "Google map element for pages.", "js_composer" ),
                "params" => array(
                    array(
                        "type" => "checkbox",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Enable zoom", "js_composer" ),
                        "param_name" => "knack_zoom",
                        'std' => '',
                        "description" => esc_html__( "Enable the zoom functionality for the map.", "js_composer" ),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Map center latitude", "js_composer" ),
                        "param_name" => "knack_center_lat",
                        'std' => '',
                        "description" => esc_html__( "Set the latitude for the map.", "js_composer" ),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Map center longitude", "js_composer" ),
                        "param_name" => "knack_center_long",
                        'std' => '',
                        "description" => esc_html__( "Set the longitude for the map.", "js_composer" ),
                    ),
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Marker icon", "js_composer" ),
                        "param_name" => "knack_marker",
                        'std' => '',
                        "description" => esc_html__( "Set the marker icon.", "js_composer" ),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Zoom level", "js_composer" ),
                        "param_name" => "knack_zoom",
                        "value" => array(
                            'Zoom: 1' => '1',
                            'Zoom: 2' => '2',
                            'Zoom: 3' => '3',
                            'Zoom: 4' => '4',
                            'Zoom: 5' => '5',
                            'Zoom: 6' => '6',
                            'Zoom: 7' => '7',
                            'Zoom: 8' => '8',
                            'Zoom: 9' => '9',
                            'Zoom: 10' => '10',
                        ),
                        'std' => '',
                        "description" => esc_html__( "Set the initial zoom level for the map.", "js_composer" ),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Map style", "js_composer" ),
                        "param_name" => "knack_style",
                        "value" => array(
                            'Dark' => 'dark',
                            'Light' => 'light',
                            'Default' => 'default'
                        ),
                        'std' => '',
                        "description" => esc_html__( "Choose the styling for the map.", "js_composer" ),
                    ),
                    array(
                        "type" => "param_group",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "List of markers", "js_composer" ),
                        "param_name" => "knack_markers",
                        "value" => "",
                        'params' => array(
                            array(
                                "type" => "textfield",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "Latitude", "js_composer" ),
                                "param_name" => "knack_latitude",
                                "value" => __( "", "js_composer" ),
                            ),
                            array(
                                "type" => "textfield",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "Longitude", "js_composer" ),
                                "param_name" => "knack_longitude",
                                "value" => __( "", "js_composer" ),
                            ),
                            array(
                                "type" => "textfield",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "Marker heading", "js_composer" ),
                                "param_name" => "knack_heading",
                                "value" => __( "", "js_composer" ),
                            ),
                            array(
                                "type" => "textarea",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "Marker content", "js_composer" ),
                                "param_name" => "knack_content",
                                "value" => __( "", "js_composer" ),
                            ),
                        ),
                    ),
                )
            )
        );

    }

    # BASIC ELEMENT SHORTCODE FUNCTION
    function knack_shortcode_map( $atts ) {

        # SETUP CONTENT CLASS
        $knack_data = $this->knack_content->knack_map($atts);

        # RETURN DATA/HTML
        echo $knack_data;

    }

    # BASIC ELEMENT
    public function knack_products(){

        //SETUP VC MAP
        vc_map(
            array(
                "name" => esc_html__( "Knack Products", "js_composer" ),
                "base" => "knack_shortcode_products",
                "class" => "",
                'icon' => 'knack_icon_products',
                "category" => esc_html__( "Knack", "js_composer"),
                'description' => esc_html__( "Add a product list to your page.", "js_composer" ),
                "params" => array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Layout", "js_composer" ),
                        "param_name" => "knack_layout",
                        "value" => array(
                            'Carousel'   => 'carousel',
                            'List'   => 'list (Maximum of 4 posts)',
                        ),
                        'std' => '',
                        "description" => esc_html__( "Choose the layout you want for the products.", "js_composer" ),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Content Type", "js_composer" ),
                        "param_name" => "knack_content",
                        "value" => array(
                            'Category'   => 'category',
                            'Specific Products'   => 'specific',
                        ),
                        'std' => '',
                        "description" => esc_html__( "Set the type of content to display.", "js_composer" ),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'heading' => esc_html__( 'Find Products', 'js_composer' ),
                        'param_name' => 'knack_specific',
                        'settings' => array(
                            'multiple' => true,
                            'values' => $this->knack_autocomplete_products(),
                        ),
                        'save_always' => true,
                        'description' => esc_html__( 'List of products that have been added', 'js_composer' ),
                        "dependency" => Array('element' => "knack_content", 'value' => array('specific')),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'heading' => esc_html__( 'Find Categories', 'js_composer' ),
                        'param_name' => 'knack_category',
                        'settings' => array(
                            'multiple' => true,
                            'values' => $this->knack_autocomplete_products_category(),
                        ),
                        'save_always' => true,
                        'description' => esc_html__( 'List of products categories that have been added', 'js_composer' ),
                        "dependency" => Array('element' => "knack_content", 'value' => array('category')),
                    ),
                )
            )
        );

    }

    # BASIC ELEMENT SHORTCODE FUNCTION
    function knack_shortcode_products( $atts ) {

        # SETUP CONTENT CLASS
        $knack_data = $this->knack_content->knack_products($atts);

        # RETURN DATA/HTML
        echo $knack_data;

    }

    # BASIC ELEMENT
    public function knack_posts(){

        //SETUP VC MAP
        vc_map(
            array(
                "name" => esc_html__( "Knack Posts", "js_composer" ),
                "base" => "knack_shortcode_posts",
                "class" => "",
                'icon' => 'knack_icon_posts',
                "category" => esc_html__( "Knack", "js_composer"),
                'description' => esc_html__( "Add posts to your page.", "js_composer" ),
                "params" => array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Layout", "js_composer" ),
                        "param_name" => "knack_layout",
                        "value" => array(
                            'Carousel'   => 'carousel',
                            'List'   => 'list',
                        ),
                        'std' => '',
                        "description" => esc_html__( "Choose the layout you want for the products.", "js_composer" ),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Content Type", "js_composer" ),
                        "param_name" => "knack_content",
                        "value" => array(
                            'Category'   => 'category',
                            'Specific Posts'   => 'specific',
                        ),
                        'std' => '',
                        "description" => esc_html__( "Set the type of content to display.", "js_composer" ),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'heading' => esc_html__( 'Find Products', 'js_composer' ),
                        'param_name' => 'knack_specific',
                        'settings' => array(
                            'multiple' => true,
                            'values' => $this->knack_autocomplete_posts(),
                        ),
                        'save_always' => true,
                        'description' => esc_html__( 'List of posts that have been added', 'js_composer' ),
                        "dependency" => Array('element' => "knack_content", 'value' => array('specific')),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'heading' => esc_html__( 'Find Categories', 'js_composer' ),
                        'param_name' => 'knack_category',
                        'settings' => array(
                            'multiple' => true,
                            'values' => $this->knack_autocomplete_posts_category(),
                        ),
                        'save_always' => true,
                        'description' => esc_html__( 'List of post categories that have been added', 'js_composer' ),
                        "dependency" => Array('element' => "knack_content", 'value' => array('category')),
                    ),
                )
            )
        );

    }

    # BASIC ELEMENT SHORTCODE FUNCTION
    function knack_shortcode_posts( $atts ) {

        # SETUP CONTENT CLASS
        $knack_data = $this->knack_content->knack_posts($atts);

        # RETURN DATA/HTML
        echo $knack_data;

    }

    # BASIC ELEMENT
    public function knack_brands(){

        //SETUP VC MAP
        vc_map(
            array(
                "name" => esc_html__( "Knack Brands", "js_composer" ),
                "base" => "knack_shortcode_brands",
                "class" => "",
                'icon' => 'knack_icon_brands',
                "category" => esc_html__( "Knack", "js_composer"),
                'description' => esc_html__( "Add a product list to your page.", "js_composer" ),
                "params" => array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "Content", "js_composer" ),
                        "param_name" => "knack_content",
                        "value" => array(
                            'Product Category'   => 'category',
                            'Images'   => 'images',
                        ),
                        'std' => '',
                        "description" => esc_html__( "Choose if you want current product categories or static images with URL's.", "js_composer" ),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'heading' => esc_html__( 'Find Categories', 'js_composer' ),
                        'param_name' => 'knack_category',
                        'settings' => array(
                            'multiple' => true,
                            'values' => $this->knack_autocomplete_products_category(),
                        ),
                        'save_always' => true,
                        'description' => esc_html__( 'List of products categories that have been added', 'js_composer' ),
                        "dependency" => Array('element' => "knack_content", 'value' => array('category')),
                    ),
                    array(
                        "type" => "param_group",
                        "holder" => "div",
                        "class" => "knack_element_class",
                        "heading" => esc_html__( "List of images", "js_composer" ),
                        "param_name" => "knack_images",
                        "value" => "",
                        'params' => array(
                            array(
                                "type" => "textfield",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "URL", "js_composer" ),
                                "param_name" => "knack_url",
                                "value" => __( "", "js_composer" ),
                            ),
                            array(
                                "type" => "dropdown",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "Target", "js_composer" ),
                                "param_name" => "knack_target",
                                "value" => array(
                                    'New Tab'   => '_blank',
                                    'Current Tab'   => '_self',
                                ),
                            ),
                            array(
                                "type" => "attach_image",
                                "holder" => "div",
                                "class" => "knack_element_class",
                                "heading" => esc_html__( "Brand Image/Logo", "js_composer" ),
                                "param_name" => "knack_image",
                                "value" => __( "", "js_composer" ),
                            ),
                        ),
                        "dependency" => Array('element' => "knack_content", 'value' => array('images')),
                    ),
                )
            )
        );

    }

    # BASIC ELEMENT SHORTCODE FUNCTION
    function knack_shortcode_brands( $atts ) {

        # SETUP CONTENT CLASS
        $knack_data = $this->knack_content->knack_brands($atts);

        # RETURN DATA/HTML
        echo $knack_data;

    }

    # BASIC ELEMENT
    public function knack_signup(){

        //SETUP VC MAP
        vc_map(
            array(
                "name" => esc_html__( "Knack Signup", "js_composer" ),
                "base" => "knack_shortcode_signup",
                "class" => "",
                'icon' => 'knack_icon_signup',
                "category" => esc_html__( "Knack", "js_composer"),
                'description' => esc_html__( "Add a small signup widget to your page.", "js_composer" ),
                "params" => array(

                )
            )
        );

    }

    # BASIC ELEMENT SHORTCODE FUNCTION
    function knack_shortcode_signup( $atts ) {

        # SETUP CONTENT CLASS
        $knack_data = $this->knack_content->knack_signup($atts);

        # RETURN DATA/HTML
        echo $knack_data;

    }

	/************************************************
	 * VISUAL COMPOSER REMOVE ELEMENTS
	 ************************************************/

	#REMOVE DEFAULTS
	public function knack_remove_default_elements(){

        vc_remove_element("vc_cta_button2");
        vc_remove_element("vc_button2");
        vc_remove_element("vc_masonry_media_grid");
        vc_remove_element("vc_masonry_grid");
        vc_remove_element("vc_masonry_grid");
        vc_remove_element("vc_media_grid");
        vc_remove_element("vc_basic_grid");
        vc_remove_element("vc_cta");
        vc_remove_element("vc_btn");
        //vc_remove_element("vc_custom_heading");
        vc_remove_element("vc_empty_space");
        vc_remove_element("vc_line_chart");
        vc_remove_element("vc_round_chart");
        vc_remove_element("vc_pie");
        vc_remove_element("vc_raw_js");
        vc_remove_element("vc_raw_html");
        vc_remove_element("vc_video");
        vc_remove_element("vc_widget_sidebar");
        vc_remove_element("vc_tta_pageable");
        vc_remove_element("vc_tta_accordion");
        vc_remove_element("vc_tta_tour");
        vc_remove_element("vc_tta_tabs");
        vc_remove_element("vc_gallery");
        vc_remove_element("vc_gallery");
        vc_remove_element("vc_text_separator");
        vc_remove_element("vc_button");
        vc_remove_element("vc_posts_slider");
        vc_remove_element("vc_gmaps");
        vc_remove_element("vc_teaser_grid");
        vc_remove_element("vc_progress_bar");
        vc_remove_element("vc_facebook");
        vc_remove_element("vc_tweetmeme");
        vc_remove_element("vc_googleplus");
        vc_remove_element("vc_facebook");
        vc_remove_element("vc_pinterest");
        vc_remove_element("vc_message");
        vc_remove_element("vc_posts_grid");
        vc_remove_element("vc_carousel");
        vc_remove_element("vc_flickr");
        vc_remove_element("vc_tour");
        vc_remove_element("vc_separator");
        //vc_remove_element("vc_single_image");
        vc_remove_element("vc_cta_button");
        vc_remove_element("vc_accordion");
        vc_remove_element("vc_accordion_tab");
        vc_remove_element("vc_toggle");
        vc_remove_element("vc_tabs");
        vc_remove_element("vc_tab");
        vc_remove_element("vc_images_carousel");
        vc_remove_element("vc_wp_archives");
        vc_remove_element("vc_wp_calendar");
        vc_remove_element("vc_wp_categories");
        vc_remove_element("vc_wp_custommenu");
        vc_remove_element("vc_wp_links");
        vc_remove_element("vc_wp_meta");
        vc_remove_element("vc_wp_pages");
        vc_remove_element("vc_wp_posts");
        vc_remove_element("vc_wp_recentcomments");
        vc_remove_element("vc_wp_rss");
        vc_remove_element("vc_wp_search");
        vc_remove_element("vc_wp_tagcloud");
        vc_remove_element("vc_wp_text");
        vc_remove_element("woocommerce_cart");
        vc_remove_element("woocommerce_checkout");
        vc_remove_element("woocommerce_order_tracking");
        vc_remove_element("woocommerce_my_account");
        vc_remove_element("recent_products");
        vc_remove_element("featured_products");
        vc_remove_element("product");
        vc_remove_element("products");
        vc_remove_element("add_to_cart");
        vc_remove_element("add_to_cart_url");
        vc_remove_element("product_page");
        vc_remove_element("product_category");
        vc_remove_element("product_categories");
        vc_remove_element("sale_products");
        vc_remove_element("best_selling_products");
        vc_remove_element("top_rated_products");
        vc_remove_element("product_attribute");

	}

	#REMOVE ALL DEFAULT TEMPLATES
	public function knack_my_custom_template_modify_array( $data ) {
		return array();
	}

	/************************************************
	 * VISUAL COMPOSER TEMPLATES
	 ************************************************/

	#HOME TEMPLATE
	function knack_home_template( $data ) {
		$template               = array();
		$template['name']       = __( 'Home Template', 'knack' ); // Assign name for your custom template
		$template['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px.
		$template['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
		$template['content']    = '[ CONTENT FOR TEMPLATE ]';
		array_unshift( $data, $template );
		return $data;
	}

	/************************************************
	 * AUTOCOMPLETE FUNCTIONS
	 ************************************************/

	# AUTOCOMPLETE
	public function knack_autocomplete_products_category() {

		#ARGUMENTS
		$args = array(
			'taxonomy'     => 'product_cat',
			'orderby'      => 'name',
			'show_count'   => 1,
			'pad_counts'   => 1,
			'hierarchical' => 0,
			'hide_empty'   => 1
		);

		#GET CATEGORIES
		$the_categories = get_categories($args);

		#ARRAY
		$result = array();

		#SETUP RESULTS
		foreach ( $the_categories as $term )	{
			$result[] = array(
				'value' => $term->term_id,
				'label' => $term->name,
			);
		}

		#RETURN RESULTS
		return $result;

	}

    # AUTOCOMPLETE PRODUCTS
    public function knack_autocomplete_products(){

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'hierarchical' => 0,
        );

        # GET PRODUCTS
        $products = get_posts($args);

        # ARRAY
        $result = array();

        # SETUP RESULTS
        foreach ( $products as $product )	{
            $result[] = array(
                'value' => $product->ID,
                'label' => $product->post_title,
            );
        }

        # RETURN RESULTS
        return $result;

    }

    # AUTOCOMPLETE
    public function knack_autocomplete_posts_category() {

        #ARGUMENTS
        $args = array(
            'taxonomy'     => 'categories',
            'orderby'      => 'name',
            'show_count'   => 1,
            'pad_counts'   => 1,
            'hierarchical' => 0,
            'hide_empty'   => 1
        );

        #GET CATEGORIES
        $the_categories = get_categories($args);

        #ARRAY
        $result = array();

        #SETUP RESULTS
        foreach ( $the_categories as $term )	{
            $result[] = array(
                'value' => $term->term_id,
                'label' => $term->name,
            );
        }

        #RETURN RESULTS
        return $result;

    }

    # AUTOCOMPLETE PRODUCTS
    public function knack_autocomplete_posts(){

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'hierarchical' => 0,
        );

        # GET PRODUCTS
        $posts = get_posts($args);

        # ARRAY
        $result = array();

        # SETUP RESULTS
        foreach ( $posts as $post )	{
            $result[] = array(
                'value' => $post->ID,
                'label' => $post->post_title,
            );
        }

        # RETURN RESULTS
        return $result;

    }

}