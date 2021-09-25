<?php

namespace Robust;

# ExtensionHandler
# depends on:
#   - ArchiveHandler
#	- FileHandler
# 
abstract class ExtensionHandler {
	
	# Default path for extensions
	const ExtensionDir = ROOT.'/extensions/';
	
	# Default filename for the extension Welcome INI file
	const ExtensionWelcome = 'welcome.ini';
	
	# Default filename for the extension config file
	const ExtensionConfig = 'config.json';
	
	public static function ListExtensions($enabledOnly=true) {

		$filelist = scandir(self::ExtensionDir);
		$folderlist = array();
		$extensions = array();
		
		foreach($filelist as $listitem) {
			if(is_dir(self::ExtensionDir.$listitem)) array_push($folderlist, $listitem);
		}
		$folderlist = array_diff($folderlist, array('.', '..'));

		foreach($folderlist as $folder) {
			
			$info = parse_ini_file(self::ExtensionDir.$folder.'/'.self::ExtensionWelcome, true);
			$config = json_decode(file_get_contents(self::ExtensionDir.$folder.'/'.self::ExtensionConfig), true);
			
			if($enabledOnly) {
				if($config['enabled'] == true) {
					array_push($extensions, array('id'=>$folder, 'dir'=>self::ExtensionDir.$folder, 'info'=>$info, 'config'=>$config));
				}
			} else {
				array_push($extensions, array('id'=>$folder, 'dir'=>self::ExtensionDir.$folder, 'info'=>$info));				
			}
		}
		
		return $extensions;

		
	}
	
	public static function InstallExtension($archive) {
		include_once ROOT . '/ArchiveHandler.php';
		
	}
	
	public static function GetExtensionInfo($extension) {
		
		return parse_ini_file(self::ExtensionDir.$extension.'/'.self::ExtensionWelcome, true);
		
	}
	
	public static function GetExtensionConfig($extension) {
		//echo self::ExtensionDir.$extension.'/'.self::ExtensionConfig;
		return json_decode(file_get_contents(self::ExtensionDir.$extension.'/'.self::ExtensionConfig), true);
	}
		
	public static function LoadExtension($extension) {
		return;
	}
	
	
}
//echo ExtensionHandler::ExtensionDir;
//ExtensionHandler::ListExtensions();
?>