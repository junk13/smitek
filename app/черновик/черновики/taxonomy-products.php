<?get_header('taxonomy');?>
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
					<li class="active">
						<a href="#sect-info" class="link js-scroll-to">Краткое содержание</a>
					</li>
					<li class="visible-lg">
						<a href="#sect-table" class="link js-scroll-to">Табличный анализ</a>
					</li>
					<li class="hidden-lg">
						<a href="#sect-table-mobile" class="link js-scroll-to">Табличный анализ</a>
					</li>
					<li>
						<a href="#sect-photo" class="link js-scroll-to">Детальное фото</a>
					</li>
				</ul>
			</div>
		</div>



		<section class="section" id="sect-info">
			<div class="container">
				
			
					<?if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
 					<div class="example">
					 	<h5 class="h5 title"><?the_title();?></h5>
						<p class="p-small"><?the_content();?></p>
					</div>
				 	<?php endwhile; ?>
					<?php endif; ?>			
					<?the_posts_pagination( array(
						'prev_text' => '',
						'next_text' => '',
						'screen_reader_text' => ' '
					) );
				  wp_reset_query();?>

				
			</div>
		</section>
	</main>

<?get_footer();?>