<?php

# CLASS SHORTCODES

class knack_shortcodes{

    # CONSTRUCT
    public function __construct(){

        # INSTANTIATE CLASS
        if ( defined( 'WPB_VC_VERSION' ) && class_exists('knack_content')) {
            $this->content_shortcodes();
        }

    }

    # GET CONTENT SHORTCODES
    public function content_shortcodes(){

        $knack_composer = new knack_composer();

        add_shortcode( 'knack_shortcode_element', array($knack_composer, 'knack_shortcode_element') );
        add_shortcode( 'knack_shortcode_products', array($knack_composer, 'knack_shortcode_products') );
        add_shortcode( 'knack_shortcode_brands', array($knack_composer, 'knack_shortcode_brands') );
        add_shortcode( 'knack_shortcode_signup', array($knack_composer, 'knack_shortcode_signup') );
        add_shortcode( 'knack_shortcode_posts', array($knack_composer, 'knack_shortcode_posts') );
        add_shortcode( 'knack_shortcode_map', array($knack_composer, 'knack_shortcode_map') );

    }

}