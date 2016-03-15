<?php 
	// ENQUEUE STYLES

	function my_theme_load_resources() {
	    wp_enqueue_style('my_theme_style', get_template_directory_uri() . '/style.css');
	}
	add_action('wp_enqueue_scripts', 'my_theme_load_resources');

	// ENQUEUE SCRIPTS
	     
	function enqueue_scripts() {
	     
	    /** REGISTER HTML5 Shim **/
	    wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1', false );
	    wp_enqueue_script( 'html5-shim' );
	         
	    /** REGISTER HTML5 OtherScript.js **/
	    wp_register_script( 'custom-script', THEME_DIR . '/js_path/customscript.js', array( 'jquery' ), '1', false );
	    wp_enqueue_script( 'custom-script' );
	         
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
 ?>

