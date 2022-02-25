<?php

use Carbon_Fields\Carbon_Fields;

add_action('after_setup_theme','crb_load');
function crb_load(){
	load_template(get_template_directory() . '/includes/carbon-fields/vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}



add_action( 'woocommerce_after_cart_item_name', 'lublei_artikul_in_cart', 25 );
 
function lublei_artikul_in_cart( $cart_item ) {
 
	$sku = $cart_item['data']->get_sku();
 
	if( $sku ) { // если заполнен, то выводим
		echo '<small> ' . $sku . '</small>';
	}
 
}

add_action( 'carbon_fields_register_fields', 'estore_register_custom_fields' );
function estore_register_custom_fields() {
	require get_template_directory() . '/includes/custom-fields-options/metabox.php';
	require get_template_directory() . '/includes/custom-fields-options/theme-options.php';
}


require get_template_directory() .'/includes/theme-settings.php';

require get_template_directory() .'/includes/widget-areas.php';

require get_template_directory() .'/includes/enqueue-script-style.php';

require get_template_directory() . '/includes/helpers.php';

require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '\woocommerce\includes\wc_functions_cart.php';

}

add_filter( 'woocommerce_endpoint_order-received_title', 'WC_edit_title', 25 );
 
function WC_edit_title( $title ) {
 
	return "Спасибо за покупку!";
 
}
add_filter( 'woocommerce_endpoint_order-received_title', 'WC_edit_subtitle', 25 );
 
function WC_edit_subtitle( $title ) {
 
	return "Спасибо за покупку!";
 
}

add_filter( 'woocommerce_thankyou_order_received_text', 'WC_thank_you_text', 25 );
 
function WC_thank_you_text( $order ) { // объект заказа доступен внутри
	return 'В ближайшее время с вами свяжется наш менеджер для потверждения заказа';
}

add_filter('woocommerce_get_image_size_gallery_thumbnail','add_gallery_thumbnail_size',1,10);
function add_gallery_thumbnail_size($size){

    $size['width'] = 1920;
    $size['height'] = 1080;
    $size['crop']   = 1;
    return $size;
}

function woocommerce_template_loop_product_title_with_sku() {
	global $product;
	echo '<span class="loop-title-sku">' . $product->get_sku() . '</span>';
	echo '<h3 class="loop-title">' . get_the_title() . '</h3>';
}

/*REMOVE old loop-title action             */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

/* ADD new loop-title-with sku action      */
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_with_sku', 10 );

