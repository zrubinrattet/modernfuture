<?php
$Instagram = new Instagram('1007723618.ab103e5.00083918867e49d08e14bcd1076054df');
// var_dump($Instagram::$result['data']);
?>
<section class="instagramSectionContainer section" data-anchor="instagramSection">	
	<div class="instagramSectionWrapper">
		<div class="instagramSection grid">
		<?php
		$i = 1;
		foreach ($Instagram::$result['data'] as $photo) :
		    $img = $photo['images'][$Instagram::$display_size];
		    $caption = $photo['caption']['text'];
		    ?>
		    	<div class="instagramSection-photo grid-item">
		    		<?php if( array_key_exists('videos', $photo) ) : ?>
		    			<div class="instagramSection-photo-videoContainer">
		    				<video class="instagramSection-photo-video" preload="auto" loop poster="<?php echo $img['url'];?> ">
		    					<source src="<?php echo $photo['videos']['standard_resolution']['url'];?>" type="video/mp4"></source>
		    				</video>
		    				<i class="instagramSection-photo-videoButton fa fa-play"></i>
		    			</div>
	    			<?php else : ?>
			        <a href="<?php echo $img['url'] ?>" class="instagramSection-photo-link fancybox">
			            <img class="instagramSection-photo-link-image" src="<?php echo $img['url'] ?>">
			        </a>
			    	<?php endif; ?>
			        <p class="instagramSection-photo-caption">
			        	<?php echo $caption; ?>
		        	</p>
			        <p class="instagramSection-photo-date" number="<?php echo $i; ?>">
			        	<?php echo $photo['created_time']; ?>
		        	</p>
		        	<a class="instagramSection-photo-permalink" href="<?php echo $photo['link']; ?>" target="blank">Permalink</a>
		        	<p class="instagramSection-photo-likes">
		        		<?php echo '<i class="fa fa-heart"></i>&nbsp;&nbsp;' . $photo['likes']['count']; ?>
		        	</p>
		        </div>
		    <?php
		    $i++;
		endforeach;
		?>
		</div>
	</div>
</section>