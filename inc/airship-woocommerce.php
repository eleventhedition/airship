<?php

add_action( 'wp_print_scripts', 'airship_woocommerce_remove_scripts', 100 );
add_action( 'wp_enqueue_scripts', 'airship_woocommerce_remove_generator', 99 );
add_action( 'init', 'airship_woocommerce_image_dimensions', 1 );
add_action( 'woocommerce_single_product_summary', 'airship_woocommerce_template_product_description', 20 );
add_filter( 'woocommerce_product_tabs', 'airship_woocommerce_remove_product_tabs', 98 );
add_filter( 'woocommerce_product_tabs', 'airship_woocommerce_remove_reviews_tab', 98);
add_filter( 'woocommerce_breadcrumb_defaults', 'airship_woocommerce_change_breadcrumb_delimiter' );
add_filter( 'woocommerce_checkout_fields' , 'airship_woocommerce_custom_override_checkout_fields' );

// remove woocommerce scripts on unnecessary pages
function airship_woocommerce_remove_scripts() {
  if (!is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() ) { // if we're not on a Woocommerce page, dequeue all of these scripts
    wp_dequeue_script('wc-add-to-cart');
    wp_dequeue_script('jquery-blockui');
    wp_dequeue_script('jquery-placeholder');
    wp_dequeue_script('woocommerce');
    wp_dequeue_script('jquery-cookie');
    wp_dequeue_script('wc-cart-fragments');
  }
}

function airship_woocommerce_remove_generator() {
  if (!is_woocommerce()) { // if we're not on a woo page, remove the generator tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
  }
}

function airship_woocommerce_image_dimensions() {
    $catalog = array(
    'width'   => '300', // px
    'height'  => '300', // px
    'crop'    => 1    // true
  );
 
  $single = array(
    'width'   => '451', // px
    'height'  => '451', // px
    'crop'    => 1    // true
  );
 
  $thumbnail = array(
    'width'   => '120', // px
    'height'  => '120', // px
    'crop'    => 0    // false
  );
 
  // Image sizes
  update_option( 'shop_catalog_image_size', $catalog );     // Product category thumbs
  update_option( 'shop_single_image_size', $single );     // Single product image
  update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
}

function airship_woocommerce_template_product_description() {
woocommerce_get_template( 'single-product/tabs/description.php' );
}

function airship_woocommerce_remove_product_tabs( $tabs ) {
  unset( $tabs['description'] ); // Remove the description tab
  unset( $tabs['reviews'] ); // Remove the reviews tab
  unset( $tabs['additional_information'] ); // Remove the additional information tab
  return $tabs;
}

function airship_woocommerce_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

function airship_woocommerce_change_breadcrumb_delimiter( $defaults ) {
  // Change the breadcrumb delimeter from '/' to '>'
  $defaults['delimiter'] = ' &nbsp;&rarr;&nbsp; ';
  return $defaults;
}

function airship_woocommerce_custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_phone']);
     unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_city']);
     return $fields;
}

?>