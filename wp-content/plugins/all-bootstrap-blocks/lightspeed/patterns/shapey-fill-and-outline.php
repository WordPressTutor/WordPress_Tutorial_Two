<?php 
$margin = '0 0 -30px 0';
$pattern_style = 'fill="none" style="stroke: ' . $pattern_color . '; stroke-width: 0.4px; stroke-linejoin: round;"';
$pattern_style_2 = 'fill="' . $pattern_color . '" style="opacity: 0.3;"';
$pattern_svg = '
	<polygon ' . $pattern_style . ' points="81.8,21.2 71.5,27.2 71.5,27.2 71.5,15.2 61.1,9.2 50.8,3.3 40.6,9.2 30.2,15.2 19.9,21.2 9.5,27.2 9.5,39 19.9,45 
	9.5,51 9.5,62.9 9.5,74.8 19.9,80.8 30.2,86.7 40.6,92.7 50.8,98.7 61.1,92.7 61.1,80.9 61.1,80.8 71.5,86.7 81.8,80.8 92.2,74.8 
	92.2,62.9 92.2,51 92.2,39 92.2,27.2 "/>
	<polygon ' . $pattern_style_2 . ' points="79.9,19.2 69.6,25.2 69.6,25.2 69.6,13.3 59.2,7.3 48.9,1.3 38.6,7.3 28.2,13.3 17.9,19.2 7.5,25.2 7.5,37.1 
	17.9,43 7.5,49 7.5,61 7.5,72.8 17.9,78.8 28.2,84.8 38.6,90.8 48.9,96.7 59.2,90.8 59.2,78.9 59.2,78.8 69.6,84.8 79.9,78.8 
	90.2,72.8 90.2,61 90.2,49 90.2,37.1 90.2,25.2 "/>
'; 

include( AREOI__PLUGIN_LIGHTSPEED_DIR . 'partials/pattern.php' );

$margin = '0';
$pattern_style = 'fill="none" style="stroke: ' . $pattern_color . '; stroke-width: 0.2px; stroke-linejoin: round;"';
$pattern_style_2 = 'fill="' . $pattern_color . '" style="opacity: 0.3;"';
$pattern_svg = '
	<polygon ' . $pattern_style . ' points="81.8,21.2 71.5,27.2 71.5,27.2 71.5,15.2 61.1,9.2 50.8,3.3 40.6,9.2 30.2,15.2 19.9,21.2 9.5,27.2 9.5,39 19.9,45 
	9.5,51 9.5,62.9 9.5,74.8 19.9,80.8 30.2,86.7 40.6,92.7 50.8,98.7 61.1,92.7 61.1,80.9 61.1,80.8 71.5,86.7 81.8,80.8 92.2,74.8 
	92.2,62.9 92.2,51 92.2,39 92.2,27.2 "/>
	<polygon ' . $pattern_style_2 . ' points="79.9,19.2 69.6,25.2 69.6,25.2 69.6,13.3 59.2,7.3 48.9,1.3 38.6,7.3 28.2,13.3 17.9,19.2 7.5,25.2 7.5,37.1 
	17.9,43 7.5,49 7.5,61 7.5,72.8 17.9,78.8 28.2,84.8 38.6,90.8 48.9,96.7 59.2,90.8 59.2,78.9 59.2,78.8 69.6,84.8 79.9,78.8 
	90.2,72.8 90.2,61 90.2,49 90.2,37.1 90.2,25.2 "/>
'; 
include( AREOI__PLUGIN_LIGHTSPEED_DIR . 'partials/pattern-media.php' );
?>