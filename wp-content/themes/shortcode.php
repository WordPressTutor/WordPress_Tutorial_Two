<?php

function my_shortcode(){
    $message = "<h2>Hello World</h2>";
    return $message;
}

add_shortcode('greeting', 'my_shortcode');
?>