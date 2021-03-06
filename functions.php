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
            <?php echo do_shortcode('[product_category category="home-kits" per_page="3" orderby="price" order="asc" columns="9"]'); ?>
        </div>
    </div>
<?php 
}
add_action('homepage', 'carolinaspa_homepage_homekit', 25);


// Banner with message - front-page
function carolinaspa_spoil_banner(){ ?>
    <div class="banner-spoil">
        <div class="columns-4">
            <h3><?php the_field('banner_text'); ?></h3>
        </div>
        <div class="columns-8">
            <img src="<?php the_field('banner_image'); ?>" alt="">
        </div>
    </div>

<?php    
}
add_action('homepage', 'carolinaspa_spoil_banner', 80);


// Print Features with icons
function carolinaspa_display_features(){ ?>
            </main>
        </div><!-- #primary -->
    </div><!-- .col-full -->

    <div class="home-features">
        <div class="col-full">
            <div class="columns-4">
                <?php the_field('feature_icon_1'); ?>
                <p><?php the_field('feature_content_1'); ?></p>
            </div>
            <div class="columns-4">
                <?php the_field('feature_icon_2'); ?>
                <p><?php the_field('feature_content_2'); ?></p>
            </div>
            <div class="columns-4">
                <?php the_field('feature_icon_3'); ?>
                <p><?php the_field('feature_content_3'); ?></p>
            </div>
        </div>
    </div>


    <div class="col-full">
        <div class="content-area">
            <div class="site-main">

<?php
}
add_action('homepage', 'carolinaspa_display_features', 15);