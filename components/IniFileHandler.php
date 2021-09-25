<?php

namespace Robust;

# INI File handler
# Basic functionality, to be continued

abstract class IniFileHandler {
	
	public static function ReadIni($file) {
		if(!str_starts_with($file, ROOT)) $file = ROOT . '/' . $file;
		return parse_ini_file($file, true);
	}
	
	public static function WriteIni($file, $content) {
		if(!str_starts_with($file, ROOT)) $file = ROOT . '/' . $file;
		return write_ini_file($file, $content);
	}
	
}

