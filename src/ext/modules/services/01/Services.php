
<?php

require_once( 'modules/Module.php' );
class Services extends Module {
	function __construct( $path ) {
		parent::__construct( $path );

		$this->doc .= '<section id="services">';
		$this->doc .= '<div class="container">';

		$this->doc .= '<div class="row text-center pad-bottom">';
		$this->doc .= '<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">';
		$this->doc .= '<h2 class="head-set">'.$this->content['text01'].'</h2>';
		$this->doc .= '<p>'.$this->content['text02'].'</p>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';

		$this->doc .= '<div class="row text-center">';

			$this->doc .= '<div class="col-md-4 col-sm-4 col-xs-12">';
			$this->doc .= '<i class="fa fa-recycle  fa-5x"></i>';
			$this->doc .= '<h4 class="head-set">'.$this->content['text03'].'</h4>';
			$this->doc .= '<p>'.$this->content['text04'].'</p>';
			$this->doc .= '</div>';
			
			$this->doc .= '<div class="col-md-4 col-sm-4 col-xs-12">';
			$this->doc .= '<i class="fa fa-desktop  fa-5x"></i>';
			$this->doc .= '<h4 class="head-set">'.$this->content['text05'].'</h4>';
			$this->doc .= '<p>'.$this->content['text06'].'</p>';
			$this->doc .= '</div>';
			
			$this->doc .= '<div class="col-md-4 col-sm-4 col-xs-12">';
			$this->doc .= '<i class="fa fa-bolt  fa-5x"></i>';
			$this->doc .= '<h4 class="head-set">'.$this->content['text07'].'</h4>';
			$this->doc .= '<p>'.$this->content['text08'].'</p>';
			$this->doc .= '</div>';

		$this->doc .= '</div><!-- end of .row .text-center -->';

		$this->doc .= '</div><!-- end of .container -->';
		$this->doc .= '</section>';

	}
}
?>