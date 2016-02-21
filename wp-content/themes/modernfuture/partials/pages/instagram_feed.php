<?php
$Instagram = new Instagram('1007723618.ab103e5.00083918867e49d08e14bcd1076054df');
// var_dump($Instagram::$result['data']);
?>
<section class="instagramSectionContainer section">
	<div class="instagramSection">
	<?php
	foreach ($Instagram::$result['data'] as $photo) {
	    $img = $photo['images'][$Instagram::$display_size];
	    $caption = $photo['caption']['text'];
	    ?>
	    	<div class="instagramSection-photo">
		        <a class="instagramSection-photo-link" href="<?php echo $photo['link']; ?>">
		            <img class="instagramSection-photo-link-image" src="<?php echo $img['url'] ?>">
		        </a>
		        <p class="instagramSection-photo-caption"><?php echo $caption; ?></p>
	        </div>
	    <?php
	}
	?>
	</div>
</section>