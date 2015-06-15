<?php
require_once( 'modules/Module.php' );
class Location extends Module {
	function __construct( $path ) {
		parent::__construct( $path );

		$this->doc = '';
		$this->doc .= '<section id="contact">';
		$this->doc .= '<div class="container">';

		$this->doc .= '<div class="row text-center ">';
		$this->doc .= '<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">';
		$this->doc .= '<h2 class="head-set">'.$this->content['text01'].'</h2>';
		$this->doc .= '<p>'.$this->content['text02'].'</p><br />';
		$this->doc .= '</div>';
		$this->doc .= '</div>';

		$this->doc .= '<div class="row text-center">';
		$this->doc .= '<div class="col-md-12">';
		$this->doc .= '<h3>'.$this->content['text03'].'</h3>';
		$this->doc .= '<h3>'.$this->content['text04'].'</h3>';
		$this->doc .= '<h3>'.$this->content['text05'].'</h3>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';

		$this->doc .= '</div><!-- end of .container -->';
		$this->doc .= '</section>';
	}
}
?>

