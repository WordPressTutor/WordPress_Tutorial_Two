<?php
/*
Plugin Name: My Shortcode Plugin
Description: This is a Shortcode Plugin
Version: 1.0
Author: WordPress Tutorial
*/

add_shortcode('shortcodesaa', 'my_second_shortcode');


function my_second_shortcode(){
    echo "Hello, ";
}

?>