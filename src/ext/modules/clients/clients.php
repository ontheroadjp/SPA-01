<?php
$file = file_get_contents( './modules/clients/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];

$doc = '';
$doc .= '<section id="clients">';
$doc .= '<div class="container">';
$doc .= '<div class="row">';

$doc .= '<div class="col-md-3">';
$doc .= '<img src="img/audio.png" alt="" class="img-responsive" />';
$doc .= '</div>';

$doc .= '<div class="col-md-3">';
$doc .= '<img src="img/codecanon.png" alt="" class="img-responsive" />';
$doc .= '</div>';
 
$doc .= '<div class="col-md-3">';
$doc .= '<img src="img/graphic.png" alt="" class="img-responsive" />';
$doc .= '</div>';

$doc .= '<div class="col-md-3">';
$doc .= '<img src="img/themeforest.png" alt="" class="img-responsive" />';
$doc .= '</div>';

$doc .= '</div><!-- end of .row -->';
$doc .= '</div><!-- end of .container -->';
$doc .= '</section>';
?>
