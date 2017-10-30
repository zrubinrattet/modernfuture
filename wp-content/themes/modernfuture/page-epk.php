<?php get_header(); ?>
	<div class="epk">
		<section class="epk-hero">
			<div class="epk-hero-content">
				<h1 class="epk-hero-content-header">Press Kit</h1>
				<i class="epk-hero-content-arrow fa fa-angle-down"></i>
			</div>
			<div style="background-image: url('<?php the_field('banner', $post->ID); ?>')" class="epk-hero-bg parallax">
		</section>
		<section class="epk-bio">
			<h1 class="epk-bio-header fade fade-up">Bio</h1>
			<?php if( !empty( get_field('epk-bio', $post->ID) ) ): ?>
				<div class="epk-bio-content fade fade-up"><?php the_field('epk-bio', $post->ID) ?></div>
			<?php endif; ?>
		</section>
		<?php if( have_rows('epk-pqprojects', $post->ID) ): ?>
			<section class="epk-pqprojects">
				<div class="epk-pqprojects-grid">
					<?php while( have_rows('epk-pqprojects', $post->ID) ): the_row(); ?>
						<div class="epk-pqprojects-grid-item">
								<div class="epk-pqprojects-grid-item-headercontainer">
									<div class="epk-pqprojects-grid-item-headercontainer-headerwrapper">
										<h1 class="epk-pqprojects-grid-item-headercontainer-headerwrapper-superheader fade fade-up">press quotes</h1>
										<?php if( !empty(get_sub_field('header')) ): ?>
											<h2 class="epk-pqprojects-grid-item-headercontainer-headerwrapper-header fade fade-up"><?php the_sub_field('header'); ?></h2>
										<?php endif; ?>
										<?php if( !empty(get_sub_field('subheader')) ): ?>
											<div class="epk-pqprojects-grid-item-headercontainer-headerwrapper-subheader fade fade-up"><?php the_sub_field('subheader'); ?></div>
										<?php endif; ?>
									</div>
									<?php if( !empty(get_sub_field('image')) ): ?>
										<div class="epk-pqprojects-grid-item-headercontainer-tint"></div>
										<div class="epk-pqprojects-grid-item-headercontainer-bg" style="background-image: url('<?php the_sub_field('image') ?>');"></div>
									<?php endif; ?>
								</div>
							<?php if( have_rows('press-quotes') ): ?>
								<div class="epk-pqprojects-grid-item-quotescontainer">
									<div class="epk-pqprojects-grid-item-quotescontainer-quotes">
										<?php while( have_rows('press-quotes') ) : the_row(); ?>
											<div class="epk-pqprojects-grid-item-quotescontainer-quotes-quote fade fade-up">
												<?php if( !empty(get_sub_field('quote')) ): ?>
													<div class="epk-pqprojects-grid-item-quotescontainer-quotes-quote-content">"<?php the_sub_field('quote') ?>"</div>
												<?php endif; ?>
												<?php if( !empty(get_sub_field('publication')) && !empty(get_sub_field('url')) ): ?>
													<a target="_blank" href="<?php the_sub_field('url') ?>" class="epk-pqprojects-grid-item-quotescontainer-quotes-quote-link"><?php the_sub_field('publication') ?></a>
												<?php endif; ?>
											</div>
										<?php endwhile; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif; ?>
		<?php 
			render_genlinks('epk-presslinks', 'Press Links', $post); 
			render_genlinks('epk-musiclinks', 'Music Links', $post); 
		?>
		<?php if( have_rows('epk-videolinks', $post->ID) ): ?>
			<section class="epk-videolinks">
				<h1 class="epk-videolinks-header fade fade-up">Video Links</h1>
				<div class="epk-videolinks-grid">
					<?php while( have_rows('epk-videolinks', $post->ID) ): the_row(); ?>
						<div class="epk-videolinks-grid-item fade fade-up">
							<?php if( !empty(get_sub_field('link')) ): ?>
								<?php the_sub_field('link') ?>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif; ?>
		<?php render_genlinks('epk-otherlinks', 'Other Links', $post); ?>
		<?php if( get_field('epk-photos', $post->ID) ): ?>
			<section class="epk-photos">
				<h1 class="epk-photos-header fade fade-up">Photos</h1>
				<div class="epk-photos-grid">
					<?php foreach( get_field('epk-photos', $post->ID) as $image ): ?>
						<a target="_blank" href="<?php echo $image['sizes']['large']; ?>" class="epk-photos-grid-photo fade fade-up" style="background-image: url('<?php echo $image['sizes']['medium']; ?>');">
							<div class="epk-photos-grid-photo-tint"></div>
						</a>
					<?php endforeach; ?>
				</div>
				<?php if( !empty(get_field('epk-logos', $post->ID)) ): ?>
					<a href="<?php echo get_field('epk-logos', $post->ID)['url']; ?>" class="epk-photos-logos fade fade-up">Get logos</a>
				<?php endif; ?>
			</section>
		<?php endif; ?>
		<?php if( !empty(get_field('epk-contactinfo', $post->ID)) ): ?>
			<section class="epk-contactinfo">
				<h1 class="epk-contactinfo-header fade fade-up">Contact</h1>
				<div class="epk-contactinfo-content fade fade-up"><?php the_field('epk-contactinfo', $post->ID); ?></div>
			</section>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>