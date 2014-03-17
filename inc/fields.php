<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_entrees-galerie',
		'title' => 'Entrées galerie',
		'fields' => array (
			array (
				'key' => 'field_5326fcc469d96',
				'label' => 'Slides',
				'name' => 'slides',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5326fcd769d97',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Ajouter une image',
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
