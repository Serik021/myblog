<?php get_header(); ?>
	<div class="content">
		<div class="wrapper">
		<?php while( have_posts() ) : the_post(); ?>
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
		<?php endwhile ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		    <script>
		    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
		    var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
		    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
		    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
		    </script>
		<div id="load_more_gs">
		<div class="cssload-container"><div class="cssload-whirlpool"></div></div>
		</div>
		<?php endif; ?>
		</div>
		<div class="clearfix"></div>
	</div>
<?php get_footer(); ?>