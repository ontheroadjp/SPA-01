
<?php
// テキストフィールドの作成
// $this->doc .= '<h2 class="head-set" data-type="text">'.$this->content['text01'].'</h2>';

// テキストエリアの作成
// $this->doc .= '<p data-type="textarea" data-rows="3" data-textAlign="center">'.$this->content[text02'].'</p>';

// CSS の適用
//$this->doc .= '<h2 style='.$this->css['h2'].' data-type="text">'.$this->content['text02'].'</h2>';
 
?>

<?php
require_once( 'modules/Module.php' );
class General extends Module {

	function __construct( $path ) {
		parent::__construct( $path );

	// <section id="'.$this->id.'" style='.$this->css[CSS_SECTION].'>
	// <div style='.$this->css[CSS_OVERLAY].'>
	// <div class="container">
		$this->doc .= '<div class="row">';
		$this->doc .= '<div class="col-lg-12 text-center">';
		$this->doc .= '<h2 style='.$this->css['h2'].' data-type="text">'.$this->content['text01'].'</h2>';
		$this->doc .= '<p style='.$this->css['p'].' data-type="text">'.$this->content['text02'].'</p>';
		$this->doc .= '</div>';
		$this->doc .= '</div>';
	// </div><!-- / .container -->
	// </div><!-- / .overlay -->
	// </section>
	}
}
?>



