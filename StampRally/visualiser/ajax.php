<?php
 
/*$data = array();

$conn = mysqli_connect('localhost', 'root', '');

$db = mysqli_select_db($conn, 'stamprally');
 
$sql = " SELECT * FROM passage_time ORDER BY idm, time ";
$res = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_array($res)) {
    $data[] = $row;
}
 
mysqli_close($conn);
 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);*/

	require_once "../dbconnect.php";
	$dbConnect = new DBConnect();
	$raw = $dbConnect -> getAllUserData();
	
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($raw);
?>