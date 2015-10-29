<?php
	// Loadindg File
	include_once "../Skinny.php";
	include_once "./dbconnect.php";
	
	// Get parameter
	$param = $_GET['point'];
	
	// New Connection Database
	$dbConnect = new DBConnect();

	// Get Check-point data
	$raw = $dbConnect -> getPointData( $param );
	// $out['sign'] = $raw['sign'];
	// $out['name'] = $raw['name'];
	// $out['point'] = $raw['point'];
	
	$Skinny -> SkinnyDisplay( "./Check-Point-Temp.html", $raw );
?>