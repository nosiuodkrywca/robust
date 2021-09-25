<?php

namespace Robust;

define('ROOT', __DIR__);

//require_once(ROOT . '/components/Globals.php');
//require_once(ROOT . '/components/Security.php');
//require_once(ROOT . '/components/Logger.php');

//require_once('./components/definitions.php');
//require_once('./components/extensions.php');
//require_once('./components/classes');
//require_once('./components/init');

foreach(glob(ROOT . '/functions/*.php') as $filename) {
   require_once $filename;
}

foreach(glob(ROOT . '/components/*.php') as $filename) {
   include_once $filename;
}


//include($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']);

define('REQUESTED_DIR', ROOT . dirname($_SERVER['REQUEST_URI']));
define('REQUESTED_FILE', ROOT . $_SERVER['REQUEST_URI']);





//$ROOT = __DIR__;



// $PATH = substr($FILE,0,strrpos($FILE,'/')+1);

//$URI = 'https://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0];
//$DIR = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);


//die(implode(' ', $uris);
//print_r($uris);


//$_cwd =  dirname(ROOT . implode('/', $uris));
//$_cwd =  ROOT . implode('/', $uris);
//$_cwd =  ROOT . implode('/', $uris);
$uris = array_filter(explode('/', $_SERVER['REQUEST_URI']));
$_curi =  ROOT . $_SERVER['REQUEST_URI'];
$_cwd = substr($_curi, 0, strrpos($_curi, '/'));

//die($_cwd);
//echo array_pop($uris) . ' ';

if(file_exists($_curi) && !is_dir($_curi)) {
		
	define('CWD', $_cwd);
	$_r = explode('?', substr(REQUESTED_FILE,strlen(CWD)));
	define('REQ', $_r[0]);
	define('GET', (isset($_r[1])?$_r[1]:''));
	
	
	
	include_once($_curi);
		
} else {
	
	//die($_cwd);

	do {
		
		$_cwd =  ROOT . '/' . implode('/', $uris);
		
		//echo '<pre>';
		//print_r($uris);
		
		if(file_exists($_cwd . '/index.php')) {
			
			define('CWD', $_cwd);
			$_r = explode('?', substr(REQUESTED_FILE,strlen(CWD)));
			define('REQ', $_r[0]);
			define('GET', (isset($_r[1])?$_r[1]:''));
			
			
			if( include_once($_cwd . '/index.php') ) Logger::Write('Loaded succesfully', SUCCESS, NOW, HERE);
			
			//if(strpos(REQ, '?')) die(substr(REQ,0,strpos(REQ, '?')));
			//echo ROOT . '/' . implode('/', $uris) . '/index.php';
			break;
			
		}
		
	//} while(false);
	} while(array_pop($uris));
	
	//die();
	

	
}


//do { echo implode(' ', $uris) . '<br>'; } while(array_pop( $uris ));

//die();
//die(REQUESTED_DIR . ' ' . REQUESTED_FILE);

//if(file_exists(REQUESTED_FILE) && !is_dir(REQUESTED_FILE)) include_once(REQUESTED_FILE);
//if(file_exists(REQUESTED_DIR.'/index.php') && $_SERVER['REQUEST_URI'] != '/') include_once(REQUESTED_DIR.'/index.php');
//echo REQUESTED_DIR.'/index.php';

//echo dirname($_SERVER['REQUEST_URI']);

//if(file_exists($FILE) && is_file($FILE)) include($FILE); else echo $FILE;

//include_once('./components/ExtensionHandler.php');
//include_once('./components/DatabaseHandler.php');

//echo "<pre>";
//print_r( ExtensionHandler::GetExtensionConfig('weather') );
