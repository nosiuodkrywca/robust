<?php

namespace Robust;

class Pages {
	
	public static function Serve($page = '/') {
		
		
	}
	
	public static function ServeSpecial($page = '404') {
		
		switch($page) {
			case '404':
				die('this doc dosnt exis doc');
				die('this doc dosnt exis doc');
				break;
				
			default:
				break;
		}
		
	}
	
}