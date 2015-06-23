
<?php
require_once( 'modules/Module.php' );
class Portfolio extends Module {
	function __construct( $path ) {
		parent::__construct( $path );


		$this->doc = '';
		$this->doc .= '<section id="works">';
		$this->doc .= '<div class="container">';

		$this->doc .= '<div class="row text-center pad-bottom">';
		$this->doc .= '<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">';
		$this->doc .= '<h2 class="head-set">'.$this->content['text01'].'</h2>';
		$this->doc .= '<p>'.$this->content['text02'].'</p>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';

		$this->doc .= '<div class="row text-center portfolio-item">';

		$this->doc .= '<div class="col-md-4 col-sm-4 ">';
		$this->doc .= '<div class="alert alert-info">';
		$this->doc .= '<img src="img/1.jpg" class="img-responsive " alt="" />';
		$this->doc .= '<h3>'.$this->content['text03'].'</h3>';
		$this->doc .= '<h5>'.$this->content['text04'].'</h5>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';
			
		$this->doc .= '<div class="col-md-4 col-sm-4 ">';
		$this->doc .= '<div class="alert alert-danger">';
		$this->doc .= '<img src="img/2.jpg" class="img-responsive " alt="" />';
		$this->doc .= '<h3>'.$this->content['text05'].'</h3>';
		$this->doc .= '<h5>'.$this->content['text06'].'</h5>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';
			
		$this->doc .= '<div class="col-md-4 col-sm-4 ">';
		$this->doc .= '<div class="alert alert-success">';
		$this->doc .= '<img src="img/3.jpg" class="img-responsive " alt="" />';
		$this->doc .= '<h3>'.$this->content['text07'].'</h3>';
		$this->doc .= '<h5>'.$this->content['text08'].'</h5>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';

		$this->doc .= '</div><!-- end of .row text-center portfolio-item -->';
		$this->doc .= '</div><!-- end of .container -->';
		$this->doc .= '</section>';
	}
}
?>