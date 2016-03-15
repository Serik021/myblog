<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
	<header>
		<div class="inside_h">
			<div class="wrapper">
				<img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="logo">
			</div>
		</div>
		<div class="container">
			<div class="wrapper">
				<div class="nav_left">
					<ul class="main-menu">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>
				<div class="nav_right">
					<ul class="main-menu">
						<li><a href="#">Category</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="under_menu">
			<p>Hello, Welcome to my Blog!</p>
			<img src="<?php echo get_template_directory_uri() ?>/images/two_line.png" alt="two_line">
		</div>
	</header>