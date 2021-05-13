<?php
include 'config.php';

$artikkel_id = $_GET['artikkel_id'];
$bruker_id = $_GET['bruker_id'];
$bruker_navn = $_GET['bruker_navn'];
$kommentar = $_GET['kommentar'];

$sql = "INSERT INTO Kommentar (artikkel_id, bruker_id, bruker_navn, kommentar)
VALUES ($artikkel_id, $bruker_id, '$bruker_navn', '$kommentar');
UPDATE Artikkel SET antall_kmt = antall_kmt + 1 WHERE Artikkel_id = $artikkel_id;";
	if (mysqli_multi_query($link, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($link);
?>