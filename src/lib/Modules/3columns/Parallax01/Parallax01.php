<?php
// Parallax01.php

require_once( dirname(__FILE__).'/../../Module.php' );
class Parallax01 extends Module {
	function __construct( $path ) {
		parent::__construct( $path );

		// $this->doc = '';
		// $this->doc .= '<section class="parallax-like">';
		// $this->doc .= '<div class="overlay">';
		// $this->doc .= '<div class="container">';

		$this->doc .= '<div class="row">';

			$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
			$this->doc .= '<p style='.$this->css['p'].' class="text-center" data-type="text">'.$this->content['text01'].'</p>';
			$this->doc .= '</div>';

			$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
			$this->doc .= '<p style='.$this->css['p'].' class="text-center" data-type="text">'.$this->content['text02'].'</p>';
			$this->doc .= '</div>';

			$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4 ">';
			$this->doc .= '<p style='.$this->css['p'].' class="text-center" data-type="text">'.$this->content['text03'].'</p>';
			$this->doc .= '</div>';

		$this->doc .= '</div><!-- / .row -->';
		$this->doc .= '<div class="row">';

			$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
			$this->doc .= '<p style='.$this->css['p'].' class="text-center" data-type="text">'.$this->content['text04'].'</p>';
			$this->doc .= '</div>';

			$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
			$this->doc .= '<p style='.$this->css['p'].' class="text-center" data-type="text">'.$this->content['text05'].'</p>';
			$this->doc .= '</div>';

			$this->doc .= '<div class="col-lg-4 col-md-4 col-sm-4 ">';
			$this->doc .= '<p style='.$this->css['p'].' class="text-center" data-type="text">'.$this->content['text06'].'</p>';
			$this->doc .= '</div>';

		$this->doc .= '</div><!-- / .row -->';

		// $this->doc .= '</div><!-- / .container -->';
		// $this->doc .= '</div><!-- / .overlay -->';
		// $this->doc .= '</seiction><!-- / .parallax-like -->';
	}
}



?>

