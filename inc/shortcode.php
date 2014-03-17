<?php

add_shortcode( 'slider', 'shortcode_gallery');

function shortcode_gallery($atts){
	extract( shortcode_atts( array(
		'id_gallery' => '',
		), $atts));
	return "<p>Hello: " . $id_gallery . "</p>";
}