<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name') ?><?php wp_title('|') ?></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
	<header>
		<div class="inside_h">
			<div class="wrapper">
				<a href="\"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="logo"></a>
			</div>
		</div>
		<div class="container">
			<div class="wrapper">
				<div class="nav_left main-menu">
					<?php wp_nav_menu( array(
												'menu_class'=>'menu',
						    					'theme_location'=>'top',
						    					'exclude' => 112
											) 
									);
					?>
				</div>
				<div class="nav_right main-menu">
					<?php wp_nav_menu( array(
												'menu_class'=>'menu',
						    					'theme_location'=>'bottom'
											) 
									);
					?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="under_menu">
			<p>Hello, Welcome to my Blog!</p>
			<img src="<?php echo get_template_directory_uri() ?>/images/two_line.png" alt="two_line">
		</div>
	</header>