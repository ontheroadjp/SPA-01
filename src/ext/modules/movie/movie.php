<?php
$file = file_get_contents( './modules/movie/module.json', true );
$json = json_decode( $file, true );	// true 付けると連想配列
$content = $json['content'];

$doc = '';
$doc .= '<div id="video-sec" class="player" data-property="{videoURL:\'https://www.youtube.com/watch?v=Ycv5fNd4AeM\',containment:\'self\',autoPlay:true, mute:true, startAt:0, opacity:1,mute: true,showControls:false}">';
$doc .= '<!-- change https://www.youtube.com/watch?v=Ycv5fNd4AeM to your youtube url-->';

$doc .= '<div class="overlay">';
$doc .= '<div class="container">';
$doc .= '<div class="row text-center">';
$doc .= '<div class="col-md-12">';
$doc .= '<h1>'.$content['text01'].'</h1>';
$doc .= '<h4>'.$content['text02'].'</h4>';
$doc .= '<h4>t'.$content['text03'].'</h4>';
$doc .= '</div>';
$doc .= '</div>';
$doc .= '</div><!-- end of .container -->';
$doc .= '</div><!-- end of .overlay -->';

$doc .= '</div><!-- end of #video-sec -->';
?>