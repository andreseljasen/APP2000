<?php 
$conn = new mysqli("itfag.usn.no", "h20DAT2000gr9", "paraply123", "h20DAT2000_dbgr9");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM Artikkel ORDER BY tidspunkt DESC LIMIT 20";
  $result = $conn->query($sql);


$artikler = array();

while($row =mysqli_fetch_object($result)) {
    $artikler[] = $row;
}

json_encode($artikler);
foreach($artikler as $artikkel) {
  $tittel = $artikkel->tittel;
  $beskrivelse = $artikkel->beskrivelse;
  $link = $artikkel->link;
  $tidspunkt = $artikkel->tidspunkt;
  $avis_navn = $artikkel->avis_navn;


  $html = file_get_contents($link);
preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i',$html, $matches ); 
 $bilde = $matches[1][0];


/*  $max = getimagesize($bilde);
  $max = $max[1];
   for ($i=1; $i < sizeof($matches); $i++) { 
    $bilde2 = $matches[1][$i];
    $max2 = getimagesize($bilde2);
    $max2 = $max2[1];
     if ($max2 > $max) {
      $max = $max2;
      $bilde = $bilde2;
     }
   } */
 

 /* echo("<div style='border-style: solid;'>
  <img src=$bilde style='height: 200px;'>
  <p>
  $AvisNavn<br>
  $Tittel<br>
  $Beskrivelse<br>
  $Tidspunkt<br>
  <a href ='$Link'>$Link</a>
  </p>
  </div>");
} */

echo("<div class='row pt-1 card' style='margin:auto; width:1200px;'>
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
        <a href='$link' target='_blank'>$link</a>
      </div>
  </div>
</div>
</div>
</div>");

} 
?>