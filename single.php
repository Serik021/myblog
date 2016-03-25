<?php get_header(); ?>
<div class="wrapper">
	<div class="post" style="border: none;">
		<div class="left_block">
			<p class="date"><?php echo get_the_date('j M'); ?></p>
		</div>
		<div class="right_block">
			<div class="top_right">
				<ul class="indi">
					<li>cat:
						<?php the_category(); ?>
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
				<p>	
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>

					<?php the_content(); ?>

					<?php endwhile; ?>
					<?php endif; ?>
				</p>
				<div class="between"></div>
				<?php the_post_thumbnail(array(800), array('class' => 'img-responsive')); ?>
				<p class="tag"><?php the_tags(); ?></p>
			</div>
		</div>
		<div class="line_bot"></div>
	<div class="clearfix"></div>	
	</div>
		<p class="count_comm"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></p>
		<p class="nextStor"><?php next_post_link('%link', 'Next Stories >'); ?></p>
	<div class="line_bot"></div>
	<?php comments_template(); ?>
</div>
<?php get_footer(); ?>