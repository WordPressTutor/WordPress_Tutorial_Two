<?php
/*
Plugin Name: Custom Size Product
Description: This is a custom size product plugin
Version: 1.0
Author: WordPress Tutorial
*/

// Add custom product fields
function add_custom_product_field() {
    woocommerce_wp_text_input(
        array(
            'id'          => '_custom_field',
            'label'       => 'Custom Field',
            'desc_tip'    => 'true',
            'description' => 'Enter custom field data here',
        )
    );

    echo '<div class="options_group">';

    // Add size dropdown
    woocommerce_wp_select(
        array(
            'id'          => '_size',
            'label'       => 'Size',
            'options'     => array(
                ''      => 'Select an option',
                'small'  => 'Small',
                'medium' => 'Medium',
                'large'  => 'Large',
            ),
            'desc_tip'    => 'true',
            'description' => 'Select the size.',
        )
    );

    // Add ACF size price fields directly attached to the product

    woocommerce_wp_text_input(
        array(
            'id'          => 'small_size_price',
            'label'       => 'Small Size Price',
            'desc_tip'    => 'true',
            'description' => 'Enter small size price',
        )
    );

    woocommerce_wp_text_input(
        array(
            'id'          => 'medium_size_price',
            'label'       => 'Medium Size Price',
            'desc_tip'    => 'true',
            'description' => 'Enter medium size price',
        )
    );

    woocommerce_wp_text_input(
        array(
            'id'          => 'large_size_price',
            'label'       => 'Large Size Price',
            'desc_tip'    => 'true',
            'description' => 'Enter large size price',
        )
    );

    echo '</div>';
}
add_action('woocommerce_product_options_general_product_data', 'add_custom_product_field');

// Save the custom field data
function save_custom_product_field($product) {
    $custom_field = isset($_POST['_custom_field']) ? sanitize_text_field($_POST['_custom_field']) : '';
    $product->update_meta_data('_custom_field', $custom_field);

    $size = isset($_POST['_size']) ? sanitize_text_field($_POST['_size']) : '';
    $product->update_meta_data('_size', $size);

    // Save ACF size price differences fields
    $small_size_price = isset($_POST['small_size_price']) ? sanitize_text_field($_POST['small_size_price']) : '';
    update_post_meta($product->get_id(), 'small_size_price', $small_size_price);

    $medium_size_price = isset($_POST['medium_size_price']) ? sanitize_text_field($_POST['medium_size_price']) : '';
    update_post_meta($product->get_id(), 'medium_size_price', $medium_size_price);

    $large_size_price = isset($_POST['large_size_price']) ? sanitize_text_field($_POST['large_size_price']) : '';
    update_post_meta($product->get_id(), 'large', $large_size_price);
}
add_action('woocommerce_admin_process_product_object', 'save_custom_product_field');

// Display the size dropdown on the product page
function display_size_dropdown_on_product_page() {

    // Display the size dropdown
    $size_options    = array('' => 'Select an option', 'small' => 'Small', 'medium' => 'Medium', 'large' => 'Large');
    $selected_size   = get_post_meta(get_the_ID(), '_size', true);
    $product_price   = get_post_meta(get_the_ID(), '_regular_price', true);
    $size_price      = get_size_price(get_the_ID(), $selected_size);

    echo '<div class="size-dropdown">';
    echo '<label for="_size">Size:</label>';
    echo '<select name="_size" id="_size">';
    foreach ($size_options as $value => $label) {
        echo '<option value="' . esc_attr($value) . '" ' . selected($selected_size, $value, false) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '<br>';
    echo '<div class="total-price"><span class="custom-price">' . wc_price($product_price + $size_price)  . '</span></div>'; 
    echo '<br>';
    echo '<button id="add-to-cart-button" type="button" class="single_add_to_cart_button button alt">' . esc_html('Add to Cart') . '</button>';


    
}
add_action('woocommerce_before_add_to_cart_quantity', 'display_size_dropdown_on_product_page');

function enqueue_ajax_script() {
    wp_enqueue_script('custom-size-product-ajax', plugin_dir_url(__FILE__) . 'custom-script.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-size-product-ajax', 'custom_size_product_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'product_id' => get_the_ID(),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_script');


function update_total_price_ajax() {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];

    // Get product price
    $product_price = get_post_meta($product_id, '_price', true);

    // Get size price based on ACF fields
    $size_price = get_size_price($product_id, $size);

    // Calculate total price
    $total_price = ($product_price + $size_price) * $quantity;

    echo wc_price($total_price);

    wp_die();
}
add_action('wp_ajax_update_total_price', 'update_total_price_ajax');
add_action('wp_ajax_nopriv_update_total_price', 'update_total_price_ajax');

// Function to get size price based on ACF fields
function get_size_price($product_id, $size) {
    // Get the price differences from ACF fields directly attached to the product
    $small_price = get_post_meta($product_id, 'small_size_price', true);
    $medium_price = get_post_meta($product_id, 'medium_size_price', true);
    $large_price = get_post_meta($product_id, 'large_size_price', true);

    // Determine the size price based on the selected size
    switch ($size) {
        case 'small':
            return $small_price;
        case 'medium':
            return $medium_price;
        case 'large':
            return $large_price;
        default:
            return 0; 
    }
}

function display_size_in_cart($item_data, $cart_item) {
    // Check if 'variation' key exists and has '_size' attribute
    if (isset($cart_item['variation']['_size']) && !empty($cart_item['variation']['_size'])) {
        $item_data[] = array(
            'key'   => 'Size',
            'value' => ucfirst($cart_item['variation']['_size']),
        );
    }

    $product_price = $cart_item['data']->get_price();

    // Check if 'variation' key exists and has '_size' attribute
    $size_price = isset($cart_item['variation']['_size']) ? get_size_price($cart_item['product_id'], $cart_item['variation']['_size']) : 0;

    $total_price = ($product_price + $size_price) * $cart_item['quantity'];

    $item_data[] = array(
        'key'   => 'Total Price',
        'value' => wc_price($total_price),
    );

    return $item_data;
}
add_filter('woocommerce_get_item_data', 'display_size_in_cart', 10, 2);




function hide_all_woocommerce_prices($price, $product) {
    $price = '';

    return $price;
}
add_filter('woocommerce_get_price_html', 'hide_all_woocommerce_prices', 10, 2);



function add_to_cart_ajax() {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    
    $total_price = $_POST['total_price'];
    echo $total_price;
    
    WC()->cart->add_to_cart($product_id, $quantity, 0, 0, array('_size' => $size),array('_total_price' => $total_price));

    wp_die();
}
add_action('wp_ajax_add_to_cart', 'add_to_cart_ajax');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_ajax');







