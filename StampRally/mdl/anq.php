<?php
	require 'dbconnect.php';
	require 'Skinny.php';
	
	$idm = $_POST[idm];
	$tmp[path] = $_POST[path];
	$dbconnect = new DBConnect();
	
	if($idm == null){
		$Skinny -> SkinnyDisplay("error.html", $tmp);
		exit();
	} 
	else if(!($dbconnect -> checkUser($idm))){
		$Skinny -> SkinnyDisplay("no_account.html", $tmp);
	}
	else{
		$idm = $_POST[idm];
		$rate = $_POST[rate];
		$clean = $_POST[clean];
		$comprehensive = $_POST[comprehensibility];
		$point = $_POST[point];
		$dbconnect -> setAnqData( $idm, $point, $rate, $clean, $comprehensive );
		
		$out = $_POST[path];
		$Skinny -> SkinnyDisplay("success.html", $out);
	}
?>