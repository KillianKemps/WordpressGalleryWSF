<?php

add_action( 'init', 'register_my_cpt_gallery', 10 );

function register_my_cpt_gallery() {

register_post_type( "galerie", array (
  'labels' => 
  array (
    'name' => 'Galeries',
    'singular_name' => 'Galerie',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une galerie',
    'edit_item' => 'Modifier la galerie',
    'new_item' => 'Nouvelle galerie',
    'view_item' => 'Voir galerie',
    'search_items' => 'Chercher une galerie',
    'not_found' => 'Aucune galerie trouvée',
    'not_found_in_trash' => 'Aucune galerie trouvée dans la corbeille',
    'parent_item_colon' => 'Galerie parente:',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 'post',
  'public' => true,
  'hierarchical' => false,
  'rewrite' => 
  array (
    'slug' => 'galerie',
    'with_front' => true,
    'pages' => true,
    'feeds' => 'galerie',
  ),
  'has_archive' => 'galerie',
  'query_var' => 'galerie',
  'supports' => 
  array (
    0 => 'title',
    1 => 'editor',
    2 => 'thumbnail',
  ),
  'taxonomies' => 
  array (
  ),
  'show_ui' => true,
  'menu_position' => 30,
  'menu_icon' => false,
  'can_export' => true,
  'show_in_nav_menus' => true,
  'show_in_menu' => true,
) );

}