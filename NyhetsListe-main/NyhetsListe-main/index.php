<?php
// Initialize the session
session_start();
//$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">

<<<<<<< HEAD
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/bootstrap.css" rel="stylesheet" />

  <title>NyhetsListe</title>
  <script src="js/lastInnFlere.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="row d-flex justify-content-center">
        <div class="col">
          <div class="d-flex justify-content-center align-items-center">
=======
    <title>NyhetsListe heihasia</title>
  </head>
  <body>
    <div class="container-fluid h-100">
      <div class="row controls-bar">
        <div class="col-2">
          <div class="d-flex justify-content-center align-items-center h-100">
>>>>>>> aaf6f4ecb9221c7eb8ddafa798edf515204cc47a
            <div>
              <div style="color: white">
                <img src="img/logo.svg" alt="logo" class="w-h-100" />
              </div>
            </div>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" form-group">
            <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" placeholder="Sort By" id="sortBy">
              <option value="1">Tidspunkt</option>
              <option value="2">Antall kommentarer</option>
              <option value="3">Placeholder</option>
            </select>
          </div>
        </div>
        <div class="col align-self-center">
          <div class="form-group">
            <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" id="newspaper">
              <option value="1">Norge</option>
              <option value="2">England</option>
              <option value="3">Amerika</option>
            </select>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" form-group">
            <input id="selectDate" type="date" placeholder="Select Date" class="form-control" />
          </div>
        </div>
        <div class="col align-self-center">
        <div class="form-group">
            <div class="dropdown">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                Handling
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register.php">Registrer</a>
                <a class="dropdown-item" href="logout.php">Logg av</a>
                <a class="dropdown-item" href="minside.php">Min side</a>
                <a class="dropdown-item" href="omOss.php">Om oss</a>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div>

    <div id="artikler">
    </div>

    <div class="text-center pt-2">
      <button type="button" class="btn btn-primary" id="lastInnFlere" name="lastInnFlere" onclick="lastInnFlere()">Last inn flere</button>
    </div>

    <div class="text-center pt-3">
      &copy; NyhetsListe Ltd.
    </div>
  </div>

  <script type="text/javascript">
    //sjekker om Session variable for bruker_id eksisterer, evt setter bruker_id i javascript til det.
    var op = <?PHP echo (!empty($_SESSION['bruker_id']) ? json_encode($_SESSION['bruker_id']) : '""'); ?>
    
    if (op) {
      var bruker_id = op;
      document.cookie = "bruker_id=" + bruker_id;
    } else {
      document.cookie = "bruker_id=" + "";
    };
  </script>
  <script src="js/lagreArtikkel.js"></script>
  <script src="js/slettArtikkel.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>