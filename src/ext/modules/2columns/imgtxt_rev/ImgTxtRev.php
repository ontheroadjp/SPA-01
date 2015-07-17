
<?php
// テキストフィールドの作成
// $this->doc .= '<h2 class="head-set" data-type="text">'.$this->content['text01'].'</h2>';

// テキストエリアの作成
// $this->doc .= '<p data-type="textarea" data-rows="3" data-textAlign="center">'.$this->content[text02'].'</p>';

// CSS の適用
//$this->doc .= '<h2 style='.$this->css['h2'].' data-type="text">'.$this->content['text02'].'</h2>';
?>

<?php
require_once( 'modules/2columns/imgtxt/ImgTxt.php' );
class ImgTxtRev extends ImgTxt {

	function __construct( $path ) {
		parent::__construct( $path );
	}
}
?>





