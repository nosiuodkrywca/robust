<?php

namespace Robust;
//die($PATH);

require_once(ROOT . '/components/Logger.php');

include_once(ROOT . '/components/ExtensionHandler.php');

//$request = array_filter( explode( '/', REQ ) );

date_default_timezone_set('Europe/Warsaw');

$now = date("Y-m-d H:i:s");
//'[2021-09-12 18:15:21][admin][null][0;0;0] Connection refused'

//echo '<pre>';
//print_r($request);
//die();

//die(REQ);

if(REQ == '' || REQ == '/site' || REQ == '/site/' || REQ == 'site/') header('location: https://robust.nosiu.pl/admin/core/site/general');

MessageHandler::Save('Settings saved successfully', 'success');
MessageHandler::Save('New version available', 'info');
//MessageHandler::Save('Password is not set', 'warning');
//MessageHandler::Save('Cannot connect to the database', 'error');
//MessageHandler::Save('ROOT: '.ROOT, 'debug');
//MessageHandler::Save('CWD: '.CWD, 'debug');
//MessageHandler::Save('REQ: '.REQ, 'debug');
//MessageHandler::Save('PARAMS: '.implode(', ', PARAMS), 'debug');
//MessageHandler::Save('GET: '.GET, 'debug');
//MessageHandler::Save('PATH: '.PATH, 'debug');


?>
<!doctype html>
<html lang="">
<head>

	<title>Robust Admin</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://robust.nosiu.pl/admin/css/light.css">
	<link rel="stylesheet" href="https://robust.nosiu.pl/admin/css/main.css">
	<style>
		label {width: 200px; display: inline-block;}
	</style>
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
		<span class="edition noselect">Core</span>
		<span class="version noselect">v2.0.4<a style="color:red; display:none;"> new version available</a></span>
		
	</header>
	<nav class="left main">
	<div class="c1">
		<div class="c2">
		
			<div class="menu">
				<span class="title noselect">Site settings</span>
				<a href="#" class="current">General</a>
				<a href="#">Users</a>
				<a href="#">Sites</a>
				<a href="#">API</a>
			</div>
			<div class="menu">
				<span class="title noselect">Management</span>
				<a href="#">Menu</a>
				<a href="#">Pages</a>
				<a href="#">Articles</a>
				<a href="#">Comments</a>
			</div>
			<div class="menu">
				<span class="title noselect">Extensions</span>
				<!--<a href="#">Primary</a>
				<a href="#">Secondary</a>-->
				<?php
					foreach(ExtensionHandler::ListExtensions(false) as $extension) {
						$_h = "/extension/{$extension['id']}";
						if(str_starts_with(REQ,$_h)) $_c = 'current'; else $_c = '';
						echo "<a class=\"{$_c}\" href=\"https://{$_SERVER['HTTP_HOST']}/admin/core/extension/{$extension['id']}\">{$extension['info']['general']['name']}</a>";
					}
				?>
			</div>

		</div>

	</div>
	</nav>
	<main>
	
		<div class="c1">
			<div class="c2-sb">
			
				<section>
					<!--<div class="card success">
						<span class="header">&#10004; Success</span>
						<span class="content">Settings saved successfully</span>
					</div>
					<div class="card info">
						<span class="header">&#8505; Info</span>
						<span class="content">New version available</span>
					</div>
					<div class="card warning">
						<span class="header">&#10069; Warning</span>
						<span class="content">Password is not set</span>
					</div>
					<div class="card error">
						<span class="header">&#128721; Error</span>
						<span class="content">Cannot connect to the database</span>
						<a href="#" class="dismiss">&#10006;</a>
					</div>-->
					
					
					<?php foreach(MessageHandler::GetAll() as $_msg) {
							
							switch($_msg['type']) {
								case 'error':
									$_ico = '&#128721;';
									break;
								case 'warning':
									$_ico = '&#10069;';
									break;
								case 'info':
									$_ico = '&#8505;';
									break;
								case 'success':
									$_ico = '&#10004;';
									break;
								case 'debug':
									$_ico = '&#9881;';
									break;
							}

						?>
					<div class="card <?=$_msg['type'];?>">
					<span class="header"><?=$_ico . ' ' . ucfirst($_msg['type'])?></span>
						<span class="content"><?=$_msg['message']?></span>
					</div>
					<?php } ?>
					
					
				</section>
				<section>
				
					<h4>Server settings</h4>
					<!--<button>Button</button><a href="#" class="btn">Another Button</a><input type="submit"><input type="text"><br>
					<button disabled>Button</button><a href="#" class="btn disabled">Another Button</a><input disabled="disabled" type="submit"><input disabled type="text">
					<input type="radio">
					<input type="checkbox"><br>
					<input type="color"><br>
					<input type="range"><br>
					<input type="date"><br>
					<input type="datetime-local"><br>
					<textarea></textarea>-->
					<h5>API settings</h5>
					<label>Enable API</label> <input type="checkbox" checked><br><br>
					<label>API key</label> <input type="text" value="da&bD89N42$fwdR34n1c369dLen*bsAA">
					<div class="card info">
					<span class="header">&#8505; Info</span>
						<span class="content">Note the API key - you won't be able to see it later!</span>
					</div>
				</section>
				<section>
					<h4>Database</h4>
					<label>DB host</label> <input type="text" value="localhost"><br>
					<label>DB port</label> <input type="text" value="default"><br>
					<label>DB user</label> <input type="text" value="robust"><br>
					<label>DB pass</label> <input type="password" value="robustpassword"><br>
					<label>DB pref</label> <input type="text" value="rb_"><br>
					<div class="card error">
					<span class="header">&#128721; Error</span>
						<span class="content">Can't connect to the database</span>
					</div>
					<!--<button>Button</button><a href="#" class="btn">Another Button</a><input type="submit"><input type="text">
					<input type="radio" disabled>
					<input type="checkbox" disabled><br>
					<input type="color" disabled><br>
					<input type="range" disabled><br>
					<input type="date" disabled><br>
					<input type="time" disabled><br>
					<input type="datetime-local" disabled><br>
					<textarea disabled></textarea>
	<pre class="disabled">What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.

Where can I get some?
There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span>
	</pre>
	<pre>What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.

Where can I get some?
There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span>
	</pre>-->
				</section>
				<section>
				<button>Save</button>
				<button>Discard</button>
				
				</section>
			</div>
		</div>
	<?php //echo __DIR__ .' '. getcwd(); ?>
	</main>
</body>
</html>