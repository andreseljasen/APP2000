<?php
include 'config.php';
$bruker_id = $_GET['bruker_id'];
$artikkel_id = $_GET['artikkel_id'];


$sql = "DELETE FROM LagretArtikkel WHERE bruker_id=$bruker_id AND artikkel_id=$artikkel_id";
	if (mysqli_query($link, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($link);
?>