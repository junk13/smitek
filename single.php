<?php
get_header('inner');
?>

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
				<div class="example">
						<?php while( have_posts() ) : the_post();
                the_content(); 
            		endwhile; ?>
				</div>

			
			</div>
		</section>
	</main>

<?php
get_footer();
