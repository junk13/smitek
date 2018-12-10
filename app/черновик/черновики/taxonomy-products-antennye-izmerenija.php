<?/*
Template Name: Антенные измерения
*/
?>
<?get_header('taxonomy');?>

	<!-- Main Start -->
	<main class="main">
		<?$ID_page = get_the_ID(); ?>
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
				<?
					wp_nav_menu( array(
						'theme_location'  => 'link', 
						'menu'            => '', 
						'container'       => '', 
						'container_class' => '', 
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '', 
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul>%3$s</ul>',
						'depth'           => 1,
						'walker'          => '',
					) );
				?>
			</div>
		</div>

		<section class="section" id="sect1">
			<div class="container">
				<h2 class="section-title h2 title c-title">Устройства позицинирования</h2>

			<? $text_one = get_field('text_one',products_2);
			if($text_one ) { 
			echo $text_one;
			}?>



				<div class="news">
					<div class="news-poster two-columns">

					<? $loop = new WP_Query(array(
			       'tax_query' => array(
			            array(
			            'taxonomy' => 'products',
			            'field' => 'slug',
			            'terms' => 'ustrojstva-pozicionirovanija'
			           )
			        )
			     )); ?>
					<? while ($loop->have_posts()) : $loop->the_post(); ?>
				
					<div class="two-columns-col">

						<article class="article">
							<a href="<? the_permalink();?>" class="article-image">
								<?
									$photo_product = get_field('photo_product');
									if($photo_product ) { ?>
										<img src="<?= $photo_product ?>" alt="<?= $photo_product ?>">
									<? } ?>
							</a>
							<div class="article-content">
								<div class="title">
									<a href="<? the_permalink();?>" class="link">
										<h6 class="h6">	<?the_title();?></h6>
									</a>
								</div>
								<p><?the_content();?></p>
								<div class="link-wrapper">
									<a href="<? the_permalink();?>" class="link c-main">Подробнее</a>
								</div>
							</div>
						</article>
					</div>
					<? endwhile; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect2">
			<div class="container">
				<h2 class="section-title h2 title c-title">Системы ближнего поля</h2>

			<? $text2 = get_field('text2', $ID_page);
			if($text2 ) { 
			echo $text2;
			} ?>
				

				<div class="news">
					<div class="news-poster two-columns">
						<?php
					   $loop = new WP_Query(array(
					       'tax_query' => array(
					            array(
					            'taxonomy' => 'products',
					            'field' => 'slug',
					            'terms' => 'sistemy-blizhnego-boja'
					           )
					        )
					     )); ?>
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
						<div class="two-columns-col">
							<article class="article">
								<a href="<? the_permalink();?>" class="article-image">
									<?
									$photo_product = get_field('photo_product');
									if($photo_product ) { ?>
										<img src="<?= $photo_product ?>" alt="<?= $photo_product ?>">
									<? } ?>
								</a>
								<div class="article-content">
									<div class="title">
										<a href="<? the_permalink();?>" class="link">
											<h6 class="h6"><?the_title();?></h6>
										</a>
									</div>
									<p><?the_content();?></p>
									<div class="link-wrapper">
										<a href="<? the_permalink();?>" class="link c-main">Подробнее</a>
									</div>
								</div>
							</article>
						</div>
						<?php endwhile; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect3">
			<div class="container">
				<h2 class="section-title h2 title c-title">Коллиматорные комплексы</h2>
				<?php
			   $loop = new WP_Query(array(
			       'tax_query' => array(
			            array(
			            'taxonomy' => 'products',
			            'field' => 'slug',
			            'terms' => 'kollimatornye-kompleksy'
			           )
			        )
			     )); ?>
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
				<div class="news">
					<div class="news-poster">
						<article class="article">
							<a href="<? the_permalink();?>" class="article-image">
								<?
									$photo_product = get_field('photo_product');
									if($photo_product ) { ?>
										<img src="<?= $photo_product ?>" alt="<?= $photo_product ?>">
								<? } ?>
							</a>
							<div class="article-content">
								<div class="title">
									<a href="#" class="link">
										<h6 class="h6"><?the_title();?></h6>
									</a>
								</div>
								<p><?the_content();?></p>
								<div class="link-wrapper">
									<a href="<? the_permalink();?>" class="link c-main">Подробнее</a>
								</div>
							</div>
						</article>
					</div>
					<?php endwhile; ?>

				</div>
			</div>
		</section>

		<section class="section" id="sect4">
			<div class="container">
				<h2 class="section-title h2 title c-title">Программное обеспечение</h2>

				<div class="news news-large">
					<div class="news-poster two-columns">
						<?php
					   $loop = new WP_Query(array(
					       'tax_query' => array(
					            array(
					            'taxonomy' => 'products',
					            'field' => 'slug',
					            'terms' => 'programmnoe-obespechenie'
					           )
					        )
					     )); ?>
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
						<div class="two-columns-col">
							<article class="article">
								<a href="<? the_permalink();?>" class="article-image">
									<?
									$photo_product = get_field('photo_product');
									if($photo_product ) { ?>
										<img src="<?= $photo_product ?>" alt="<?= $photo_product ?>">
								<? } ?>
								</a>
								<div class="article-content">
									<div class="title">
										<a href="#" class="link">
											<h6 class="h6"><?the_title();?></h6>
										</a>
									</div>
									<p><?the_content();?></p>
									<div class="link-wrapper">
										<a href="<? the_permalink();?>" class="link c-main">Подробнее</a>
									</div>
								</div>
							</article>
						</div>
						<?php endwhile; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect5">
			<div class="container">
				<h2 class="section-title h2 title c-title">Комплексы под ключ</h2>

				<div class="news news-large">
					<div class="news-poster two-columns">
						<?php
					   $loop = new WP_Query(array(
					       'tax_query' => array(
					            array(
					            'taxonomy' => 'products',
					            'field' => 'slug',
					            'terms' => 'kompleksy-pod-kljuch'
					           )
					        )
					     )); ?>
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
						<div class="two-columns-col">
							<article class="article">
								<a href="<? the_permalink();?>" class="article-image">
									<?
									$photo_product = get_field('photo_product');
									if($photo_product ) { ?>
										<img src="<?= $photo_product ?>" alt="<?= $photo_product ?>">
									<? } ?>
								</a>
								<div class="article-content">
									<div class="title">
										<a href="#" class="link">
											<h6 class="h6"><?the_title();?></h6>
										</a>
									</div>
									<p><?the_content();?></p>
									<div class="link-wrapper">
										<a href="<? the_permalink();?>" class="link c-main">Подробнее</a>
									</div>
								</div>
							</article>
						</div>
						<?php endwhile; ?>
						

					</div>
				</div>
			</div>
		</section>
	</main>
	
	<!-- Main End -->
<?php unset($text_one);?>
<?get_footer();?>