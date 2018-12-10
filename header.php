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
</head>

<body>
	
	<!-- Header Start -->
	<header class="header">
		<div class="container">
			<div class="topLine wow c-slideInDown">
				<div class="header-mmenu">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<div class="header-logo">
					<?php
							$logo = get_field('logo_main', 'option');
							if($logo) { ?>
								<a href="<?= get_home_url();?>" class="logo">
									<img src="<?= $logo ?>" alt="<?php bloginfo( 'description' ); ?>">
								</a>
							<? } else { ?>
								<a href="/">logo</a>
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

					<div class="search search_main">
						<div class="search-btn">
							<img class="btn_search" src="<?= get_template_directory_uri();?>/img/icons/ic-search.svg" class="svg">
							<?dynamic_sidebar('left_sidebar');?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="middleLine">
				<?php
				$title_site = get_field('title_site', 'option');
				$title_site2 = get_field('title_site2', 'option');?>
			
				<h1 class="h1 title t-center c-main-darken wow c-slideInUp" data-wow-delay=".3s">	
					<?if($title_site) { 
						echo $title_site;
				 	}?> 
				</h1>
				<h4 class="h4 title t-center wow c-slideInUp" data-wow-delay=".4s">
					<?if($title_site2) { 
						echo $title_site2;
				 	}?>
				</h4>
			</div>
		</div>
	</header>
	<!-- Header END -->