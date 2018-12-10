	<!-- Footer Start -->
	<footer class="footer">
		<div class="container">
			<div class="topLine">
				<div class="footer-logo">
					<?php
							$logo = get_field('logo_main', 'option');
							if($logo) { ?>
								<a href="/" class="logo">
									<img src="<?= $logo ?>" alt="<?php bloginfo( 'description' ); ?>">
								</a>
							<? } else { ?>
								<a href="/">logo</a>
							<? }
						?>
				</div>

				<nav class="footer-nav">
					<?
					wp_nav_menu( array(
						'theme_location'  => 'bottom', 
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
				</nav>

				<div class="footer-callback">
					<div class="link-wrapper">
						<?php
							$phone_number = get_field('phone_number', 'option');
							if($phone_number) { ?>
								<a href="tel:<?= $phone_number ?>" class="link c-title"><?= $phone_number ?></a>
							<? } ?>
						
					</div>
					<div class="link-wrapper">
						<a href="#" class="link c-main"><?php esc_html_e( 'Get the consultation', 'smitek' ); ?></a>
					</div>
				</div>
			</div>
			<div class="bottomLine p-small">
				<div class="footer-logo">
					<?php
							$logo = get_field('logo_main', 'option');
							if($logo) { ?>
								<a href="/" class="logo">
									<img src="<?= $logo ?>" alt="<?php bloginfo( 'description' ); ?>">
								</a>
							<? } else { ?>
								<a href="/">logo</a>
							<? }
						?>
				</div>
				<div class="footer-copyright">
						<?php
					$policy = get_field('policy', 'option');
					if($policy) { ?>
						<?= $policy ?>
					<? } ?>
					
				</div>

				<div class="footer-partners">
					<div class="footer-partners-title c-subtitle"><?php esc_html_e( 'Our partners:', 'smitek' ); ?></div>
				
					<div class="footer-partners-logos">
						<?$parnter = get_field('parnter', 'option');?>
						<?php foreach ( $parnter  as $key => $value ) { ?>
							<a href="<?= $value['parnter_link']?>"><img src="<?= $value['parnter_logo']?>" alt="<?= $value['parnter_name']?>"></a>
						<?}?>
					</div>

				</div>
			</div>
		</div>
	</footer>
	<!-- Footer End -->

	<!-- Mmenu Start -->
	<nav class="mmenu">
		<div class="mmenu-controls">
			<div class="lang">
				<ul>
					<li class="active">
						<a href="<?= network_home_url()?>" class="link">Рус</a>
					</li>
					<li>
						<a href="<?= network_home_url()?>en/" class="link">Eng</a>
					</li>
				</ul>
			</div>

			<div class="mmenu-toggle">
				<button class="hamburger hamburger--collapse is-active" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
		
		<div class="scroll-wrapper">
			<?
					wp_nav_menu( array(
						'theme_location'  => 'top', 
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
						'items_wrap'      => '<ul class="mmenu-list p-small">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					) );
				?>

			
			<div class="mmenu-search">
				<form action="#" class="form">
					<label class="form-group">
						<input type="text" class="form-control" placeholder="Поиск ...">
					</label>
					<label class="form-btn">
						<input type="submit">
						<img src="<?= get_template_directory_uri();?>/img/icons/ic-search.svg" class="svg">
					</label>
				</form>
				<!-- <img src="<?= get_template_directory_uri();?>/img/icons/ic-search.svg" class="svg">
				<?dynamic_sidebar('left_sidebar');?> -->
			</div>
		</div>
	</nav>
	<div class="body-shadow"></div>
	<!-- Mmenu End -->

	<?php wp_footer(); ?>

</body>
</html>