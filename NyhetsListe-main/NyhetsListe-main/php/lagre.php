<?php
include 'config.php';
$bruker_id = $_GET['bruker_id'];
$artikkel_id = $_GET['artikkel_id'];


$sql = "INSERT INTO LagretArtikkel (bruker_id, artikkel_id)
VALUES ($bruker_id, $artikkel_id)";
	if (mysqli_query($link, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($link);
?>