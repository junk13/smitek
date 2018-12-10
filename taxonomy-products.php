<?get_header('taxonomy');?>



<main class="main">
	<? $current_id = get_queried_object()->term_id;
	$paren_id = wp_get_term_taxonomy_parent_id( $current_id, 'products' );
	?>
	<? if ($paren_id != 0 ) {?>
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
				$args = array(
				'parent' => $paren_id,
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
	<?}?>

		<section class="section" id="sect-info">
			<div class="container">
	
					<?if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
					<div>
					 	<h5 class="h5 title"><?the_title();?></h5>
						<p class="p-small"><?the_excerpt();?></p>
						<a class="link_blue" href="<? the_permalink();?>"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
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