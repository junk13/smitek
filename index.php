<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smitek
 */

get_header();
?>

	<!-- Main Start -->
	<main class="main">
		<div class="services-list full-screen wow fadeIn" data-wow-delay="1s">
			

				<?$plitka = get_field('plitka');
				if($plitka) {
					echo $plitka ;
				} ?>

		</div>
		
		<section class="section">
			<div class="container">
				<div class="about">
					
					<?php while( have_posts() ) : the_post();
            the_content(); 
       		 endwhile; ?>

				</div>
			</div>

			<div class="news">
				<div class="container">
					<div class="news-column">
						<?$posts = get_posts( array(
							'numberposts' => 3, 
							'category'    => 0,
							'orderby'     => 'date',
							'order'       => 'DESC',
							'include'     => array(),
							'exclude'     => array(),
							'meta_key'    => '',
							'meta_value'  =>'',
							'post_type'   => 'news',
							'suppress_filters' => true, запроса
						) );

						foreach( $posts as $post ){
							setup_postdata($post);
						?>
						<article class="article">
							<header>
								<time class="article-date" datetime="2015-09-30T15:25:55" pubdate><?the_time('d.m.Y');?></time>
								<a href="<? the_permalink();?>" class="article-title link c-title">
									<h5 class="h5 title"><?the_title();?></h5>
								</a>
							</header>
							<p class="pre-line"><?the_excerpt();?></p>
						</article>
						<?}?>

						<?wp_reset_postdata(); ?>
			
					</div>
				</div>
			</div>
		</section>
	</main>
	<!-- Main End -->

<?php
get_footer();
