<?php

$sql = "SELECT * FROM Kommentar WHERE artikkel_id = $artikkel_id ORDER BY tid_laget DESC";
$result = $link->query($sql);
mysqli_close($link);

$kommetarer = array();

while ($row = mysqli_fetch_object($result)) {
    $kommetarer[] = $row;
  }

json_encode($kommetarer);
foreach ($kommetarer as $kommentar) {
  $foreldre_id = $kommentar->foreldre_id;
  $bruker_navn = $kommentar->bruker_navn;
  $kommentar_innhold = $kommentar->kommentar;
  $tid_laget = $kommentar->tid_laget;

echo (
    "<div class='row pt-1 mt-3 pb-1 card bg-secondary' style='margin:auto; width:1200px;'>
    <p><b>$bruker_navn</b></p>
    <p>$kommentar_innhold</p>
    <p>$tid_laget</p>
    </div>"
);

}
?>