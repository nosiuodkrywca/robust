<!doctype html>
<html lang="">
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=$DIR;?>dark.css">
	<link rel="stylesheet" href="<?=$DIR;?>main.css">
	<script>
	
	</script>
</head>
<body>
	<header>
		<div class="dots" style="top: 8px; left: 8px;"></div>
		<div class="dots" style="top: 26px; left: 8px;"></div>
		<div class="line">&nbsp;</div>
		<!--<div style="position: absolute; top: 8px; left: 8px; display: inline-block; width: 27px; height: 27px; border: 3px dotted #7f7f7f; box-sizing: border-box;"></div>-->
		<!--<img src="images/robust_logotype.png">-->
		<span class="pagename noselect">Robust</span>
		<span class="edition noselect">Content Manager</span>
		<span class="version noselect">v2.0.4<a style="color:red; display:none;"> new version available</a></span>
		
	</header>
	<nav class="left main">
	<div class="c1">
		<div class="c2">
		
			<div class="menu">
				<span class="title noselect">General settings</span>
				<a href="#" class="current">Primary</a>
				<a href="#">Secondary</a>
			</div>
			<div class="menu">
				<span class="title noselect">Extensions</span>
				<a href="#">Primary</a>
				<a href="#">Secondary</a>
			</div>

		</div>

	</div>
	</nav>
	<main>
	
		<div class="c1">
			<div class="c2-sb">
			
			<?php
			
			echo $_GET['re']; ?>
				<?php include('settings/main.php'); ?>
			</div>
		</div>
	<?php //echo __DIR__ .' '. getcwd(); ?>
	</main>
</body>
</html>