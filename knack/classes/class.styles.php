<?php

# CLASS STYLES

class knack_styles{

	# CONSTRUCT
	public function __construct(){}

    # GET STYLES
    public function knack_get_styles() {

	    # CSS
        $css = '';
        $css .= 'body{ background-color: #FFF; }';

        # VARIABLES
        $knack_nav = $GLOBALS['knack']['settings']['header']['stylingOptions'];
        $knack_typography = $GLOBALS['knack']['settings']['typography']['fonts'];
        $knack_buttons = $GLOBALS['knack']['settings']['styling']['buttons'];
        $knack_shop_layout = $GLOBALS['knack']['settings']['woocommerce']['shopLayout'];
        $knack_modal_color = $GLOBALS['knack']['settings']['header']['modalColor'];

        $knack_backgroundPrimary = $GLOBALS['knack']['settings']['footer']['backgroundPrimary'];
        $knack_backgroundSecondary = $GLOBALS['knack']['settings']['footer']['backgroundSecondary'];

        #BODY
        $css .= '
            body .sub-menu{
                display: none;
            }
        ';

        $css .= '
            .sign-up-form-modal h1,
            .sign-up-form-modal span{
                color: '.$knack_modal_color.';
            }
        ';

        # NAVIGATION
        foreach($knack_nav as $nav) {
            switch ($nav['slug']) {
                case 'navigation_primary':
                    $css .= '
                        .nav > li a{
                            color:'.$nav['color'].';
                            font-family:'.$nav['family'].';
                            '.$this->knack_weight($nav['weight']).';
                            font-size:'.$nav['size'].'px;
                            text-transform:'.$nav['transform'].';
                            letter-spacing:'.$nav['spacing'].'px;
						}
						.nav > li a:hover{
                            color:'.$nav['hoverColor'].';
						}
						.navbar-expand-lg{
						    background:rgba('.$this->knack_rgb($nav['background']).', '.$nav['opacity'].') !important;
						}
                    ';
                    break;
                case 'navigation_sticky':
                    $css .= '
                        .knack-sticky .nav > li a{
                            color:'.$nav['color'].';
                            font-family:'.$nav['family'].';
                            '.$this->knack_weight($nav['weight']).';
                            font-size:'.$nav['size'].'px;
                            text-transform:'.$nav['transform'].';
                            letter-spacing:'.$nav['spacing'].'px;
						}
						.knack-sticky .nav > li a:hover{
                            color:'.$nav['hoverColor'].';
						}
						.knack-sticky .navbar-expand-lg{
						   background:rgba('.$this->knack_rgb($nav['background']).', '.$nav['opacity'].') !important;
						}
                    ';
                    break;
                case 'navigation_dropdown':
                    $css .= '
                        .sub-menu > li a{
                            color:'.$nav['color'].' !important;
                            font-family:'.$nav['family'].' !important;
                            '.$this->knack_weight($nav['weight']).' !important;
                            font-size:'.$nav['size'].'px !important;
                            text-transform:'.$nav['transform'].' !important;
                            letter-spacing:'.$nav['spacing'].'px !important;
						}
						.sub-menu > li a:hover{
                            color:'.$nav['hoverColor'].' !important;
						}
						.sub-menu{
						    background:rgba('.$this->knack_rgb($nav['background']).', '.$nav['opacity'].');
						}
                    ';
                    break;
                case 'navigation_eyebrow':
                    $css .= '                    
                        .knack-navigation .knack-eyebrow,
                        .knack-navigation .knack-eyebrow a{
                            color:'.$nav['color'].' !important;
                            font-family:'.$nav['family'].' !important;
                            '.$this->knack_weight($nav['weight']).' !important;
                            font-size:'.$nav['size'].'px !important;
                            text-transform:'.$nav['transform'].' !important;
                            letter-spacing:'.$nav['spacing'].'px !important;
						}
						.knack-navigation .knack-eyebrow a:hover{
                            color:'.$nav['hoverColor'].' !important;
						}
						.knack-navigation .knack-eyebrow{
						    background:rgba('.$this->knack_rgb($nav['background']).', '.$nav['opacity'].');
						}
                    ';
                    break;
                case 'navigation_mobile':
                    $css .= '                    
                        .knack-mobile a{
                            color:'.$nav['color'].' !important;
                            font-family:'.$nav['family'].' !important;
                            '.$this->knack_weight($nav['weight']).' !important;
                            font-size:'.$nav['size'].'px !important;
                            text-transform:'.$nav['transform'].' !important;
                            letter-spacing:'.$nav['spacing'].'px !important;
						}
						.navbar-toggler-icon:before,
						.mobile-toggle:after{
						    color:'.$nav['color'].' !important;
						}
						.navbar-toggler{
						    border-color:'.$nav['color'].' !important;
						}
						.knack-mobile a:hover{
                            color:'.$nav['hoverColor'].' !important;
						}
						.knack-mobile .navbar-expand-lg{
						    background:rgba('.$this->knack_rgb($nav['background']).', '.$nav['opacity'].') !important;
						}
                    ';
                    break;
            }
        }

        # FOOTER
        $css .= '
            .knack-footer{
                background-color:'.$knack_backgroundPrimary.' !important;
            }
            .knack-footer-secondary{
                background-color:'.$knack_backgroundSecondary.' !important;
            }
        ';

        # TYPOGRAPHY
        foreach($knack_typography as $type) {
            switch ($type['slug']) {
                case 'body':
                    $css .= '
                        .knack-content p,
                        .inner-content,
                        .blog-sidebar section,
                        .product_meta,
                        .knack-toolbox,
                        .shop_table_responsive,
                        .woocommerce-checkout-review-order,
                        .woocommerce-table--order-details,
                        address,
                        .woocommerce-order-overview,
                        .cart-price-top,
                        .holder-404,
                        .woocommerce .woocommerce-ordering select{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}						
						.archive-category,
						.archive-date,
						.woocommerce-result-count{
						    color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
						}
						.single-product .summary .woocommerce-Price-amount,
						.single-product .summary .price,
						.social-sharing{
						    color:'.$type['color'].' !important;
						}
						.social-sharing *:hover{
						     color:'.$type['hoverColor'].' !important;
						}
                    ';
                    break;
                case 'url':
                    $css .= '
                        .knack-content a,
                        .archive-item .social-sharing a,
                        .summary .social-sharing a{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
						.knack-content a:hover{
                            color:'.$type['hoverColor'].' !important;
						}
						.star-rating{
						    color:'.$type['color'].' !important;
						}
						.owl-dot,
						.brand-item:hover{
						    border: 1px solid '.$type['color'].' !important;
						}
						.owl-dots .active{
						    background-color:'.$type['color'].' !important;
						}
						.post-archive-item:after{
						    background-color: '.$type['color'].' !important;
						}
						.related-image:after{
						    border-color: '.$type['color'].' !important;
						}
                    ';
                    break;
                case 'h1':
                    $css .= '
                        h1,
                        .knack-content h1,
                        .knack-intro h1{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}						
                    ';
                    break;
                case 'h2':
                    $css .= '
                        .knack-content h2,
                        .cart_totals .shop_table_responsive{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
						.single-product .summary .woocommerce-Price-amount{
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
						#review_form_wrapper .comment-reply-title{
						    color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'h3':
                    $css .= '
                        .knack-content h3,
                        .knack-content h3 a,
                        .woocommerce-shipping-fields .woocommerce-form__label{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'h4':
                    $css .= '
                        .knack-content h4,
                        .category-heading span{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'h5':
                    $css .= '
                        h5,
                        .knack-content h5,
                        .related-posts h5 a,
                        .cart-total-cost,
                        body.woocommerce .shop_table_responsive  thead tr th{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'h6':
                    $css .= '
                        .knack-content h6,
                        .knack-content .comments-posts .current-comments > .title{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'archive_title':
                    $css .= '
                        .woocommerce ul.products li.product .woocommerce-loop-product__title,
                        .shop_table_responsive .product-name a{
                            color:'.$type['color'].' !important;
                            font-family:'.$type['family'].' !important;
                            '.$this->knack_weight($type['weight']).' !important;
                            font-size:'.$type['size'].'px !important;
                            text-transform:'.$type['transform'].' !important;
                            letter-spacing:'.$type['spacing'].'px !important;
                            line-height:'.$type['lineHeight'].'px !important;
						}
                    ';
                    break;
                case 'archive_price':
                    $css .= '
                        .woocommerce ul.products li.product .price,
                        .woocommerce-cart-form__contents .woocommerce-Price-amount{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'label':
                    $css .= '
                        label,
                        .woocommerce div.product form.cart .variations label{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).' !important;
                            font-size:'.$type['size'].'px  !important;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'footer_heading':
                    $css .= '
                        .knack-footer h4,
                        .knack-footer h3,
                        .knack_footer_heading{
                            color:'.$type['color'].';
                            font-family:'.$type['family'].';
                            '.$this->knack_weight($type['weight']).';
                            font-size:'.$type['size'].'px;
                            text-transform:'.$type['transform'].';
                            letter-spacing:'.$type['spacing'].'px;
                            line-height:'.$type['lineHeight'].'px;
						}
                    ';
                    break;
                case 'footer_content':
                    $css .= '
                        .knack-footer .widget,
                        .knack-footer .widget a,
                        .knack-footer .product-title,
                        .knack-footer-secondary,
                        .knack-footer-secondary a,
                        .knack_footer_content,
                        .knack_footer_content a{
                            color:'.$type['color'].' !important;
                            font-family:'.$type['family'].' !important;
                            '.$this->knack_weight($type['weight']).' !important;
                            font-size:'.$type['size'].'px !important;
                            text-transform:'.$type['transform'].' !important;
                            letter-spacing:'.$type['spacing'].'px !important;
                            line-height:'.$type['lineHeight'].'px !important;
						}
						.knack-footer .widget a:hover,
						.knack-footer .widget a:hover .product-title,
						.knack-footer-secondary a:hover{
                            color:'.$type['hoverColor'].' !important;
						}						
                    ';
                    break;
                case 'add_to_cart':
                    $css .= '                        
                        body a.add_to_cart_button,
                        body.woocommerce a.add_to_cart_button,
                        .woocommerce .products li a.ajax_add_to_cart,
                        .woocommerce .products li .product_type_variable,
                        .woocommerce .products li .product_type_grouped{
                            color:'.$type['color'].' !important;
                            font-family:'.$type['family'].' !important;
                            '.$this->knack_weight($type['weight']).'
                            font-size:'.$type['size'].'px !important;
                            text-transform:'.$type['transform'].' !important;
                            letter-spacing:'.$type['spacing'].'px !important;
                            line-height:'.$type['lineHeight'].'px !important;
						}
						body .add_to_cart_button:hover,
                        .products li .ajax_add_to_cart:hover,
                        .woocommerce .products li .product_type_variable:hover,
                        .product_type_grouped:hover{
                            color:'.$type['hoverColor'].' !important;
						}
                    ';
                    break;
                case 'navigation_center':
                    $css .= '  
						.shipping-info span{
						    color:'.$type['color'].' !important;
                            font-family:'.$type['family'].' !important;
                            '.$this->knack_weight($type['weight']).' !important;
                            font-size:'.$type['size'].'px !important;
                            text-transform:'.$type['transform'].' !important;
                            letter-spacing:'.$type['spacing'].'px !important;
                            line-height: normal;
						}
						.shipping-info .fa:before{
						     color:'.$type['color'].' !important;
						}
                    ';
                    break;
            }
        }

        # BUTTONS
        foreach($knack_buttons as $button) {
            switch ($button['slug']) {
                case 'buttons':
                    $css .= '
                        body .knack-button,
                        [type="submit"],
                        .knack-content .widget .button,
                        body .checkout-button,
                        .woocommerce button.button{
                            color:'.$button['color'].' !important;
                            font-family:'.$button['family'].' !important;
                            '.$this->knack_weight($button['weight']).' !important;
                            font-size:'.$button['size'].'px !important;
                            text-transform:'.$button['transform'].' !important;
                            letter-spacing:'.$button['spacing'].'px !important;
                            background-color:'.$button['background'].' !important;  
						}
						.single-wish-button{                            
                            font-family:'.$button['family'].' !important;
                            '.$this->knack_weight($button['weight']).' !important;
                            font-size:'.$button['size'].'px !important;
                            text-transform:'.$button['transform'].' !important;
                            letter-spacing:'.$button['spacing'].'px !important;                            
						}
						body .knack-button:hover,
                        [type="submit"]:hover,
                        .knack-content .widget .button:hover,
                        body .checkout-button:hover{
                            color:'.$button['hoverColor'].'  !important;
                            background-color:'.$button['backgroundHover'].' !important;
						}
						.woocommerce-tabs .nav .nav-link{
						    color:'.$button['hoverColor'].'  !important;
                            font-family:'.$button['family'].';
                            '.$this->knack_weight($button['weight']).';
                            font-size:'.$button['size'].'px;
                            text-transform:'.$button['transform'].';
                            letter-spacing:'.$button['spacing'].'px;
                            background-color:'.$button['backgroundHover'].' !important;    
						}
						.woocommerce-tabs .nav .active .nav-link{
						    color:'.$button['color'].'  !important;
                            font-family:'.$button['family'].';
                            '.$this->knack_weight($button['weight']).';
                            font-size:'.$button['size'].'px;
                            text-transform:'.$button['transform'].';
                            letter-spacing:'.$button['spacing'].'px;
                            background-color:'.$button['background'].' !important;    
						}
						.woocommerce-tabs .nav .nav-link:hover{
						    color:'.$button['color'].'  !important;                           
                            background-color:'.$button['background'].' !important;    
						}
                    ';
                    break;
                case 'tags':
                    $css .= '
                        .knack-content .single-item .tags a,
                        .tagcloud a{
                            color:'.$button['color'].'  !important;
                            font-family:'.$button['family'].';
                            '.$this->knack_weight($button['weight']).';
                            font-size:'.$button['size'].'px !important;
                            text-transform:'.$button['transform'].';
                            letter-spacing:'.$button['spacing'].'px;
                            background-color:'.$button['background'].' !important;                       
                            line-height: normal;
						}
						.knack-content .single-item .tags a:hover,
						.tagcloud a:hover{
                            color:'.$button['hoverColor'].' !important;
                            background-color:'.$button['backgroundHover'].' !important;
						}
                    ';
                    break;
            }
        }

        if(is_page()){
            global $post; setup_postdata($post);
            $shortcode = get_post_meta( $post->ID, 'meta_shortcode', true );
            if($shortcode != ''){
                $css .= '
                    .knack-navigation .navbar-expand-lg{
                        border-bottom: none !important
                    }
                    .knack-sticky .navbar-expand-lg{
                        border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
                    }
                ';
            }
        }

        if(class_exists( 'WooCommerce' )){
            if(is_shop() || is_product_category() || is_product_tag()){
                if($knack_shop_layout == 'standard'){
                    $css .= '
                        .products li{
                            width: 30.777777777% !important;
                        }
                    ';
                }
            }
        }

        return $css;

    }

    # WEIGHTS
    public function knack_weight($weight){

        #VARIABLE
        $original = $weight;
        $w = '';
        $s = 'inherit';

        $remove_items = array("italic");

        #GET THE WEIGHT
        $w =  str_replace($remove_items, "", $weight);

        #GET THE STYLE - ONLY IF IT EXISTS
        if(strpos($original, 'italic') !== false){
            $s = 'italic';
        }

        $return_weight = '';
        $return_style = '';

        #RETURN VARIABLES
        if($w){
            if($weight == 'regular'){
                $w = 400;
            }
            $return_weight = 'font-weight:'.$w.' !important;';
        }
        if($s){
            $return_style = 'font-style:' . $s . ';';
        }

        #RETURN
        return	$return_weight.$return_style;

    }

    # HEX TO RGB
    public function knack_rgb($hex){

        #GET HEX VALUE AND REMOVE THE #
        $hex_value = str_replace('#', '', $hex);

        #IF HEX VALUE LENGTH IS 3, ELSE
        if(strlen($hex_value) == 3) {
            $r = hexdec(substr($hex_value,0,1).substr($hex_value,0,1));
            $g = hexdec(substr($hex_value,1,1).substr($hex_value,1,1));
            $b = hexdec(substr($hex_value,2,1).substr($hex_value,2,1));
        } else {
            $r = hexdec(substr($hex_value,0,2));
            $g = hexdec(substr($hex_value,2,2));
            $b = hexdec(substr($hex_value,4,2));
        }

        #RGB STRING
        $rgb_string = $r . ',' . $g . ',' . $b;

        #RETURN RGB STRING
        return $rgb_string;

    }

    # GET FONTS
    public function knack_get_fonts(){

        # VARIABLES
        $fonts = [];
        $exclude = ['Arial', 'Verdana'];
        $typography = $GLOBALS['knack']['settings']['typography']['fonts'];
        $navigation = $GLOBALS['knack']['settings']['header']['stylingOptions'];

        # TYPOGRAPHY PUSH
        foreach($typography as $font){
            if(!in_array($font['family'], $exclude)){
                array_push($fonts, $font['family'].':'.$font['weight']);
            }
        }

        # HEADER
        foreach($navigation as $font){
            if(!in_array($font['family'], $exclude)){
                array_push($fonts, $font['family'].':'.$font['weight']);
            }
        }

        return $fonts;

    }

}