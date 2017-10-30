<?php 

get_header();
?>
<div class="landscape">
	<p class="landscape-text">Rotate your screen 90&deg;</p>
</div>
<div class="menuToggleContainer">
	<i class="menuToggle fa fa-bars"></i>
</div>
<aside class="aside">
	<div class="asideWrapper">
		<div class="logoContainer">
			<img class="logo" src="<?php echo get_template_directory_uri(); ?>/library/img/mflogo.svg">
		</div>
		<div class="menuContainer">
			<ul class="menu" id="menu">
				<li class="menu-item" data-menuanchor="instagramSection">
					<a class="menu-item-link" href="#instagramSection">news</a>
					<div class="menu-item-hover"></div>
				</li>
				<li class="menu-item" data-menuanchor="videosSection">
					<a class="menu-item-link" href="#videosSection">videos</a>
					<div class="menu-item-hover"></div>
				</li>
				<li class="menu-item" data-menuanchor="contactSection">
					<a class="menu-item-link" href="#contactSection">contact</a>
					<div class="menu-item-hover"></div>
				</li>
			</ul>
		</div>
		<div class="socialContainer--mobile">
			<ul class="social">
				<li class="social-item"><a class="social-item-link" href="https://soundcloud.com/modern-future" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
				<li class="social-item"><a class="social-item-link" href="https://www.instagram.com/modern_future/" target="_blank"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="socialContainer">
		<ul class="social">
			<li class="social-item"><a class="social-item-link" href="https://soundcloud.com/modern-future" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
			<li class="social-item"><a class="social-item-link" href="https://www.instagram.com/modern_future/" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<li class="social-item"><a class="social-item-link" href="https://www.youtube.com/user/ModernFutureMusic" target="_blank"><i class="fa fa-youtube"></i></a></li>
		</ul>
	</div>	
	<a target="_blank" class="epklink" href="<?php echo site_url('/epk/'); ?>">PRESS / EPK</a>
</aside>
<main id="fullpage">
	<?php get_template_part('partials/pages/instagram_feed');?>
	<?php get_template_part('partials/pages/videos');?>
	<?php get_template_part('partials/pages/contact');?>
</main>
<?php
get_footer();

?>