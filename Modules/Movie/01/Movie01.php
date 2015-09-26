<?php
// Movie.php

require_once( dirname(__FILE__).'/../../Module.php' );

class Movie01 extends Module {
	function __construct( $path ) {
		parent::__construct( $path );

		// $this->doc .= '<div class="overlay">';
		// $this->doc .= '<div class="container">';

		$this->doc .= '<div class="row text-center">';
			$this->doc .= '<div class="col-md-12">';
			$this->doc .= '<h1 data-type="text" style='.$this->css['h1'].'>'.$this->content['text01'].'</h1>';
			$this->doc .= '<h4 data-type="text">'.$this->content['text02'].'</h4>';
			$this->doc .= '<h4 data-type="text">'.$this->content['text03'].'</h4>';
			$this->doc .= '</div>';
		$this->doc .= '</div>';

		// $this->doc .= '</div><!-- end of .container -->';
		// $this->doc .= '</div><!-- end of .overlay -->';
		// $this->doc .= '</section><!-- end of #video-sec -->';
	}

	public function getPreDoc() {
		$val = '';
		$val .= '<section class="player" data-property="{videoURL:\'https://www.youtube.com/watch?v=Ycv5fNd4AeM\',containment:\'self\',autoPlay:true, mute:true, startAt:0, opacity:1,mute: true,showControls:false}" style='.$this->css[CSS_SECTION].'>';
		$val .= '<!-- change https://www.youtube.com/watch?v=Ycv5fNd4AeM to your youtube url-->';
		$val .= '<div style='.$this->css[CSS_OVERLAY].'>';
		$val .= '<div class="container">';

		return $val;
	}

}
?>
