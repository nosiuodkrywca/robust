<?php

namespace Robust;

session_start();

session_destroy();

define('ROOT', __DIR__);


foreach(glob(ROOT . '/functions/*.php') as $filename) {
   require_once $filename;
}

foreach(glob(ROOT . '/components/*.php') as $filename) {
   require_once $filename;
}

define('REQUESTED_DIR', ROOT . dirname($_SERVER['REQUEST_URI']));
define('REQUESTED_FILE', ROOT . $_SERVER['REQUEST_URI']);

$uris = array_filter(explode('/', $_SERVER['REQUEST_URI']));
$_curi =  ROOT . $_SERVER['REQUEST_URI'];
$_cwd = substr($_curi, 0, strrpos($_curi, '/'));

if(file_exists($_curi) && !is_dir($_curi)) {
		
	define('CWD', $_cwd);
	$_r = explode('?', substr(REQUESTED_FILE,strlen(CWD)));
	define('REQ', $_r[0]);
	define('GET', (isset($_r[1])?$_r[1]:''));

	include_once($_curi);
		
} else {

	do {
		
		$_path = '/' . implode('/', $uris);
		
		$_cwd =  ROOT . $_path;
		
		if(file_exists($_cwd . '/index.php')) {
			
			define('PATH', $_path);
			define('CWD', $_cwd);
			$_r = explode('?', substr(REQUESTED_FILE,strlen(CWD)));
			define('REQ', $_r[0]);
			define('GET', (isset($_r[1])?$_r[1]:''));
			define('PARAMS', explode('/',trim(REQ,'/')));
			
			if( include_once($_cwd . '/index.php') ) Logger::Write('Loaded succesfully', SUCCESS, NOW, HERE);
			
			break;
			
		}
		
	} while(array_pop($uris));
	
}
