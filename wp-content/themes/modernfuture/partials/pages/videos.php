<section class="videosSectionContainer section" data-anchor="videosSection">
	<div class="videosSection">
		<?php 
			$the_query = new WP_Query(array(
				'post_type' => 'mf_videos',
				'num_posts' => -1,
			));
			if($the_query->have_posts()):
				while($the_query->have_posts()):
					$the_query->the_post();
					$video = new YoutubeVideo($post->ID);
					$video->echo_link();
				endwhile;
			endif;
		?>
	</div>
</section>