<?php

# CLASS FRONTEND

class knack_frontend{

	# CONSTRUCT
	public function __construct(){

        $this->check = new knack_check();

    }

    public function knack_get_options(){

        # GET OPTION DATA
        $options = get_option( 'knack_theme_options' );

        # RETURN
        return $options;

    }

    public function knack_signup_form(){

        get_template_part( 'knack/templates/signup-form' );

        exit;

    }

    public function knack_signup(){

        $form_data = array();
        parse_str($_POST['data'], $form_data);

        #VALIDATE DATA
        $status = true;

        #NAME
        if(isset($form_data['signup-name']) &&$this->check->knack_checkString($form_data['signup-name'])){
            $user_name = true;
        }else{
            $user_name = false;
            $status = false;
        }

        #EMAIL
        if(isset($form_data['signup-email']) && $this->check->knack_checkEmail($form_data['signup-email'])){
            $user_email = true;
        }else{
            $user_email = false;
            $status = false;
        }

        #RESPOND
        if($status) {

            $signups = get_option( 'knack_theme_signups' );

            array_push($signups,
                array(
                    'email' => $form_data['signup-email'],
                    'name' => $form_data['signup-name'],
                )
            );

            # UPDATE OPTION
            update_option( 'knack_theme_signups', $signups );

            $message_array = array(
                'status' => $status,
                'signups' => $signups
            );

            # RESPOND WITH JSON
            echo json_encode($message_array);
            exit();

        }else{

            #ERROR ARRAY
            $error_array = array(
                'status' => $status,
                'insert_msg' => 'Your form has erros\'s!',
                'fields' => array(
                    'signup-name' => $user_name,
                    'signup-email' => $user_email,
                ),
            );

            #RETURN
            echo json_encode($error_array);
            exit();

        }

    }

    public function knack_count(){

        global $woocommerce;

        $data = array(
            'total' => $woocommerce->cart->cart_contents_count,
            'items' => count($woocommerce->cart->get_cart()),
            'sub_total' => $woocommerce->cart->get_cart_total(),
        );

        echo json_encode($data);
        exit;

    }

    public function knack_get_cart(){

        global $woocommerce;

        $cart = array_reverse($woocommerce->cart->get_cart());
        $loop = 1;
        $html = '';

        if(!empty($cart)) {

            foreach ($cart as $item) {

                $image = wp_get_attachment_image_src(get_post_thumbnail_id($item['product_id']), 'medium');

                //VAR QUERIES
                set_query_var('image', $image[0]);
                set_query_var('title', $item['data']->post->post_title);
                set_query_var('product_i', $item['product_id']);

                get_template_part( 'knack/templates/cart' );

                if ($loop > 2) {
                    set_query_var('total', $woocommerce->cart->get_cart_total());
                    get_template_part( 'knack/templates/cart', 'total' );
                    exit;
                }
                $loop++;

            }

            set_query_var('total', $woocommerce->cart->get_cart_total());
            get_template_part( 'knack/templates/cart', 'total' );

        } else {

            # NO CART ITEMS

            set_query_var( 'type', 'cart' );

            get_template_part( 'knack/templates/none' );

            exit();

        }

        exit;

    }

    public function knack_add_wish(){

        if ( class_exists( 'WooCommerce' ) && is_user_logged_in() ) {

            # PRODUCT TO ADD TO WISHLIST
            $id = $_POST['id'];

            # GET USER ID
            $user = get_current_user_id();

            # GET USER WISHLIST
            $wishlist = esc_attr( get_the_author_meta( 'user_wishlist', $user ) );

            # CURRENT ID ARRAY
            $array = explode(',', $wishlist);

            # PUSH VALUES
            array_push($array, $id);

            # NEW PRODUCT IDS
            $new_id = implode(',', array_unique($array));

            # UPDATE USERMETA
            update_user_meta( $user, 'user_wishlist', ltrim($new_id, ',') );

            # ECHO JSON
            echo json_encode($new_id);
            exit();

        } else {

            # NOT ACTIVE
            echo json_encode(array(
                'status' => 'not'
            ));
            exit();

        }

    }

    public function knack_preview(){

        $id = $_POST['id'];

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 1,
            'post__in' => array( $id ),
        );

        query_posts($args);

        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'large');
                set_query_var('image', $image[0]);
                get_template_part( 'knack/templates/preview' );
            endwhile;
        endif;

        wp_reset_query();

        exit;

    }

    public function knack_get_wish(){

        if ( class_exists( 'WooCommerce' ) ) {

            # GET USER ID
            $id = get_current_user_id();

            # GET USER WISHLIST
            $wishlist = esc_attr(get_the_author_meta('user_wishlist', $id));

            if($wishlist != ''){

                $wishlist = explode(',', $wishlist);

                $data = array(
                    'count' => count($wishlist),
                );

                echo json_encode($data);
                exit;

            } else {

                $data = array(
                    'count' => 0,
                );

                echo json_encode($data);
                exit;

            }

        } else {

            echo json_encode('out');
            exit;

        }

    }

    public function knack_get_wish_data(){

        if ( class_exists( 'WooCommerce' ) && is_user_logged_in() ) {

            global $post;
            setup_postdata($post);

            # GET USER ID
            $id = get_current_user_id();

            # GET USER WISHLIST
            $wishlist = esc_attr( get_the_author_meta( 'user_wishlist', $id ) );

            # ARGS
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'offset' => 0,
                'include' => array_reverse(explode(',', $wishlist))
            );

            $posts = get_posts($args);

            $loop = 1;

            if($wishlist != ''){

                foreach($posts as $wish){

                    $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $wish->ID ), 'large' );

                    set_query_var( 'image', $image[0] );
                    set_query_var( 'title',	$wish->post_title );
                    set_query_var( 'product_i', $wish->ID );

                    get_template_part( 'knack/templates/cart' );

                    if ($loop > 2) {
                        exit;
                    }
                    $loop++;

                }

                exit;

            } else {

                set_query_var( 'type', 'wishlist' );

                get_template_part( 'knack/templates/none' );

                exit();

            }

        } else {

            set_query_var( 'content', esc_attr__('You must be logged in.', 'knack') );

            exit();

        }

    }
	
}