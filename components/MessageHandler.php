<?php

namespace Robust;

# depends on:
#   - SessionHandler

class MessageHandler {
	
	public static function GetAll($type='all') {
		
		switch($type) {
			case 'error':
			
				break;
			case 'warning':
			
				break;
			case 'info':
				
				break;
			case 'success':
			
				break;
			case 'all':
			default:
				return $_SESSION['messages'];
				break;
				
		}
		
	}
	
	public static function ShowLast($number=1) {
		
	}
	
	public static function Save($message, $type = 'info', $id = null) {
		
		if(!isset($_SESSION['messages'])) $_SESSION['messages'] = array();
		
		if($id == null) $id = uniqid();
		
		array_push($_SESSION['messages'], array('message' => $message, 'type' => $type, 'id'=>$id));
		
	}
	
}