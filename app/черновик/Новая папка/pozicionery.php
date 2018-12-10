<?/*
Template Name: Позиционеры
*/
?>
<?get_header('inner');?>
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
				<!-- <?
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
				?> -->
				<? $paren_id = get_queried_object()->term_id;?>
				<?
				$args = array(
				'parent' => 41,
				'hide_empty' => 0,
				'exclude' => '', 
				'number' => '0',
				'taxonomy' => 'products',
				'pad_counts' => true
				);
				$catlist = get_categories($args); ?>

				<ul>
					<?php foreach ($catlist as $cat) { ?>
						<li>
							<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link js-scroll-to"><?= $cat->cat_name ?></a>
						</li>
					<?}?>
				</ul>

			</div>
		</div>

		<section class="section" id="sect1">
			<div class="container">
				<?
				$queried_object = get_term_by('slug', 'pozicionery', 'products');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>

				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

			<? $text_one = get_field('text_one','products_'.$term_id);
			if($text_one ) { 
			echo $text_one;
			}?>



				<div class="news">
					<div class="news-poster two-columns">

				<? $paren_id = get_queried_object()->term_id;?>
				<?
				$args = array(
				'parent' => 41,
				'hide_empty' => 0,
				'exclude' => '', 
				'number' => '0',
				'taxonomy' => 'products',
				'pad_counts' => true
				);
				$catlist = get_categories($args); ?>

			<?php foreach ($catlist as $cat) { ?>
				<div class="two-columns-col">
						<article class="article">
							<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="article-image">
								<img src="<?php echo z_taxonomy_image_url($cat->term_id, 'post_thumb'); ?>" alt="<?= $photo_product ?>">
							</a>
							<div class="article-content">
								<div class="title">
									<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link">
										<h6 class="h6">	<?= $cat->cat_name ?></h6>
									</a>
								</div>
								<p><?= $cat->category_description ?></p>
								<div class="link-wrapper">
									<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link c-main"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
								</div>
							</div>
						</article>
					</div>

 					<?}?>

					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect2">
			<div class="container">
					<?
				$queried_object = get_term_by('slug', 'skanery', 'products');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>

				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

			<? $text_one = get_field('text_one','products_'.$term_id);
			if($text_one ) { 
			echo $text_one;
			}?>



				<div class="news">
					<div class="news-poster two-columns">

				<?
				$args = array(
				'parent' => 46,
				'hide_empty' => 0,
				'exclude' => '', 
				'number' => '0',
				'taxonomy' => 'products',
				'pad_counts' => true
				);
				$catlist = get_categories($args); ?>

			<?php foreach ($catlist as $cat) { ?>
				<div class="two-columns-col">
						<article class="article">
							<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="article-image">
								<img src="<?php echo z_taxonomy_image_url($cat->term_id, 'post_thumb'); ?>" alt="<?= $photo_product ?>">
							</a>
							<div class="article-content">
								<div class="title">
									<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link">
										<h6 class="h6">	<?= $cat->cat_name ?></h6>
									</a>
								</div>
								<p><?= $cat->category_description ?></p>
								<div class="link-wrapper">
									<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link c-main"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
								</div>
							</div>
						</article>
					</div>

 					<?}?>

					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect3">
			<div class="container">
				<?
				$queried_object = get_term_by('slug', 'kollimatory', 'products');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>

				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

			<? $text_one = get_field('text_one','products_'.$term_id);
			if($text_one ) { 
			echo $text_one;
			}?>



				<div class="news">
					<div class="news-poster">

				<?
				$args = array(
				'parent' => 57,
				'hide_empty' => 0,
				'exclude' => '', 
				'number' => '0',
				'taxonomy' => 'products',
				'pad_counts' => true
				);
				$catlist = get_categories($args); ?>

			<?php foreach ($catlist as $cat) { ?>
				
						<article class="article">
							<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="article-image">
								<img src="<?php echo z_taxonomy_image_url($cat->term_id, 'post_thumb'); ?>" alt="<?= $photo_product ?>">
							</a>
							<div class="article-content">
								<div class="title">
									<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link">
										<h6 class="h6">	<?= $cat->cat_name ?></h6>
									</a>
								</div>
								<p><?= $cat->category_description ?></p>
								<div class="link-wrapper">
									<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="link c-main"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
								</div>
							</div>
						</article>
				

 					<?}?>

				</div>
			</div>
		</section>

		<section class="section" id="sect4">
			<div class="container">
				<?
				$queried_object = get_term_by('slug', 'programmnoe-obespechenie', 'products');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>
				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

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
									<p><?the_excerpt();?></p>
									<div class="link-wrapper">
										<a href="<? the_permalink();?>" class="link c-main"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
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
<?get_footer();?>