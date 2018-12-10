<?/*
Template Name: О компании
*/
?>
<?get_header('inner');?>

	<!-- Main Start -->
	<main class="main">
		<div class="catalog">
			<a href="#" class="catalog-btn">
				<span class="hamburger hamburger--collapse">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</span>
				<span class="catalog-btn-text">Каталог</span>
			</a>
			<div class="catalog-list">
				<span class="hamburger hamburger--collapse is-active">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</span>
				<ul>
					<li class="active js-scroll-to">
						<a href="#about" class="link"><?the_title();?></a>
					</li>
				</ul>
			</div>
		</div>

		<section class="section" id="about">
			<div class="container">
				<article class="article article-full">

					<?php while( have_posts() ) : the_post();
                the_content(); 
           		 endwhile; ?>
				</article>
			</div>
		</section>
	</main>
	
	<!-- Main End -->
<?get_footer();?>