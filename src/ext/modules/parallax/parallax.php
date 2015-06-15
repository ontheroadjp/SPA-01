
<?php
$file = file_get_contents( './modules/parallax/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];
// $content['text01']


$doc = '';
$doc .= '<div class="parallax-like">';
$doc .= '<div class="overlay">';

$doc .= '<div class="container">';
$doc .= '<div class="row">';

$doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
$doc .= '<div>';
$doc .= '<strong>'.$content['text01'].'</strong>';
$doc .= '<p>'.$content['text02'].'</p>';
$doc .= '</div>';
$doc .= '</div>';
	
$doc .= '<div class="col-lg-4 col-md-4 col-sm-4">';
$doc .= '<div>';
$doc .= '<strong>'.$content['text03'].'</strong>';
$doc .= '<p>'.$content['text04'].'</p>';
$doc .= '</div>';
$doc .= '</div>';
	
$doc .= '<div class="col-lg-4 col-md-4 col-sm-4 ">';
$doc .= '<div>';
$doc .= '<strong>'.$content['text05'].'</strong>';
$doc .= '<p>'.$content['text06'].'</p>';
$doc .= '</div>';
$doc .= '</div>';

$doc .= '</div><!-- end of .row -->';
$doc .= '</div><!-- end of .container -->';

$doc .= '</div><!-- end of .overlay -->';
$doc .= '</div><!-- end of .parallax-like -->';
?>
