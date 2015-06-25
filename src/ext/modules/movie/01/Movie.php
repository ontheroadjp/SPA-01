<?php
// Movie.php

require_once( 'modules/Module.php' );
class Movie extends Module {
	function __construct( $path ) {
		parent::__construct( $path );

		$this->doc = '';
		$this->doc .= '<div id="video-sec" class="player" data-property="{videoURL:\'https://www.youtube.com/watch?v=Ycv5fNd4AeM\',containment:\'self\',autoPlay:true, mute:true, startAt:0, opacity:1,mute: true,showControls:false}">';
		$this->doc .= '<!-- change https://www.youtube.com/watch?v=Ycv5fNd4AeM to your youtube url-->';

		$this->doc .= '<div class="overlay">';
		$this->doc .= '<div class="container">';
		$this->doc .= '<div class="row text-center">';
		$this->doc .= '<div class="col-md-12">';
		$this->doc .= '<h1 data-type="text">'.$this->content['text01'].'</h1>';
		$this->doc .= '<h4 data-type="text">'.$this->content['text02'].'</h4>';
		$this->doc .= '<h4 data-type="text">'.$this->content['text03'].'</h4>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';
		$this->doc .= '</div><!-- end of .container -->';
		$this->doc .= '</div><!-- end of .overlay -->';

		$this->doc .= '</div><!-- end of #video-sec -->';
	}
}
?>
