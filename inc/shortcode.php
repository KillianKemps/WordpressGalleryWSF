<?php

class shortcode_gallery {
	function __construct() {
		add_shortcode( 'slider', array( $this, 'shortcode_gallery'));
		add_action('init', array( $this, 'enqueue'), 30 );
		add_action('init', array( $this, 'image_size'), 30 );
		add_action('init', array( $this, 'gallery_slider'), 30 );
		add_action('admin_footer', array( $this, 'prompt_box'), 30 );

	}

	function shortcode_gallery($atts){
		extract( shortcode_atts( array(
				'id_gallery' => '',
			), $atts));

		
		$slides = get_field('slides', $id_gallery);
		$return = '';
			if ( !empty ( $slides ) && is_array($slides) ) :
				//Add images in full size
				$return .= "<ul class=\"bxslider\">";
				foreach ($slides as $image_container => $image) {
					$return .= "<li>" . wp_get_attachment_image( $image['image'], 'full' ) . "</li>";
				}
				$return .= '</ul>';
				//Add the thumbnails
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
		//Add jQuery library on which depends the script 
		wp_enqueue_script(
			'jquery', 
			'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js',
			array(),
			"1.8.2",
			false	
		);

		//Add the script library
		wp_enqueue_script(
			'slider-bxslider', 
			WSF_PORTFOLIO_URL . 'slider-bxslider/js/jquery.bxslider.min.js',
			array('jquery'),
			"1.0",
			false	
		);

		//Add the script to execute the slider
		wp_enqueue_script(
			'main', 
			WSF_PORTFOLIO_URL . 'js/main.js',
			array('slider-bxslider'),
			"1.0",
			false	
		);

		//Add the stylesheet for the slider
		wp_enqueue_style(
			'slider-bxslider',
			WSF_PORTFOLIO_URL . 'slider-bxslider/lib/jquery.bxslider.css',
			false,
			'1.0.0',
			'all'
		);
	}

	function image_size(){
		//Add a new size of image. It will be generated at the next upload of the image.
		add_theme_support('post-thumbnails');
		add_image_size('slider_thumb', '80', '80', true );
	}

	function gallery_slider() {

	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}

	if ( get_user_option('rich_editing') == 'true' ) {

		add_filter( 'mce_external_plugins', array( $this, 'add_plugin') );
		add_filter( 'mce_buttons', array( $this, 'register_button') );

		wp_enqueue_style( 'galerie_shortcode_form', WSF_PORTFOLIO_URL . '/lib/style.css', false, "1.0", 'all' );
		wp_enqueue_script('button_js', WSF_PORTFOLIO_URL . '/js/gallery-button.js', array('jquery', 'tinymce'), "1.0", true);
		}

	}

	function prompt_box(){
	$gallery_query = new WP_Query( array(
	'post_type' => 'galerie'
	) );

	if (!$gallery_query->have_posts() ){
	return;
	}

	$box = "<div id='gallery-plugin' class='prompt'>
	<form>
	<label>Nom de la galerie:</label>
	<br />
	<select id='shortcode_list'>
	<option value=''>Choisissez votre galerie</option>";

	while ($gallery_query->have_posts()):
	$gallery_query->the_post();
	$box .= "<option value='" . get_the_ID() . "'>";
	$box .= get_the_title();
	$box .= "</option>";
	endwhile;
	$box .= "</select>
	<br />
	<input type='submit' value='Valider'/>
	<input class='shortcode_cancel' type='button' value='Cancel'/>
	<form>
	</div>";

	echo $box;
	}

	function register_button( $buttons ) {
	array_push( $buttons, "|", "galeries" );
	return $buttons;
	}

	function add_plugin( $plugin_array ) {
	$plugin_array['galeries'] = WSF_PORTFOLIO_URL . '/js/gallery-button.js';
	return $plugin_array;
	}
}

