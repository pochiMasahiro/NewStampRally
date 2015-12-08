<?php
	require 'dbconnect.php';
	require 'Skinny.php';
	
	$idm = $_POST[idm];
	$dbconnect = new DBConnect();
	
	if($idm == null){
		Skinny -> SkinnyDisplay("error.html", $_POST[point]);
		exit();
	} 
	else if(checkUser($idm)){
		Skinny -> SkinnyDisplay("no_account.html", $_POST[point]);
	}
	else{
		$idm = $_POST[idm];
		$purpose = $_POST[purpose];
		$age = $_POST[age];
		$area = $_POST[area];
		$gender = $_POST[gender];
		$visited = $_POST[visited];
		$dbconnect = new DBConnect();
		$dbConnect -> setAnqData( $idm, $purpose, $age, $area, $gender, $visited );
		Skinny -> SkinnyDisplay("success.html", $_POST[point]);
	}
?>