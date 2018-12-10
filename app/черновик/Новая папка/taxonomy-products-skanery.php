<?get_header('taxonomy');?>

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

				<? $paren_id = get_queried_object()->term_id;?>
				<?
				$args = array(
				'parent' => $paren_id,
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

	</main>
	
	<!-- Main End -->
<?php unset($text_one);?>
<?get_footer();?>