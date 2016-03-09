<?php 

class YoutubeVideo {
	public $link;
	private $url;
	private $image;
	private $title;
	function __construct($ID){
		$this->url   = get_field('url', $ID);
		$this->image = get_field('placeholder', $ID);
		$this->title = get_the_title($ID);
		$this->link  = '<div class="video"><h2 class="video-title">' . $this->title . '</h2><a class="video-link" href="' . $this->url . '" target="_blank"><img class="video-link-img" src="' . $this->image . '"/><i class="fa fa-play video-link-icon"></i></a></div>';
	}
	public function echo_link(){
		echo $this->link;
	}
}

?>