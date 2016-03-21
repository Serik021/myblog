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

	register_nav_menus(array(
		'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
		'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
	)); 

	// ADD MINIATURE SUPPORTS
	if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

	function nav() {
	global $wp_query, $wp_rewrite;
		$pages = '';
		$max = $wp_query->max_num_pages;
		if (!$current = get_query_var('paged')) $current = 1;
		$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
		$a['total'] = $max;
		$a['current'] = $current;
		$total = 1; //1 - вывод текста "Страница N из N", 0 - не выводить
		$a['mid_size'] = 3; //количество ссылок на страницы слева и справа от текущей
		$a['end_size'] = 5; //Количество ссылок вначале и в конце
		$a['prev_text'] = '&laquo; Prev '; //отображение ссылки для предыдущей страницы
		$a['next_text'] = 'Next &raquo;'; //отображение ссылки для следующей страницы
		if ($max > 1) echo '<div class="nav">';
		if ($total = 1 && $max > 1) $pages = '<span>Page ' . $current . ' of ' . $max . '</span>'."\r\n";
			echo $pages . paginate_links($a);
		if ($max > 1) echo '</div>';
	}


 ?>