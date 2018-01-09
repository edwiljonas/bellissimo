<?php

# CLASS BACKEND

class knack_backend{

	# CONSTRUCT
	public function __construct(){}

    # GET OPTION DATA
    public function knack_get_options() {

        #GET OPTION DATA
        $options = get_option( 'knack_theme_options' );

        #RESPOND WITH JSON
        echo json_encode($options);
        exit();

    }

    # SAVE OPTIONS
    public function knack_save() {

        # POST VARIABLES
        $options = json_decode(stripslashes_deep($_POST['options']), true);

        # UPDATE OPTION
        update_option( 'knack_theme_options', $options );

        # RESPOND WITH JSON
        echo json_encode($options);
        exit();

    }

	# GET BACKEND PAGES
	public function knack_get_includes(){

		$slug = $_POST['slug'];

		get_template_part( 'knack/includes/sub', $slug );

		exit();

	}

    # WRITE FILE
    public function knack_write(){

        /* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
        $creds = request_filesystem_credentials(site_url() . '/wp-admin/', '', false, false, array());

        /* initialize the API */
        if ( ! WP_Filesystem($creds) ) {
            echo json_encode('ERROR');
            exit();
        }

        global $wp_filesystem;

        $signups = get_option( 'knack_theme_signups' );

        $directory = get_template_directory() . '/knack/file/';

        $emails = '';

        foreach($signups as $sign){
            $emails .= $sign['email'] . "\r\n";
        }

        if(!$wp_filesystem->is_dir($directory)){

            $wp_filesystem->mkdir($directory);

        }

        $file = $directory . "signups.csv";
        $wp_filesystem->put_contents($file, $emails, FS_CHMOD_FILE);

        echo json_encode($emails);
        exit();

    }


    # INSTALL
    public function knack_install(){

        global $wpdb, $post;

        $install_type = 'full';

        /*$data_array = array(
            'images' => array(
                'default' => array(),
            ),
        );

        $image_array = array(
            'default' => array(
                'one'=>'knack-1.jpg',
                'two'=>'knack-2.jpg',
                'three'=>'knack-3.jpg',
            ),
        );

        #ADD IMAGES TO LIBRARY
        if($install_type == 'full'){
            foreach($image_array as $key => $value){
                foreach($value as $k => $v){
                    $image_id = $this->knack_media($v);
                    array_push($data_array['images'][$key], $image_id);
                }
            }
        }*/

        #PAGE DEMO INSTALL ARRAY - THIS IS RUN AT THE END SO THAT DATA ARRAY CAN BE SETUP WITH ALL THE NECESSARY DATA
        $page_array = array(
            array( #HOME
                'page_title' => esc_html__('Home', 'knack'),
                'page_content' => $this->knack_get_content('home'),
                'page_template' => '',
                'post_type' => 'page',
                'header_settings' => array(),
                'featured_image' => '',
            ),
            array( #BLOG
                'page_title' => esc_html__('Blog', 'knack'),
                'page_content' => '',
                'page_template' => '',
                'post_type' => 'page',
                'header_settings' => array(),
                'featured_image' => '',
            ),
            array( #ABOUT
                'page_title' => esc_html__('About', 'knack'),
                'page_content' => $this->knack_get_content('about'),
                'page_template' => '',
                'post_type' => 'page',
                'header_settings' => array(),
                'featured_image' => '',
            ),
            array( #CONTACT
                'page_title' => esc_html__('Contact', 'knack'),
                'page_content' => $this->knack_get_content('contact'),
                'page_template' => '',
                'post_type' => 'page',
                'header_settings' => array(),
                'featured_image' => '',
            ),
            array( #FAQ
                'page_title' => esc_html__('FAQ', 'knack'),
                'page_content' => $this->knack_get_content('faq'),
                'page_template' => '',
                'post_type' => 'page',
                'header_settings' => array(),
                'featured_image' => '',
            ),
            array( #BLOG POST 1
                'page_title' => esc_html__('Demo Post One', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'post',
                'header_settings' => array(),
                'featured_image' => 'knack-1.jpg',
            ),
            array( #BLOG POST 2
                'page_title' => esc_html__('Demo Post Two', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'post',
                'header_settings' => array(),
                'featured_image' => 'knack-2.jpg',
            ),
            array( #BLOG POST 3
                'page_title' => esc_html__('Demo Post Three', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'post',
                'header_settings' => array(),
                'featured_image' => 'knack-3.jpg',
            ),
            array( #PRODUCT 1
                'page_title' => esc_html__('Product One', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-4.jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 2
                'page_title' => esc_html__('Product Two', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-5jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 3
                'page_title' => esc_html__('Product Three', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-4.jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 4
                'page_title' => esc_html__('Product Four', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-5.jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 5
                'page_title' => esc_html__('Product Five', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-4.jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 6
                'page_title' => esc_html__('Product Six', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-5.jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 7
                'page_title' => esc_html__('Product Seven', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-4.jpg',
                'price' => '1000',
            ),
            array( #PRODUCT 8
                'page_title' => esc_html__('Product Eight', 'knack'),
                'page_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at pharetra enim. Sed eget pellentesque lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra magna sapien, at ornare lectus vulputate sit amet. Duis quis tellus efficitur massa finibus efficitur id placerat arcu.',
                'page_template' => '',
                'post_type' => 'product',
                'header_settings' => array(),
                'featured_image' => 'knack-5.jpg',
                'price' => '1000',
            ),
        );

        #LOOP DATA AND CHECK - IF OK INSTALL
        foreach($page_array as $data){

            $status = true;

            if ( $data['post_type'] == 'product' && !class_exists( 'WooCommerce' ) ){
                $status = false;
            } else {
                $status = true;
            }

            if($status):

                #VARIABLES
                $new_page_title = $data['page_title'];
                $new_page_content = $data['page_content'];
                $new_page_excerpt = '';
                if($data['page_excerpt']){
                    $new_page_excerpt = $data['page_excerpt'];
                }
                $new_page_template = $data['page_template'];
                $new_page_type = $data['post_type'];
                $new_page_featured = $data['featured_image'];
                $new_page_header_settings = $data['header_settings'];
                $page_check = 0;

                #CHECK IF PAGE EXISTS
                if($new_page_type == 'page'){
                    $page_check = get_page_by_title($new_page_title);
                } else if($new_page_type == 'post') {
                    $page_check = $this->knack_title($new_page_title, $new_page_type);
                } else if($new_page_type == 'product') {
                    $page_check = $this->knack_title($new_page_title, $new_page_type);
                }

                #ARRAY
                $new_page = array(
                    'post_type' => $new_page_type,
                    'post_title' => esc_html($new_page_title),
                    'post_content' => $new_page_content,
                    'post_excerpt' => esc_html($new_page_excerpt),
                    'post_status' => 'publish',
                    'post_author' => 1,
                );

                #CHECK AND INSERT NEW PAGE
                if(!isset($page_check->ID)){

                    #NEW PAGE ID
                    $new_page_id = wp_insert_post($new_page);

                    #SET POST META DATA
                    //$this->knack_set_meta_data($new_page_type, $new_page_id, $new_page_title, $new_page_header_settings);

                    #IF HOME PAGE, SET HOME PAGE
                    if($new_page_title == 'Home'){
                        update_option( 'page_on_front', $new_page_id );
                        update_option( 'show_on_front', 'page' );
                    }

                    #IF BLOG PAGE, SET AS BLOG PAGE
                    if($new_page_title == 'Blog'){
                        update_option( 'page_for_posts', $new_page_id );
                    }

                    #SET PRICE
                    if($new_page_type == 'product'){
                        update_post_meta($new_page_id, '_regular_price', $data['price']);
                        update_post_meta($new_page_id, '_price', $data['price']);
                        update_post_meta($new_page_id, '_visibility', 'visible');
                    }

                    #ADD FEATURED
                    if($new_page_featured != ''){
                        //$this->knack_featured($new_page_id, $new_page_featured);
                    }

                    #SET TEMPLATE
                    if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                    }

                }

            endif;

        }

        #ADD DEFAULT LOGOS
        //$knack_logos = $this->knack_add_logos();

        #CREATE MENUS
        $this->knack_create_menus();

        #CREATE SIDEBAR
        //$this->knack_setup_sidebar();

        #RETURN STATUS
        echo json_encode('Installed');
        exit();

    }

    #CREATE MENUS
    public function knack_create_menus(){

        #VARIABLES
        $main_menu_array = array(
            'home' => "Home",
            'about' => "About",
            'blog' => "Blog",
            'shop' => "Shop",
            'faq' => "FAQ",
            'contact' => "Contact",
        );

        $footer_menu_array = array(
            'about' => "About",
            'contact' => "Contact",
        );

        #CREATE MENUS - MAIN
        if ( !has_nav_menu( 'primary' ) ) {

            // Check if the menu exists
            $menu_name = 'Main Menu';
            $menu_exists = wp_get_nav_menu_object( $menu_name );

            // If it doesn't exist, let's create it.
            if( !$menu_exists){

                $menu_id = wp_create_nav_menu($menu_name);

                foreach($main_menu_array as $key=>$value){

                    #GET PAGE
                    $page = get_page_by_title( $value );

                    #SET PAGE IN MENU
                    $menu_item_id = wp_update_nav_menu_item($menu_id, 0, array(
                            'menu-item-title' =>  esc_html($page->post_title),
                            'menu-item-url' => get_permalink($page->ID),
                            'menu-item-status' => 'publish')
                    );

                }

                #SET LOCATION
                $locations = get_theme_mod('nav_menu_locations');
                $menu = get_term_by('name', 'Main Menu', 'nav_menu');
                $locations['primary'] = $menu->term_id;
                set_theme_mod('nav_menu_locations', $locations);
            }

        }

        #CREATE MENUS - FOOTER
        if ( !has_nav_menu( 'footer' ) ) {

            // Check if the menu exists
            $menu_name = 'Footer Menu';
            $menu_exists = wp_get_nav_menu_object( $menu_name );

            // If it doesn't exist, let's create it.
            if( !$menu_exists){
                $menu_id = wp_create_nav_menu($menu_name);
                foreach($footer_menu_array as $key=>$value){
                    #GET PAGE
                    $page = get_page_by_title( $value );
                    #SET PAGE IN MENU
                    wp_update_nav_menu_item($menu_id, 0, array(
                            'menu-item-title' =>  esc_html($page->post_title),
                            'menu-item-url' => get_permalink($page->ID),
                            'menu-item-status' => 'publish')
                    );
                }
                #SET LOCATION
                $locations = get_theme_mod('nav_menu_locations');
                $menu = get_term_by('name', 'Footer Menu', 'nav_menu');
                $locations['footer'] = $menu->term_id;
                set_theme_mod('nav_menu_locations', $locations);
            }

        }

    }

    # GET POST BY TITLE
    public function knack_title($page_title, $type) {
        global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='".$type."'", $page_title ));
        if ( $post )
            return get_post($post, OBJECT);
        return null;
    }

    # GET CONTENT
    public function knack_get_content($for, $obj = null){

        $content = '';

        switch($for){
            case 'home':
                $content = 'HOME';
                break;
            case 'about':
                $content = 'ABOUT';
                break;
            case 'contact':
                $content = 'CONTACT';
                break;
            case 'faq':
                $content = 'FAQ';
                break;
        }

        return $content;

    }

    # MEDIA
    public function knack_media($image){

        /* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
        $creds = request_filesystem_credentials(site_url() . '/wp-admin/', '', false, false, array());

        /* initialize the API */
        if ( ! WP_Filesystem($creds) ) {
            //RESPOND WITH JSON
            echo json_encode('ERROR');
            exit();
        }

        #GLOBALS
        global $wp_filesystem;

        // Add Featured Image to Post
        $image_url        = esc_url(get_template_directory_uri().'/assets/images/'.$image); // Define the image URL here
        $image_name       = $image;
        $upload_dir       = wp_upload_dir(); // Set upload folder
        $image_data       = $wp_filesystem->get_contents($image_url);
        $unique_file_name = wp_unique_filename( $upload_dir['path'], $image ); // Generate unique name
        $filename         = basename( $unique_file_name ); // Create image file name

        // Check folder permission and define file location
        if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        // Create the image file on the server
        $wp_filesystem->put_contents($file, $image_data, FS_CHMOD_FILE);

        // Check image file type
        $wp_filetype = wp_check_filetype( $filename, null );

        // Set attachment data
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );

        // Create the attachment
        $attach_id = wp_insert_attachment( $attachment, $file );

        // Include image.php
        get_template_part( ABSPATH . 'wp-admin/includes/image' );

        // Define attachment metadata
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

        // Assign metadata to attachment
        wp_update_attachment_metadata( $attach_id, $attach_data );

        return $attach_id;

    }

    # ADD FEATURED IMAGE
    public function knack_featured($id, $image){

        /* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
        $creds = request_filesystem_credentials(site_url() . '/wp-admin/', '', false, false, array());

        /* initialize the API */
        if ( ! WP_Filesystem($creds) ) {
            //RESPOND WITH JSON
            echo json_encode('ERROR');
            exit();
        }

        #GLOBALS
        global $wp_filesystem;

        // Add Featured Image to Post
        $image_url        = esc_url(get_template_directory_uri().'/assets/images/'.$image); // Define the image URL here
        $image_name       = $image;
        $upload_dir       = wp_upload_dir(); // Set upload folder
        $image_data       = $wp_filesystem->get_contents($image_url);
        $unique_file_name = wp_unique_filename( $upload_dir['path'], $image ); // Generate unique name
        $filename         = basename( $unique_file_name ); // Create image file name

        // Check folder permission and define file location
        if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        // Create the image file on the server
        $wp_filesystem->put_contents($file, $image_data, FS_CHMOD_FILE);

        // Check image file type
        $wp_filetype = wp_check_filetype( $filename, null );

        // Set attachment data
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );

        // Create the attachment
        $attach_id = wp_insert_attachment( $attachment, $file, $id );

        // Include image.php
        get_template_part( ABSPATH . 'wp-admin/includes/image' );

        // Define attachment metadata
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

        // Assign metadata to attachment
        wp_update_attachment_metadata( $attach_id, $attach_data );

        // And finally assign featured image to post
        set_post_thumbnail( $id, $attach_id );

    }

}