<?/*
Template Name: Новости
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
						<a href="#sect1" class="link"><?the_title();?></a>
					</li>
				</ul>
			</div>
		</div>

		<section class="section" id="sect1">
			<div class="container">
				<div class="news news-page">
					<div class="news-poster">
						
						<?
							
						$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$offset = ($page-1)*3;

						$args = array( 
							'posts_per_page' => 3,
							'paged'=> $page,
							'post_type' => 'news',
							'offset' => $offset
						);

						query_posts($args);
						$current_page = $page; 
              
            while ( have_posts() ) : the_post(); ?>

						<article class="article">
							<a href="#" class="article-image">
								<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="News Alt">
							</a>

							<div class="article-content">
								<header>
									<time class="article-date" pubdate><?the_time('d.m.Y');?></time>

									<div class="title">
										<a href="<? the_permalink();?>" class="link">
											<h5 class="h5"><?the_title();?></h5>
										</a>
									</div>
								</header>

								<p><?the_excerpt();?> </p>

								<footer>
									<div class="link-wrapper">
										<a href="<? the_permalink();?>" class="link c-main"><?php esc_html_e( 'Read more', 'smitek' ); ?></a>
									</div>
								</footer>
							</div>
						</article>

						 <? endwhile;?>
					</div>
					<? $urlsvg = get_template_directory_uri();?>
					
					<?the_posts_pagination( array(
							'prev_text' => __('<img src="'. $urlsvg .'/img/icons/ic-angle-left.svg" class="svg">
									<span>Предыдущая</span>'),
							'next_text' => __('<span>Следущая</span>
									<img src="'. $urlsvg .'/img/icons/ic-angle-right.svg" class="svg">'),
							'prev_next'    => true,
							'screen_reader_text' => ' ',
							'current'      => $current_page
						) );
            wp_reset_query();?>


				</div>

				
			</div>
		</section>
	</main>
	
	<!-- Main End -->
<?get_footer();?>