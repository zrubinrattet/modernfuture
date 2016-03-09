<?php 

class YoutubeVideo {
	public $iframe;
	function __construct($url){
		$this->iframe = '<iframe class="video" src="//www.youtube.com/embed/' . explode('?v=', $url)[1] . '" frameborder="0" allowfullscreen></iframe>';
	}
}

?>