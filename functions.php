<?php

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price');
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 35);

function products_per_page($products){
    $products = 3;
    return $products;
}
add_filter('loop_shop_per_page', 'products_per_page',20);