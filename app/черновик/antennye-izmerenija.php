<?/*
Template Name: Антенные измерения
*/
?>
<?get_header('inner');?>
<main class="main">
	<section class="section">
		<div class="container">
			<?php while( have_posts() ) : the_post();
        the_content(); 
    		endwhile; ?>
		</div>
	</section>
</main>
<?get_footer();?>