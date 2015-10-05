
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
class ImgTxt extends Module {

	function __construct( $path ) {
		parent::__construct( $path );

	$this->doc .= '<button class="layout-btn">レイアウト</button>';

	// <section id="'.$this->id.'" style='.$this->css[CSS_SECTION].'>
	// <div style='.$this->css[CSS_OVERLAY].'>
	// <div class="container">
	$this->doc .= '<div class="row">';
    
    $this->doc .= '<div class="col-lg-5 col-lg-offset-1 col-md-6">';
        $this->doc .= '<img style='.$this->css['img'].' class="img-responsive" src="'.$this->content['img01'].'" alt="">';
    $this->doc .= '</div>';

    $this->doc .= '<div class="col-lg-5 col-md-6">';
		$this->doc .= '<h2 data-type="text" style='.$this->css['h2'].' class="section-heading">'.$this->content['text01'].'</h2>';
		$this->doc .= '<p data-type="textarea" data-rows="6" style='.$this->css['p'].' class="lead">'.$this->content['text02'].'</p>';
    $this->doc .= '</div>';

	$this->doc .= '</div>';
	// </div><!-- / .container -->
	// </div><!-- / .overlay -->
	// </section>
	}
}
?>





