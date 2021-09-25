<?php

namespace Robust;

class FileHandler {
	
	const Allowed = ['php', 'css', 'html', 'htm', 'json', 'js', 'config', 'inf', 'ini', 'txt'];
	
	public static function Scan($target, $allowedonly = false) {
		
		$return = Array();
	
		$l = strlen(ROOT);

		if(is_dir($target)){

			$files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
			
			//print_r($files);
			
			/*if(!empty($files))*/ $return[substr($target,$l)] = Array();

			foreach( $files as $file )
			{
				$ext = pathinfo($file, PATHINFO_EXTENSION);
				$return = array_merge($return, FileHandler::Scan( $file ));
				//if(in_array($ext, $allowed)) echo substr($file, $l)."\n";
				if(in_array($ext, FileHandler::Allowed)) array_push($return[substr($target,$l)], substr($file, strlen(dirname($file))+1));
			}


		}
		
		return array_filter($return);
	}
	
	public static function Append($file, $data) {
		
		if(!str_starts_with($file, ROOT)) $file = ROOT . $file;
		
		try{ file_put_contents($file, $data, FILE_APPEND); } catch(Exception $e) {die($e->getMessage());}
		
	}
	
	public static function Replace($file, $data) {
		
		
	}
	
	public static function Rename($old_name, $new_name) {
		
		
	}
	
	public static function Write($file, $data) {
		
		
	}
	
}