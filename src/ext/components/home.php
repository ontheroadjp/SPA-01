

<?php
$prefix = "home";

/***
* key: 型
* value: 名前
*/
$editable = array(
	'text01' => 'text'
	, 'text02' => 'text'
	, 'text03' => 'text'
	, 'overlay_color' => 'color'
);

$doc = '';
$doc .= '<div id="home">';
$doc .= '<div class="overlay">';

$doc .= '<div class="container">';
$doc .= '<div class="col-md-8 col-md-offset-2 text-center">';
$doc .= '<h1 class="'.$prefix.'_text01">ON THE ROAD</h1>';
$doc .= '<h2 class="'.$prefix.'_text02">be happy with our service</h2>';
$doc .= '<p  class="'.$prefix.'_text03 p-cls">月額5,000円から始める自分だけのWEBサイト</p>';
$doc .= '</div><!-- end of .col-md-8 col-md-offset-2 text-center -->';
$doc .= '</div><!-- end of container -->';

$doc .= '</div><!-- end of .overlay -->';
$doc .= '</div><!-- end of #home -->';
?>

