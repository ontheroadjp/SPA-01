
<?php
$file = file_get_contents( './modules/portfolio/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];
// $content['text01']


$doc = '';
$doc .= '<section id="works">';
$doc .= '<div class="container">';

$doc .= '<div class="row text-center pad-bottom">';
$doc .= '<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">';
$doc .= '<h2 class="head-set">'.$content['text01'].'</h2>';
$doc .= '<p>'.$content['text02'].'</p>';
$doc .= '</div>';
$doc .= '</div>';

$doc .= '<div class="row text-center portfolio-item">';

$doc .= '<div class="col-md-4 col-sm-4 ">';
$doc .= '<div class="alert alert-info">';
$doc .= '<img src="img/1.jpg" class="img-responsive " alt="" />';
$doc .= '<h3>'.$content['text03'].'</h3>';
$doc .= '<h5>'.$content['text04'].'</h5>';
$doc .= '</div>';
$doc .= '</div>';
	
$doc .= '<div class="col-md-4 col-sm-4 ">';
$doc .= '<div class="alert alert-danger">';
$doc .= '<img src="img/2.jpg" class="img-responsive " alt="" />';
$doc .= '<h3>'.$content['text05'].'</h3>';
$doc .= '<h5>'.$content['text06'].'</h5>';
$doc .= '</div>';
$doc .= '</div>';
	
$doc .= '<div class="col-md-4 col-sm-4 ">';
$doc .= '<div class="alert alert-success">';
$doc .= '<img src="img/3.jpg" class="img-responsive " alt="" />';
$doc .= '<h3>'.$content['text07'].'</h3>';
$doc .= '<h5>'.$content['text08'].'</h5>';
$doc .= '</div>';
$doc .= '</div>';

$doc .= '</div><!-- end of .row text-center portfolio-item -->';
$doc .= '</div><!-- end of .container -->';
$doc .= '</section>';
?>