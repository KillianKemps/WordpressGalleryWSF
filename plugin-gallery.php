<?php

/*
Plugin Name: Plugin Gallery_wsf
Plugin URI: http://www.killiankemps.fr
Description:Mon plugin
Author: Killian Kemps
Version: 1.0
Author URI: http://www.killiankemps.fr
*/

//Plugin Constants
define ('WSF_PORTFOLIO_URL', plugin_dir_url(__FILE__));
define ('WSF_PORTFOLIO_DIR', plugin_dir_path(__FILE__));

//Classes
require_once( WSF_PORTFOLIO_DIR . '/inc/cpt.php');
require_once( WSF_PORTFOLIO_DIR . '/inc/fields.php');
require_once( WSF_PORTFOLIO_DIR . '/inc/shortcode.php');

new shortcode_gallery();

