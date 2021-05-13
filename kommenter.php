<?php
// Initialize the session
session_start();
//$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <title>Kommenter</title>
  </head>
  <body>
  
  <a href="index.php" class="btn btn-primary align-center">Hjem</a>
  <?php
include 'php/config.php';
$artikkel_id = $_GET['artikkelid'];
$sql = "SELECT * FROM Artikkel WHERE artikkel_id = $artikkel_id";
$result = $link->query($sql);
//mysqli_close($link);
while ($row = mysqli_fetch_object($result)) {
    $artikkel[] = $row;
  }
  json_encode($artikkel);
  foreach ($artikkel as $artikkel) {
    $tittel = $artikkel->tittel;
    $beskrivelse = $artikkel->beskrivelse;
    $lenke = $artikkel->link;
    $tidspunkt = $artikkel->tidspunkt;
    $avis_navn = $artikkel->avis_navn;
    $bilde = $artikkel->bilde;
    $id = $artikkel->artikkel_id;

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
      </div>
    </div>
  </div>
  </div>
  </div>"); 
}
//mysqli_close($link);
  ?>
  <div class='row pt-1 mt-3 pb-1 card bg-secondary' style='margin:auto; width:1200px;'>
<form id="kommentar_form">
  <label for="kommentar">Kommenter:</label><br>
  <textarea rows="4" cols="152" name="comment" id="kommentar"></textarea>
  <input type="button" value="Submit" onclick="kommenter()">
</form>
  </div>

<div id="kommentarer" class="pb-4">
<?php include 'php/hentKommentarer.php'; ?>
</div>


<script type="text/javascript">
//skjekker om Session variable for bruker_id eksisterer, evt setter bruker_id i javascript til det.
var op = <?PHP echo (!empty($_SESSION['bruker_id']) ? json_encode($_SESSION['bruker_id']) : '""'); ?> 

if(op){
  var bruker_id = op;
  var bruker_navn = "<?php echo $_SESSION['brukernavn'] ?>";

  document.cookie="bruker_id="+bruker_id;
  document.cookie="bruker_navn="+bruker_navn;
} else {
  document.cookie="bruker_id="+"";
}
</script>
<script src="js/kommenter.js"></script>
<script src="js/lagreArtikkel.js"></script>
<script src="js/slettArtikkel.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>