<?php

namespace Robust;

class Notifications {
	
	const NotifVarName = 'notifs';
	
	
	public static function Push($notif) {
		if( array_push($_SESSION[NotifVarName], $notif) ) return true;
		return false;
	}
	
	public static function ShowLatest($dismiss = true) {
		
		
	}
	
	public static function GetAll($dismiss = true) {
		
		$notifs = array();
		
		if(isset($_SESSION[NotifVarName])) {
			
			$notifs = $_SESSION[NotifVarName];
			
			if($dismiss == true) unset( $_SESSION[NotifVarName] );
			
		}
		
		return $notifs;
		
	}
	
	public static function Filter($type) {
		
		$notifs = array();

		foreach($_SESSION[NotifVarName] as $notif) {
			if($notif['type'] == $type)
				array_push($notifs, $notif);
		}
		
		return $notifs;
		
	}
	
}