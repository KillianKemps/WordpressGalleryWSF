<?php

class shortcode_gallery {
	function __construct() {
		add_shortcode( 'slider', array( $this, 'shortcode_gallery'));
		add_shortcode( 'slider-list', array( $this, 'shortcode_gallery_list'));
		add_action('init', array( $this, 'enqueue'), 30 );
	}

	function shortcode_gallery($atts){
		extract( shortcode_atts( array(
				'id_gallery' => '',
			), $atts));

		$slides = get_field('slides', $id_gallery);
			if ( !empty ( $slides ) && is_array($slides) ) :
				echo "<ul class=\"bxslider\">";
				foreach ($slides as $image_container => $image) {
					echo wp_get_attachment_image( $image['image'], 'full' );
					//echo wp_get_attachment_image( $image['image'], 'thumbnail' );
				}
				echo '</ul>';
			endif;
	}

	function enqueue() {
		wp_enqueue_script(
			'jquery', 
			'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js',
			array(),
			"1.8.2",
			false	
		);

		wp_enqueue_script(
			'slider-bxslider', 
			WSF_PORTFOLIO_URL . 'slider-bxslider/js/jquery.bxslider.min.js',
			array('jquery'),
			"1.0",
			false	
		);

		wp_enqueue_script(
			'main', 
			WSF_PORTFOLIO_URL . 'js/main.js',
			array('slider-bxslider'),
			"1.0",
			false	
		);

		wp_enqueue_style(
			'slider-bxslider',
			WSF_PORTFOLIO_URL . 'slider-bxslider/lib/jquery.bxslider.css',
			false,
			'1.0.0',
			'all'
		);
	}

	function shortcode_gallery_list(){
		$project_query = new WP_Query( array(
			'post_type' => 'galerie',
			'posts_per_page' => 3
		) );

		if (!$project_query->have_posts() ){
			return false;
		}
	}
}

