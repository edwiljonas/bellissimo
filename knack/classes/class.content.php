<?php

# CLASS CONTENT

class knack_content{

	# CONSTRUCT
	public function __construct(){
	}

	# ELEMENT
	public function knack_element($atts){
		
		?>
            <div class="col-md-12">
                CONTENT
            </div>
        <?php
		
	}

    # ELEMENT
    public function knack_products($atts){

        $layout = isset($atts['knack_layout']) ? $atts['knack_layout'] : '';
        $display = isset($atts['knack_content']) ? $atts['knack_content'] : '';
        $specific = isset($atts['knack_specific']) ? $atts['knack_specific'] : '';
        $categories = isset($atts['knack_category']) ? $atts['knack_category'] : '';
        $count = $GLOBALS['knack']['settings']['woocommerce']['perPage'];
        $style = '';

        # CHECK DISPLAY
        switch($display){
            case 'category':

                # VARIABLES
                $term_list = '';

                foreach(explode(',', $categories) as $id){
                    $term = get_term(intval($id), 'product_cat', array("fields" => "ids"));
                    if(!empty($term)){
                        $term_list .= $term->slug . ',';
                    }
                }

                # ARGUMENTS
                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'product_cat' => rtrim($term_list, ','),
                    'posts_per_page' => $count,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                );

                break;
            case 'specific':

                # ARGUMENTS
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'post__in' => explode(',' ,$specific),
                    'offset' => 0,
                );

                break;
        }

        # LAYOUT
        switch($layout){
            case 'carousel':

                # ARGUMENTS
                $style = 'knack-carousel';

                break;
        }

        # QUERY POSTS
        query_posts($args);

        # GENERATE UNIQUE ID
        $unique_id = $this->knack_genGUID();

        ?>
        <div class="col-md-12">
            <ul class="products <?php echo esc_attr($style); ?>">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        ?>
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        <?php
                    endwhile;
                endif;
            ?>
            </ul>
        </div>
        <?php

        # RESET
        wp_reset_query();

    }

    # ELEMENT
    public function knack_posts($atts){

        $layout = isset($atts['knack_layout']) ? $atts['knack_layout'] : '';
        $display = isset($atts['knack_content']) ? $atts['knack_content'] : '';
        $specific = isset($atts['knack_specific']) ? $atts['knack_specific'] : '';
        $categories = isset($atts['knack_category']) ? $atts['knack_category'] : '';
        $style = 'knack-list';

        # CHECK DISPLAY
        switch($display){
            case 'category':

                # VARIABLES
                $term_list = '';

                if(!empty($categories)){
                    foreach(explode(',', $categories) as $id){
                        $term = get_term(intval($id), 'category', array("fields" => "ids"));
                        if(!empty($term)){
                            $term_list .= $term->slug . ',';
                        }
                    }
                }

                # ARGUMENTS
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'product_cat' => rtrim($term_list, ','),
                    'posts_per_page' => -1,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                );

                break;
            case 'specific':

                # ARGUMENTS
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'post__in' => explode(',' ,$specific),
                    'offset' => 0,
                );

                break;
        }

        # LAYOUT
        switch($layout){
            case 'carousel':

                # ARGUMENTS
                $style = 'knack-carousel';

                break;
        }

        # QUERY POSTS
        query_posts($args);

        # GENERATE UNIQUE ID
        $unique_id = $this->knack_genGUID();

        ?>
        <div class="col-md-12">
            <div class="<?php echo esc_attr($style); ?>">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        ?>
                        <?php get_template_part( 'knack/templates/post', 'archive' ); ?>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        <?php

        # RESET
        wp_reset_query();

    }

    # ELEMENT
    public function knack_brands($atts){

        $content = isset($atts['knack_content']) ? $atts['knack_content'] : '';
        $style = '';
        $result = [];

        switch($content){
            case 'category':

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

                    $meta = get_term_meta( $term->term_id );
                    $thumb_id = $meta['thumbnail_id'][0];
                    $image = wp_get_attachment_image_src( $thumb_id, 'medium' );

                    $result[] = array(
                        'url' => get_category_link($term->term_id),
                        'target' => '_self',
                        'image' => $image[0],
                    );

                }

                break;
            case 'images':

                $obj = urldecode($atts['knack_images']);
                $obj = json_decode($obj, true);

                #ARRAY
                $result = array();

                #SETUP RESULTS
                foreach ( $obj as $image )	{

                    $url = isset($image['knack_url']) ? $image['knack_url'] : '';
                    $target = isset($image['knack_target']) ? $image['knack_target'] : '';
                    $img = isset($image['knack_image']) ? $image['knack_image'] : '';
                    $thumbnail_url = wp_get_attachment_image_src($img, 'full' );

                    $result[] = array(
                        'url' => esc_url($url),
                        'target' => $target,
                        'image' => $thumbnail_url[0],
                    );

                }

                break;

        }

        # GENERATE UNIQUE ID
        $unique_id = $this->knack_genGUID();

        ?>
        <div class="col-md-12">
            <div class="knack-carousel">
                <?php foreach($result as $image){ ?>
                <div class="brand-item" style="background-image: url(<?php echo esc_url($image['image']); ?>)">
                </div>
                <?php } ?>
            </div>
        </div>
        <?php

        # RESET
        wp_reset_query();

    }

    # ELEMENT
    public function knack_signup($atts){

        ?>
        <form id="knack-signup-form" class="signup-form">
            <div class="col-md-5 signup-col">
                <div class="input-group">
                    <input id="signup-name" name="signup-name" type="text" class="form-control" placeholder="<?php esc_html_e('Name', 'knack') ?>" aria-label="Name" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-5 signup-col">
                <div class="input-group">
                    <input id="signup-email" name="signup-email" type="text" class="form-control" placeholder="<?php esc_html_e('Email', 'knack') ?>" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-2 signup-col">
                <div class="knack-button">
                    Join Us
                </div>
            </div>
        </form>
        <?php

    }

    # ELEMENT
    public function knack_map($atts){

        ?>
        <div class="col-md-12">
            <div class="knack-map">
                Map
            </div>
        </div>
        <?php

    }


    # GENERATE UNIQUE
	public function knack_genGUID(){
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000,
			mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
		);
	}

}