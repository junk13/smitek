<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <base href="/"> -->

	<title><?php bloginfo( 'description' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" href="<?= get_template_directory_uri();?>/img/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri();?>/img/favicon/apple-touch-icon-180x180.png">
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->

	<?php wp_head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
	
	<!-- Header Start -->
	<header class="header header-inner">
		<div class="container">
			<div class="topLine">
				<div class="header-mmenu">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<div class="header-logo">
					<?php
							$logo_inner = get_field('logo_inner', 'option');
							if($logo_inner) { ?>
								<a href="<?= get_home_url();?>" class="logo">
									<img src="<?= $logo_inner ?>" alt="<?php bloginfo( 'description' ); ?>">
								</a>
							<? } else { ?>
								<a href="<?= get_home_url();?>">logo</a>
							<? }
						?>
				</div>

				<div class="header-controls">
					<div class="lang">
						<ul>
							<li class="active">
								<a href="<?= network_home_url()?>" class="link"><?php esc_html_e( 'Ru', 'smitek' ); ?></a>
							</li>
							<li>
								<a href="<?= network_home_url()?>en/" class="link">Eng</a>
							</li>
						</ul>
					</div>

					<div class="search">
						<div class="search-btn">
							
							<?dynamic_sidebar('left_sidebar');?>
							<img class="btn_search" src="<?= get_template_directory_uri();?>/img/icons/ic-search.svg" class="svg">
						</div>
					</div>
				</div>
			</div>
			
			<div class="middleLine">
				<h1 class="h1 title"><?the_title();?></h1>
			</div>
		</div>
	</header>
	<!-- Header END -->