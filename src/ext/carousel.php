

<?php
echo '<div id="my-carousel-'.$count.'" class="carousel slide">';
	echo '<div class="carousel-inner">';
		echo '<div class="item active">';
			echo '<img src="holder.js/900x500/auto/#777:#fff/text:First slide" alt="">';
		echo '</div><!-- / .item active -->';
		echo '<div class="item">';
			echo '<img src="holder.js/900x500/auto/#777:#fff/text:Secound slide" alt="">';
		echo '</div><!-- / .item -->';
		echo '<div class="item">';
			echo '<img src="holder.js/900x500/auto/#777:#fff/text:Third slide" alt="">';
		echo '</div><!-- / .item -->';
	echo '</div><!-- / .carousel-inner -->';

	// カルーセル左ボタン
	echo '<a class="left carousel-control" href="#my-carousel" data-slide="prev">';
	echo '<span class="glyphicon glyphicon-chevron-left"></span></a>';

	// カルーセル右ボタン
	echo '<a class="right carousel-control" href="#my-carousel" data-slide="next">';
	echo '<span class="glyphicon glyphicon-chevron-right"></span></a>';

echo '</div><!-- / #my-carousel .carousel .slide -->';
?>
