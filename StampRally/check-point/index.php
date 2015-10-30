<?php
	// Skinnyの呼び出し、各コントローラーへの実装し直しを行う予定
	include_once( "../Skinny.php" );
	require_once "./dispatcher.php";
	
	$dispatcher = new Dispatcher();
	$dispathcer -> dispatch();
?>