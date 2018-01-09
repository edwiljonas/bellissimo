<div class="row">
    <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
            <h5 class="alert-heading"><?php esc_html_e('Welcome to the knack experience', 'knack') ?></h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet porta erat. Praesent eu felis lacus.
                Proin vel porttitor augue. Donec ultricies semper dui rhoncus tincidunt. Integer diam eros, lobortis vulputate
                sagittis non, molestie eget elit. Duis at velit ut erat ornare ornare.
            </p>
            <hr>
            <p class="mb-0">Integer diam eros, lobortis vulputate sagittis non, molestie eget elit. Duis at velit ut erat ornare ornare.</p>
        </div>
        <div class="alert alert-secondary" role="alert">
            <a href="<?php echo esc_html(admin_url().'edit.php?post_type=product'); ?>" class="alert-link">WooCommerce Products</a>. Click here to view products.
        </div>
        <div class="alert alert-secondary" role="alert">
            <a href="<?php echo esc_html(admin_url().'edit.php'); ?>" class="alert-link">Blog Posts</a>. Click here to view all the blog posts.
        </div>
        <div class="alert alert-secondary" role="alert">
            <a href="<?php echo esc_html(admin_url().'edit.php?post_type=page'); ?>" class="alert-link">Pages</a>. Click here to view products.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
       <div class="demo-install">
           <div class="inner">
               <h1><?php esc_html_e('Demo Install', 'knack') ?></h1>
               <div class="options-button run-demo">
                   <?php esc_html_e('Run Install', 'knack') ?>
               </div>
           </div>
       </div>
    </div>
</div>