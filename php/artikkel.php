<?php
include 'config.php';

$counter = $_COOKIE['counter'];

$sql = "SELECT * FROM Artikkel ORDER BY tidspunkt DESC LIMIT $counter, 20";
$result = $link->query($sql);
//mysqli_close($link);

$artikler = array();

while ($row = mysqli_fetch_object($result)) {
  $artikler[] = $row;
}

json_encode($artikler);
foreach ($artikler as $artikkel) {
  $tittel = $artikkel->tittel;
  $beskrivelse = $artikkel->beskrivelse;
  $lenke = $artikkel->link;
  $tidspunkt = $artikkel->tidspunkt;
  $avis_navn = $artikkel->avis_navn;
  $bilde = $artikkel->bilde;
  $id = $artikkel->artikkel_id;
  $antall_kmt = $artikkel->antall_kmt;

   
  $bruker_id = $_COOKIE['bruker_id'];
  if ($bruker_id != "") {
  $lagretSjekk = $link->query("SELECT * FROM LagretArtikkel WHERE bruker_id=$bruker_id AND artikkel_id='$id'");

  if ($lagretSjekk->num_rows == 0) {
   $slettLagreKnapp = "<button type='button' name='btn_lagre' id='btn_lagre_$id' class='btn btn-outline-success' onclick='lagreArtikkel($id)'>Lagre</button>";
  } else {
    $slettLagreKnapp = "<button type='button' name='btn_slett' id='btn_slett_$id' class='btn btn-outline-danger' onclick='slettArtikkel($id)'>Slett</button>";
  } 
  } else {
    $slettLagreKnapp = "";
  }


  echo ("<div class='row pt-1 card' style='margin:auto; width:1200px;'>
<div class='d-flex'>
<div class='bg_img' style='background-image: url($bilde);';>
<img class='w-h-200' src=$bilde style='visibility: hidden;' />
</div>
  <div class='block'>
    <div class='p-4'>
      <div>
        <p>$avis_navn</p>
        <strong>
          $tittel
        </strong>
        <p>$beskrivelse</p>
      </div>
      <div class='pt-3'>$tidspunkt</div>
      <div class='pt-2'>
        Link:
        <a href='$lenke' target='_blank'>$lenke</a>
      </div>
      <div class='pt-3 d-flex'>
        $slettLagreKnapp
        <form action='kommenter.php?artikkelid=$id' method='POST'>
          <button type='submit' name='btn_kommenter' id='btn_kommenter_$id' class='btn btn-outline-primary' value='$id'>$antall_kmt Kommentarer</button>
        </form>
    </div>
  </div>
</div>
</div>
</div>");
}
mysqli_close($link);
?>