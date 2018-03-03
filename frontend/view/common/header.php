<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <?php $cache = Settings::Get("cache_version"); ?>

    <link href="frontend/view/boot/<?=$cache?>/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="frontend/view/boot/<?=$cache?>/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="frontend/view/boot/<?=$cache?>/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

<!-- NAVBAR -->
<nav>
    <div class="nav-wrapper">
		<a href="#" class="brand-logo">Frontend</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="#">Products</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
</nav>

<div class="row no-gutters">
    
    <!-- MAIN CONTENT -->
    <div class="col-md-11 offset-md-1">

        <div id="main" class="main">