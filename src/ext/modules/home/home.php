
<?php
$file = file_get_contents( './modules/home/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];
// $content['text01']

$doc = '';
$doc .= '<div id="home">';
$doc .= '<div class="overlay">';

$doc .= '<div class="container">';
$doc .= '<div class="col-md-8 col-md-offset-2 text-center">';
$doc .= '<h1 class="'.$prefix.'_text01">'.$content['text01'].'</h1>';
$doc .= '<h2 class="'.$prefix.'_text02">'.$content['text02'].'</h2>';
$doc .= '<p  class="'.$prefix.'_text03 p-cls">'.$content['text03'].'</p>';
$doc .= '</div><!-- end of .col-md-8 col-md-offset-2 text-center -->';
$doc .= '</div><!-- end of container -->';

$doc .= '</div><!-- end of .overlay -->';
$doc .= '</div><!-- end of #home -->';
?>

