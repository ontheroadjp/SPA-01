
<?php
$file = file_get_contents( './modules/services/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];

$doc = '';
$doc .= '<section id="services">';
$doc .= '<div class="container">';

$doc .= '<div class="row text-center pad-bottom">';
$doc .= '<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">';
$doc .= '<h2 class="head-set">'.$content['text01'].'</h2>';
$doc .= '<p>'.$content['text02'].'</p>';
$doc .= '</div>';
$doc .= '</div>';

$doc .= '<div class="row text-center">';

	$doc .= '<div class="col-md-4 col-sm-4 col-xs-12">';
	$doc .= '<i class="fa fa-recycle  fa-5x"></i>';
	$doc .= '<h4 class="head-set">'.$content['text03'].'</h4>';
	$doc .= '<p>'.$content['text04'].'</p>';
	$doc .= '</div>';
	
	$doc .= '<div class="col-md-4 col-sm-4 col-xs-12">';
	$doc .= '<i class="fa fa-desktop  fa-5x"></i>';
	$doc .= '<h4 class="head-set">'.$content['text05'].'</h4>';
	$doc .= '<p>'.$content['text06'].'</p>';
	$doc .= '</div>';
	
	$doc .= '<div class="col-md-4 col-sm-4 col-xs-12">';
	$doc .= '<i class="fa fa-bolt  fa-5x"></i>';
	$doc .= '<h4 class="head-set">'.$content['text07'].'</h4>';
	$doc .= '<p>'.$content['text08'].'</p>';
	$doc .= '</div>';

$doc .= '</div><!-- end of .row .text-center -->';

$doc .= '</div><!-- end of .container -->';
$doc .= '</section>';
?>