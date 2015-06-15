<?php
$file = file_get_contents( './modules/location/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];

$doc = '';
$doc .= '<section id="contact">';
$doc .= '<div class="container">';

$doc .= '<div class="row text-center ">';
$doc .= '<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">';
$doc .= '<h2 class="head-set">'.$content['text01'].'</h2>';
$doc .= '<p>'.$content['text02'].'</p><br />';
$doc .= '</div>';
$doc .= '</div>';

$doc .= '<div class="row text-center">';
$doc .= '<div class="col-md-12">';
$doc .= '<h3>'.$content['text03'].'</h3>';
$doc .= '<h3>'.$content['text04'].'</h3>';
$doc .= '<h3>'.$content['text05'].'</h3>';
$doc .= '</div>';
$doc .= '</div>';

$doc .= '</div><!-- end of .container -->';
$doc .= '</section>';
?>

