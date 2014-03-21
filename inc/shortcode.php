<?php

class shortcode_gallery {
	function __construct() {
		add_shortcode( 'slider', array( $this, 'shortcode_gallery'));
		add_shortcode( 'slider-list', array( $this, 'shortcode_gallery_list'));
		add_action('init', array( $this, 'enqueue'), 30 );
		add_action('init', array( $this, 'image_size'), 30 );

	}

	function shortcode_gallery($atts){
		extract( shortcode_atts( array(
				'id_gallery' => '',
			), $atts));

		
		$slides = get_field('slides', $id_gallery);
		$return = '';
			if ( !empty ( $slides ) && is_array($slides) ) :
				$return .= "<ul class=\"bxslider\">";
				foreach ($slides as $image_container => $image) {
					$return .= "<li>" . wp_get_attachment_image( $image['image'], 'full' ) . "</li>";
	
				}
				$return .= '</ul>';

				$return .= "<div id=\"bx-pager\">";
				$i = 0;
				foreach ($slides as $image_container => $image) {

					$return .= "<a data-slide-index=\"" . $i . "\" href=\"#\">" . wp_get_attachment_image( $image['image'], 'slider_thumb' ) . "</a>";
					$i++;
				}
				$return .= '</div>';
			endif;
			return $return;
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

	function image_size(){
		add_theme_support('post-thumbnails');
		add_image_size('slider_thumb', '100', '120', true );
	}

}

