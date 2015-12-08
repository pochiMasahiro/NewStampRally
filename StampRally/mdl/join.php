<?php
	require 'dbconnect.php';
	require 'Skinny.php';
	
	$idm = $_POST[idm];
	$purpose = $_POST[purpose];
	$age = $_POST[age];
	$gender = $_POST[gender];
	$area = $_POST[area];
	$visited = $_POST[times];
	$out[path] = $_POST[path];
	
	$dbconnect = new DBConnect();
	
	if( $idm == null ){
		$Skinny -> SkinnyDisplay( "error.html", $out );
		exit();
	}
	else if( $dbconnect -> checkUser( $idm ) ){
		$Skinny -> SkinnyDisplay( "already.html", $out );
		exit();
	}
	else {
		$dbconnect -> setUserData( $idm, $purpose, $age, $area, $gender, $visited );
		$Skinny -> SkinnyDisplay( "success.html", $out );
	}
?>