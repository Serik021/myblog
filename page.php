<?php get_header(); ?>
<style>
	.under_menu {
		display: none;
	}
	.container {
		margin-bottom: 40px;
	}
</style>
<div class="wrapper">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

	<?php the_content(); ?>

	<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>