<?php
$Instagram = new Instagram('1007723618.ab103e5.00083918867e49d08e14bcd1076054df');
// var_dump($Instagram::$result['data']);
?>
<section class="instagramSectionContainer section">	
	<div class="instagramSection grid">
	<?php
	$i = 1;
	foreach ($Instagram::$result['data'] as $photo) :
	    $img = $photo['images'][$Instagram::$display_size];
	    $caption = $photo['caption']['text'];
	    ?>
	    	<div class="instagramSection-photo grid-item">
		        <a class="instagramSection-photo-link" href="<?php echo $photo['link']; ?>">
		            <img class="instagramSection-photo-link-image" src="<?php echo $img['url'] ?>">
		        </a>
		        <p class="instagramSection-photo-date" number="<?php echo $i; ?>">
		        	<?php echo $photo['created_time']; ?>
	        	</p>
	        	<p class="instagramSection-photo-likes">
	        		<?php echo 'Likes: ' . $photo['likes']['count']; ?>
	        	</p>
		        <p class="instagramSection-photo-caption"><?php echo $caption; ?></p>
	        </div>
	    <?php
	    $i++;
	endforeach;
	?>
	</div>
</section>