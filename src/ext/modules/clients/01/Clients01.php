<?php
// Clients.php

require_once( 'modules/Module.php' );
class Clients01 extends Module {
	function __construct( $path ) {
		parent::__construct( $path );

		// $this->doc = '';
		// $this->doc .= '<section style='.$this->css['clients'].'" id="clients">';
		// $this->doc .= '<div class="container">';

		$this->doc .= '<div class="row">';
			$this->doc .= '<div class="col-md-3">';
			$this->doc .= '<img src="img/audio.png" alt="" class="img-responsive" />';
			$this->doc .= '</div>';

			$this->doc .= '<div class="col-md-3">';
			$this->doc .= '<img src="img/codecanon.png" alt="" class="img-responsive" />';
			$this->doc .= '</div>';
			 
			$this->doc .= '<div class="col-md-3">';
			$this->doc .= '<img src="img/graphic.png" alt="" class="img-responsive" />';
			$this->doc .= '</div>';

			$this->doc .= '<div class="col-md-3">';
			$this->doc .= '<img src="img/themeforest.png" alt="" class="img-responsive" />';
			$this->doc .= '</div>';
		$this->doc .= '</div><!-- end of .row -->';
		// $this->doc .= '</div><!-- end of .container -->';
		// $this->doc .= '</section>';
	}
}
?>
