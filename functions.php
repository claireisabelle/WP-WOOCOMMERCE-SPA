<?php

// Add Stylesheets and Scrips
function carolinaspa_scripts(){
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,900|Lora:400,700');
}
add_action('wp_enqueue_scripts', 'carolinaspa_scripts');


// Tests

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price');
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 35);

function products_per_page($products){
    $products = 3;
    return $products;
}
add_filter('loop_shop_per_page', 'products_per_page',20);


// Remove the homepage content text and display the feature image
function carolinaspa_homepage_content(){
    remove_action('homepage', 'storefront_homepage_content');
    add_action('homepage', 'carolinaspa_homepage_coupon', 10);
}
add_action('init', 'carolinaspa_homepage_content');

function carolinaspa_homepage_coupon(){
    echo "<div class='main-content'>";
        the_post_thumbnail();
    echo "</div>";
}


// Display Home Kits in the Homepage
function carolinaspa_homepage_homekit(){ ?>
    <div class="homepage-home-kit-category">
        <div class="content">
            <div class="columns-3">
                <?php $home_kit = get_term(18, 'product_cat', ARRAY_A ); ?>
                <h2 class="section-title"><?php echo $home_kit['name']; ?></h2>
                <p><?php echo $home_kit['description']; ?></p>
                <a href="<?php echo get_category_link($home_kit['term_id']) ?>">All Products &raquo;</a>
                
            </div>
        </div>
    </div>
<?php 
}
add_action('homepage', 'carolinaspa_homepage_homekit', 25);