<?php

class Dispatcher
{
	public function dispatch()
	{
		require_once "dispatch-point.php";
		
		$params = $_GET['page'];
		
		switch( $params ){
			case 'check-point':
				$controllerInstance = new CheckPointController();
				break;
			default:
				$controllerInstance = new IndexController();
				break;
		}
		
		$controllerInstance -> action();
	}
}
?>