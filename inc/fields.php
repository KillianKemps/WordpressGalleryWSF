<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_entrees-galerie',
		'title' => 'Entrées galerie',
		'fields' => array (
			array (
				'key' => 'field_5325d0e6d4a79',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5325d119d4a7a',
				'label' => 'Image miniature',
				'name' => 'image_miniature',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'galerie',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


/*if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_projets-champs-additionnels',
		'title' => 'Projets - champs additionnels',
		'fields' => array (
			array (
				'key' => 'field_5319d116870fc',
				'label' => 'Client',
				'name' => 'client',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5319d164870fd',
				'label' => 'Date de réalisation',
				'name' => 'date_de_realisation',
				'type' => 'date_picker',
				'instructions' => 'Sélectionner la date',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5319d198870fe',
				'label' => 'URL',
				'name' => 'url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'projet',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}*/
