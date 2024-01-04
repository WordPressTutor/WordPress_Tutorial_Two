<?php
/*
Plugin Name: My Include files Plugin
Description: A simple plugin that enqueues styles, scripts, and includes images.
Version: 1.0
Author: WordPress Tutorial
*/

// Enqueue styles
function enqueue_my_plugin() {
    wp_enqueue_style('plugin-style', plugins_url('assets/Style/style.css', __FILE__),);
    wp_enqueue_script('plugin-script', plugins_url('assets/Javascript/script.js', __FILE__), array('jquery'), null, true);
}


add_action('wp_enqueue_scripts', 'enqueue_my_plugin');


// Include image files in your HTML or PHP templates
function display_image() {
    $image_path = plugins_url('assets/images/image1.jpg', __FILE__);
    return '<img src="' . $image_path . '" alt="Image 1">';
}
add_shortcode('my_plugin_image', 'display_image');


function include_index_file() {
    ob_start(); // Start output buffering
    include(plugin_dir_path(__FILE__) . 'assets/HTML/index.php'); // Include your index.php file
    $output = ob_get_clean(); // Get the content of the included file
    return $output;
}
add_shortcode('include_index', 'include_index_file');
