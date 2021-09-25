<?php

namespace Robust;

require_once(ROOT . '/components/FileHandler.php');
require_once(ROOT . '/components/DateTime.php');

class Logger {
	
	const LogDir = ROOT . '/.log';
	
	public static function Write($what, $type = null, $when = null, $where = null, $who = null, $id = null) {
		
		if($when == null) { $when = NOW; }
		
		if($who == null) { $who = 'nobody'; }
		
		if($type == null) { $type = INFO; }
		
		FileHandler::Append(Logger::LogDir . '/site.txt', "[$when][$type][$who][$where][$id] $what\n");
		
	}
	
	public static function Get($type = null) {
		
		
		
	}
	
}