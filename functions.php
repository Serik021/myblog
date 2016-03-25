<?php
	// ENQUEUE STYLES

	function my_theme_load_resources() {
	    wp_enqueue_style('my_theme_style', get_template_directory_uri() . '/style.css');
	}
	add_action('wp_enqueue_scripts', 'my_theme_load_resources');

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

	function true_load_posts(){
	    $args = unserialize(stripslashes($_POST['query']));
	    $args['paged'] = $_POST['page'] + 1; // следующая страница
	    $args['post_status'] = 'publish';
	    $q = new WP_Query($args);
	    if( $q->have_posts() ):
	        while($q->have_posts()): $q->the_post(); 
	?>
	<div class="post">
		<div class="left_block">
			<p class="date"><?php echo get_the_date('j M'); ?></p>
		</div>
		<div class="right_block">
			<div class="top_right">
				<ul class="indi">
					<!-- <li>cat: <span>Diary , Personal</span></li> -->
					<li>cat:
						<?php the_category(', '); ?>
					</li>
					<li><img src="<?php echo get_template_directory_uri() ?>/images/sideline.jpg" alt="sideline" class="sideline"></li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/images/heart.png" alt="heart">
						136 Likes
					</li>
					<li><img src="<?php echo get_template_directory_uri() ?>/images/sideline.jpg" alt="sideline" class="sideline"></li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/images/comment.png" alt="comment">
						21 Comments
					</li>
				</ul>
			</div>
			<div class="bottom_right">
				<h1><a href="<?php the_permalink(); ?>" class="tit"><?php the_title(); ?></a></h1>
				<?php the_post_thumbnail(array(350), array('class' => 'thumb_left img-responsive')); ?>
				<p>	
					<?php the_content(''); ?>
				</p>
				<a href="<?php the_permalink(); ?>">Read More</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php
	endwhile; endif;
	    wp_reset_postdata();
	    die();
	}
	add_action('wp_ajax_loadmore', 'true_load_posts');
	add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
 ?>