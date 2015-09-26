
<?php
$protcol = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
$hostname = $_SERVER["HTTP_HOST"];
$uri = $_SERVER["REQUEST_URI"];

$url = $protcol.$hostname.$uri;
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>SPA-01 alpha</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->

<meta property="og:title" content="<?= $json['sitename'] ?>" />
<meta property="og:description" content="<?= $json['description'] ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="<?= $json['sitename'] ?>" />

<meta property="fb:app_id" content="" />
<meta property="article:publisher" content="" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?= $json['sitename'] ?>">

<!-- css -->
<!-- <link href="css/bootstrap.css" rel="stylesheet" /> -->
<!-- <link href="css/font-awesome.css" rel="stylesheet" /> -->
<link href="css/style.css" rel="stylesheet" />
<style>
.sample {
}
</style>

<!--
HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:

Bootstrap3 は IE8 をサポートしているが IE8 は HTML5 で追加されたタグや CSS3 のメディアクエリに対応していないので、これら未サポート機能を動作させる
// -->


<!-- <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script> -->

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>


