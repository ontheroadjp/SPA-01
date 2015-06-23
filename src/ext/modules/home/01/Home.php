
<?php
$prefix = 'home01';	// 使ってない

require_once( 'modules/Module.php' );
class Home extends Module {
	function __construct( $path ) {
		parent::__construct( $path );


		$this->doc .= '<div id="home" class="start">';
		$this->doc .= '<div class="overlay">';

		$this->doc .= '<div class="l-container">';
		$this->doc .= '<div class="col-md-8 col-md-offset-2 text-center">';
		$this->doc .= '<h1 class="'.$prefix.'_text01">'.$this->content['text01'].'</h1>';
		$this->doc .= '<h2 class="'.$prefix.'_text02">'.$this->content['text02'].'</h2>';
		$this->doc .= '<p  class="'.$prefix.'_text03 p-cls">'.$this->content['text03'].'</p>';
		$this->doc .= '</div><!-- end of .col-md-8 col-md-offset-2 text-center -->';
		$this->doc .= '</div><!-- end of container -->';

		$this->doc .= '</div><!-- end of .overlay -->';
		$this->doc .= '</div><!-- end of #home -->';
	

	}
}
?>

