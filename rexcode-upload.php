<?php
/*
Plugin Name: Rexcode Upload
Plugin URI: http://ellasol.com/
Description: Using [rexcode], add a configurable plupload instance to WP
Version: 0.2
Author: Rex Keal
Author URI: http://ellasol.com
License: GPLv2
*/
?><?php
function plu_enqueue() {
	$plugs_dir = plugins_url().'/rexcode-uploader';
	
	wp_register_style('plup-style-ui', $plugs_dir.'/js/jquery.ui.plupload/css/jquery.ui.plupload.css');
	wp_enqueue_style('plup-style-ui');
	
	wp_register_style('jquery-style-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css');
	wp_enqueue_style('jquery-style-ui');
	
	wp_register_script('jq-min', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', array('jquery'));
	wp_enqueue_script('jq-min');

	wp_enqueue_script('plupload-all');
 
	wp_register_script('jq-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js', array('jquery'));
	wp_enqueue_script('jq-ui');     
	//LOAD ME LAST!!!! <--either calling me last or adding enqueue_script priority!!!> 
	wp_register_script('plup-ui', $plugs_dir.'/js/jquery.ui.plupload/jquery.ui.plupload.js', array('jquery'));
	wp_enqueue_script('plup-ui');
}
//load scripts before loading page
add_action( 'wp_enqueue_scripts', 'plu_enqueue' );

//shortcode display function
	function rexcode_instance (){
		$the_plug_dir = plugins_url().'/rexcode-uploader/welcome.php';
		$the_test_var = "http://theshortcode.us/wp-content/plugins/rexcode-uploader/upload.php";
		include ('rexcode-html-insert.php');
		echo $html_code;
}
//register shortcode
	add_shortcode( 'rexcode', 'rexcode_instance' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
	<title></title>
</head>

<body>
</body>
</html>
