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
				<? get_template_part( 'template-parts/menu', '' );?>
			</a>
			<div class="catalog-list">
				<span class="hamburger hamburger--collapse is-active">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</span>

				<?
					wp_nav_menu( array(
						'theme_location'  => 'link_services', 
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
				$queried_object = get_term_by('slug', 'razrabotka-po', 'services');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>

				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

				<? $text_one = get_field('text_one','products_'.$term_id);
				if($text_one ) { 
				echo $text_one;
				}?>
		

				<div class="news news-large">
					<div class="news-poster two-columns">
							<? $loop = new WP_Query(array(
		       'tax_query' => array(
		            array(
		            'taxonomy' => 'services',
		            'field' => 'slug',
		            'terms' => 'razrabotka-po'
		           	)
		        	)
		    		 )	); ?>
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
						<? endwhile; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect2">
			<div class="container">
				<?
				$queried_object = get_term_by('slug', 'nauchnaja-dejatelnost', 'services');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>

				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

				<? $text_one = get_field('text_one','products_'.$term_id);
				if($text_one ) { 
				echo $text_one;
				}?>

				<div class="news news-large">
					<div class="news-poster two-columns">
						<? $loop = new WP_Query(array(
		       'tax_query' => array(
		            array(
		            'taxonomy' => 'services',
		            'field' => 'slug',
		            'terms' => 'nauchnaja-dejatelnost'
		           	)
		        	)
		     )	); ?>
					<? while ($loop->have_posts()) : $loop->the_post(); ?>
						<div class="two-columns-col">
							<article class="article">
								<a href="#" class="article-image">
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
									<p><?the_excerpt();?></p>
									<div class="link-wrapper">
										<a href="<? the_permalink();?>" class="link c-main"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
									</div>
								</div>
							</article>
						</div>
					<? endwhile; ?>
		
					</div>
				</div>
			</div>
		</section>

		<section class="section" id="sect3">
			<div class="container">
				<?
				$queried_object = get_term_by('slug', 'solution-cat', 'solutions');
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$term_name = $queried_object->name;?>
				<h2 class="section-title h2 title c-title"><?=$term_name?></h2>

				<? $text_one = get_field('text_one','products_'.$term_id);
				if($text_one ) { 
				echo $text_one;
				}?>

				<div class="services-list">
	
						<?
						$args = array(
						'parent' => 0,
						'hide_empty' => 0,
						'exclude' => $term_id, 
						'number' => '0',
						'taxonomy' => 'solutions',
						'pad_counts' => true
						);
						$catlist = get_categories($args); ?>

					<?php foreach ($catlist as $cat) { ?>
						<div class="item">
							<div class="item-photo" style="background-image: url('<?php echo z_taxonomy_image_url($cat->term_id, 'post_thumb'); ?>" ></div>
							<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="item-title link c-title"><?= $cat->cat_name ?></h5></a>
							<p class="p-small"><?= $cat->category_description ?></p>
						</div>
					<?}?>

				</div>
			</div>
		</section>
	</main>

<?get_footer();?>