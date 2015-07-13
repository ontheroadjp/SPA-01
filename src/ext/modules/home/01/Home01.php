
<?php
require_once( 'modules/Module.php' );
class Home01 extends Module {

	function __construct( $path ) {
		parent::__construct( $path );

	//	$this->doc .= '<div style='.$css_home.'id="home" class="start">';
	//	$this->doc .= '<div style='.$css_overlay.'class="overlay">';
		// $this->doc .= '<section style='.$this->css['home'].'>';
		// $this->doc .= '<div style='.$this->css['overlay'].'>';
		// $this->doc .= '<div class="container">';
		$this->doc .= '<div class="row">';
			$this->doc .= '<div class="col-md-8 col-md-offset-2 text-center">';
			$this->doc .= '<h1 style='.$this->css['h1'].' data-type="text">'.$this->content['text01'].'</h1>';
			$this->doc .= '<h2 style='.$this->css['h2'].' data-type="text">'.$this->content['text02'].'</h2>';
			$this->doc .= '<p data-type="text">'.$this->content['text03'].'</p>';
			$this->doc .= '</div><!-- / .col-md-8 col-md-offset-2 text-center -->';
		$this->doc .= '</div><!-- / .row -->';
		// $this->doc .= '</div><!-- / container -->';
		// $this->doc .= '</div><!-- / .overlay -->';
		// $this->doc .= '</section><!-- / #home -->';
		// 
	}
}
?>

