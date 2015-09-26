<?php
// テキストフィールドの作成
// $this->doc .= '<h2 class="head-set" data-type="text">'.$this->content['text01'].'</h2>';

// テキストエリアの作成
// $this->doc .= '<p data-type="textarea" data-rows="3" data-textAlign="center">'.$this->content[text02'].'</p>';

// CSS の適用
//$this->doc .= '<h2 style='.$this->css['h2'].' data-type="text">'.$this->content['text02'].'</h2>';
?>

<?php
require_once( dirname(__FILE__).'/../../Module.php' );

class Location02 extends Module {

	function __construct( $path ) {
		parent::__construct( $path );

	// <section id="'.$this->id.'" style='.$this->css[CSS_SECTION].'>
	// <div style='.$this->css[CSS_OVERLAY].'>
	// <div class="container">
	$this->doc .= '<div class="row">';
	    $this->doc .= '<div class="col-sm-8 col-sm-offset-2 text-center">';
	        $this->doc .= '<h2 style='.$this->css['h2'].' data-type="text">'.$this->content['text01'].'</h2>';
	        $this->doc .= '<hr class="primary">';
	        $this->doc .= '<p style='.$this->css['p'].' data-type="text">'.$this->content['text02'].'</p>';
	    $this->doc .= '</div>';
	$this->doc .= '</div>';

	$this->doc .= '<div class="row">';
	    $this->doc .= '<div class="col-sm-4 col-sm-offset-2 text-center">';
	        $this->doc .= '<i class="fa fa-phone fa-3x wow bounceIn" style="visibility: visible; animation-name: bounceIn; -webkit-animation-name: bounceIn;"></i>';
	        $this->doc .= '<p style='.$this->css['p'].' data-type="text">'.$this->content['text03'].'</p>';
	    $this->doc .= '</div>';

	    $this->doc .= '<div class="col-sm-4 text-center">';
	        $this->doc .= '<i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; -webkit-animation-delay: 0.1s; animation-name: bounceIn; -webkit-animation-name: bounceIn;"></i>';
	        $this->doc .= '<p style='.$this->css['p'].' data-type="text">'.$this->content['text04'].'</p>';
	    $this->doc .= '</div>';
	$this->doc .= '</div>';
	// </div><!-- / .container -->
	// </div><!-- / .overlay -->
	// </section>
	}
}
?>



