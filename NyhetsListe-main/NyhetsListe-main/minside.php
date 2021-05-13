<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Min side</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <style type="text/css">
        #top{ font: 14px sans-serif; text-align: center; }
    </style>
    <script src="js/lastInnFlere.js"></script>
</head>
<body>
<div id=top>
    <div class="page-header">
        <h1>Hallo, <b><?php echo htmlspecialchars($_SESSION["brukernavn"]); ?></b></h1>
        <h1>ID: <b><?php echo $_SESSION["bruker_id"]; ?></b></h1>
    </div>
    <p>
        <a href="index.php" class="btn btn-primary">Hjem</a>
        <a href="reset-password.php" class="btn btn-warning">Reset passord</a>
        <a href="logout.php" class="btn btn-danger">Logg av</a>
    </p>
</div>
    <div id="artikler"></div>
    <div class="text-center pt-2">
      <button type="button" class="btn btn-primary" id="lastInnFlere" name="lastInnFlere" onclick="lastInnFlere()">Last inn flere</button>
    </div>
<script type="text/javascript">        
    var bruker_id = <?php echo $_SESSION['bruker_id']; ?>;
    document.cookie="bruker_id="+bruker_id;
</script>
<script src="js/lagreArtikkel.js"></script>
<script src="js/slettArtikkel.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>