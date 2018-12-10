<?error_reporting(E_ALL);
ini_set('display_errors', 1);?>
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
			<ul>
				<li class="active">
					<a href="#sect1" class="link js-scroll-to">Фрезерные станки</a>
				</li>
			</ul>
		</div>
	</div>

	

	<section class="section" id="sect1">
		<div class="container">
			<div class="services-list double-items">
				
				<?
				$args = array(
				'parent' => 22,
				'hide_empty' => 0,
				'exclude' => '', 
				'number' => '0',
				'taxonomy' => 'products',
				'pad_counts' => true
				);
				$catlist = get_categories($args); ?>

			<?php foreach ($catlist as $cat) { ?>

				<div class="item">
	 				<div class="item-photo" style="background-image: url('<?php echo z_taxonomy_image_url($cat->term_id, 'post_thumb'); ?>" ></div>
					<a href="<?= esc_url(get_term_link($cat, $cat->taxonomy))?>" class="item-title link c-title"><h5 class="h5 title"><?= $cat->cat_name ?></h5></a>
					<p class="p-small"><?= $cat->category_description ?></p>
				</div>

 			<?}?>

				<!-- <div class="item">
					<div class="item-photo" style="background-image: url('img/service-img2.png');"></div>
					<a href="#" class="item-title link c-title"><h5 class="h5 title">Портальные системы</h5></a>
					<p class="p-small">Программное обеспечение RL-BEAM , разработки компании ООО «Смайтек».</p>
				</div> -->
				
			</div>
		</div>
	</section>
</main>



<?get_footer();?>