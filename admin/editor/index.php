<?php


// function sdir($target, $root) {
	
	// $return = Array();
	
	// $allowed = ['php', 'css', 'html', 'htm', 'json', 'js', 'config', 'inf', 'ini', 'txt'];
	
	// $l = strlen($root);

	// if(is_dir($target)){

		// $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
		
		// //print_r($files);
		
		// /*if(!empty($files))*/ $return[substr($target,$l)] = Array();

		// foreach( $files as $file )
		// {
			// $ext = pathinfo($file, PATHINFO_EXTENSION);
			// $return = array_merge($return, sdir( $file, $root ));
			// //if(in_array($ext, $allowed)) echo substr($file, $l)."\n";
			// if(in_array($ext, $allowed)) array_push($return[substr($target,$l)], substr($file, strlen(dirname($file))+1));
		// }


	// } 
	
	// return array_filter($return);
// }

namespace Robust;

require_once(ROOT . '/components/FileHandler.php');



if( isset($_GET['file']) ) $filestat = stat($ROOT.$_GET['file']);

//die(print_r(sdir(ROOT, ROOT)));


?>
<!doctype html>
<html lang="">
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://robust.nosiu.pl/admin/black.css">
	<link rel="stylesheet" href="https://robust.nosiu.pl/admin/main.css">
	<script>
		function textAreaAdjust(element) {
	  //element.style.height = "1px";
	 // element.style.height = (25+element.scrollHeight)+"px";
	}
	
	document.addEventListener("DOMContentLoaded", function(event) {
		textAreaAdjust(editor);
	});
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
		<span class="edition noselect">Editor</span>
		<span class="version noselect">v2.0.4<a style="color:red;"> new version available</a></span>
		
	</header>
	<nav class="left main">
	<div class="c1">
		<div class="c2">
			
		
			<!--<div class="menu">
				<span class="title noselect">General settings</span>
				<a href="#" class="current">Primary</a>
				<a href="#">Secondary</a>
			</div>
			<div class="menu">
				<span class="title noselect">Extensions</span>
				<a href="#">Primary</a>
				<a href="#">Secondary</a>
			</div>-->
			
			<?php
			
			
			//die();
			
			//foreach(sdir(ROOT, ROOT) as $key => $val) {
			foreach(FileHandler::Scan(ROOT, true) as $key => $val) {
				echo '<div class="menu"><span class="title noselect">'.$key.'</span>';
				foreach($val as $file) {
					//if($_GET['file'] == $key.$file)
					//	echo '<a class="current" href="https://'.$_SERVER['SERVER_NAME'].'/admin/editor/'.urlencode($key.$file).'">'.$file.'</a>';
					//else
						echo '<a href="https://'.$_SERVER['SERVER_NAME'].'/admin/editor/'.md5($key.$file).'">'.$file.'</a>';
				}
				echo '</div>';
			}

			?>
		</div>

	</div>
	</nav>
	<main>
	
		<div class="c1">
			<div class="c2-sb">
				<div class="c3">
					<section class="row header">
						<h4>File: <?//=$_GET['file']?></h4>
						<p>Size: <?//=$filestat['size']?> bytes; last modification time: <?//=gmdate("Y-m-d H:i:s", $filestat['size'])?></p>
					</section>
					<section class="row">
					<textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"><?php
						if(isset($_GET['file'])) {
							//echo $ROOT.$_GET['file'].":<br>";
							//echo htmlentities(file_get_contents(ROOT.$_GET['file'],1));
						}
					?>
					</textarea>
					</section>
					<section class="row footer right">
						<button>New file</button>
						<button>Delete</button>
						<button>Reload</button>
						<button>Cancel</button>
						<button>Save changes</button>
					</section>
				</div>
			</div>
		</div>
	<?php //echo __DIR__ .' '. getcwd(); ?>
	</main>
</body>
</html>