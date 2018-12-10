<?/*
Template Name: Контакты
*/
?>
<?get_header('inner');?>
	<!-- Main Start -->
	<main class="main">

		<section class="section">
			<div class="container">
				<div class="contacts two-columns">
					<div class="contacts-info two-columns-col">

						<?php while( have_posts() ) : the_post();
                the_content(); 
           		 endwhile; ?>
								
					</div>

					<div class="contacts-form two-columns-col">
						<?= do_shortcode( '[ninja_form id=2]' ); ?>
					</div>

					<div class="contacts-maps two-columns">
						<div class="map two-columns-col">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d143746.71518587723!2d37.54899328200247!3d55.74604480274743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCwLCDQoNC-0YHRgdC40Y8!5e0!3m2!1sru!2sua!4v1542806783436"  frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="map two-columns-col">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90411.50429146535!2d30.215489465672892!3d59.95289374913424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696378cc74a65ed%3A0x6dc7673fab848eff!2z0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsINCg0L7RgdGB0LjRjw!5e0!3m2!1sru!2sua!4v1542806824929" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	<!-- Main End -->
<?get_footer();?>