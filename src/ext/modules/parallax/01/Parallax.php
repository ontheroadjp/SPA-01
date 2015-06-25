<?php
// Parallax.php

require_once( 'modules/Module.php' );
class Parallax extends Module {
	function __construct( $path ) {
		parent::__construct( $path );


		$this->doc = '';
		$this->doc .= '<div class="parallax-like">';
		$this->doc .= '<div class="overlay">';

		$this->doc .= '<div class="container">';
		$this->doc .= '<div class="row">';

		$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
		$this->doc .= '<div>';
		$this->doc .= '<strong data-type="text">'.$this->content['text01'].'</strong>';
		$this->doc .= '<p data-type="text">'.$this->content['text02'].'</p>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';
			
		$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
		$this->doc .= '<div>';
		$this->doc .= '<strong data-type="text">'.$this->content['text03'].'</strong>';
		$this->doc .= '<p data-type="text">'.$this->content['text04'].'</p>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';
			
		$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4 ">';
		$this->doc .= '<div>';
		$this->doc .= '<strong data-type="text">'.$this->content['text05'].'</strong>';
		$this->doc .= '<p data-type="text">'.$this->content['text06'].'</p>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';

		$this->doc .= '</div><!-- end of .row -->';
		$this->doc .= '</div><!-- end of .container -->';

		$this->doc .= '</div><!-- end of .overlay -->';
		$this->doc .= '</div><!-- end of .parallax-like -->';
	}
}
?>
