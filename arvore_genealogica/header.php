<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>

	<meta charset="UTF-8">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php if (is_home() === true) {
			bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(' ');
								} else {
									bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('name') : wp_title(' ');
														} ?>
	</title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!-- FAVICON -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Bree&family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

	<!-- ICONES -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

	<div class="menuDesktop">

		<div class="logo">
			<img src="<?php bloginfo('template_directory'); ?>/img/logo.svg">
			<p>Árvore genealógica</p>
		</div>

		<nav>
			<a href="<?php echo home_url(); ?>">Página principal</a>
			<a href="<?php echo home_url(); ?>/contato">Contato</a>
		</nav>

	</div>