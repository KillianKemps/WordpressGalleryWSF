<?php

class shortcode_gallery {
	function __construct() {
		add_shortcode( 'slider', array(__CLASS__, 'shortcode_gallery'));
	}

	public static function shortcode_gallery($atts){
		extract( shortcode_atts( array(
			'id_gallery' => '',
		), $atts));
		return "<p>Hello: " . $id_gallery . "</p>";
	}
}

