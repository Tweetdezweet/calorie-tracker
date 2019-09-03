<?php
/*
Plugin Name: Calory Tracker
Plugin URI: https://koengabriels.be/calorytracker
Description: This plugin helps users track their calories
Version: 0.0.0
Author: Koen Gabriels
Author URI: https://koengabriels.be
License: GPLv2 or later
Text Domain: koga-calorytracker
*/

require_once __DIR__ . '/food-item-post-type.php';
new Food_Item_Post_Type();