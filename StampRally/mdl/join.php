<?php
	require 'dbconnect.phpt';
	require 'Skinny.php';
	
	$idm = $_POST[idm];
	$purpose = $_POST[purpose];
	$age = $_POST[age];
	$area = $_POST[gender];
	$visited = $_POST[visited];
	$out[path] = $_POST[path];
	
	$dbconnect = new DBConnect();
	
	if( $idm == null ){
		Skinny -> SkinnyDisplay( "error.html", $out );
		exit();
	}
	else if( checkUser() ){
		Skinny -> SkinnyDisplay( "already.html", $out );
		exit();
	}
	else {
		$dbconnect -> setUserData( $idm, $purpose, $age, $area, $gender, $visited );
		Skinny -> SkinnyDisplay( "success.html", $out );
	}
?>