<?php

namespace Robust;

# DatabaseHandler
# depends on:
#   + IniFileHandler
#	- MessageHandler

require_once(ROOT . '/components/IniFileHandler.php');

include_once(ROOT . '/components/MessageHandler.php');

abstract class DatabaseHandler {
	
	private static function LoadDatabaseIni($type) {
		
		$location = ROOT . "/.config/${type}.ini";
		
		return IniFileHandler::ReadIni($location);
		
	}
	
	public static function MysqlConnect($name) {

		$config = DatabaseHandler::LoadDatabaseIni('mysql');
		
		try {
			
			$conn = new PDO(
				'mysql:host='.$config[$name]['server']
					.'; dbname='.$config[$name]['database']
					.'; charset=utf8',
				$config[$name]['user'],
				$config[$name]['password']
			);
			
		} catch( PDOException $e ) {
			MessageHandler::LogMessage($e->getMessage());
		}
		
		return $conn;
	
	}
	
}
?>