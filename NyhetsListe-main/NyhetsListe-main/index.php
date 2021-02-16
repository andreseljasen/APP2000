<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
/* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} */


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    /> -->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />

    <title>NyhetsListe</title>
  </head>
  <body>
    <div class="container-fluid h-100">
      <div class="row controls-bar">
        <div class="col-2">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div>
              <div style="color: white">
                <img src="img/newspapers-logo.jpg" alt="logo" class="w-h-100" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="d-flex justify-content-around h-75px align-items-center">
            <div class="w-250 form-group">
              <label for="sortBy">Sorter</label>
              <select
                class="form-select form-select-sm form-control"
                aria-label=".form-select-sm example"
                placeholder="Sort By"
                id="sortBy"
              >
                <!-- <option selected>Sort By</option> -->
                <option value="1">Tidspunkt</option>
                <option value="2">Antall kommentarer</option>
                <option value="3">Placeholder</option>
              </select>
            </div>
            <div class="w-250 form-group">
              <label for="newspaper">Velg land</label>
              <select
                class="form-select form-select-sm form-control"
                aria-label=".form-select-sm example"
                id="newspaper"
              >
                <!-- <option selected>Select Newspaper</option> -->
                <option value="1">Norge</option>
                <option value="2">European Times</option>
                <option value="3">New York Times</option>
              </select>
            </div>
            <div class="w-250 form-group">
              <!-- <select
                class="form-select form-select-sm"
                aria-label=".form-select-sm example"
              >
                <option selected>Select Date</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select> -->
              <label for="selectDate">velg dato</label>
              <input id="selectDate" type="date" placeholder="Select Date" class="form-control"/>
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            handling
            </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register.php">Registrer</a>
                <a class="dropdown-item" href="logout.php">Logg av</a>
                <a class="dropdown-item" href="logout.php">detfunker</a>
                <a class="dropdown-item" href="#">Min side</a>
           </div>
          </div>
        </div>
      </div>
      <?php echo htmlspecialchars($_SESSION["username"]); ?>
    <?php include "php/artikkel.php"; ?>
    
      <div class="text-center pt-3">
        &copy; NyhetsListe Ltd.
      </div>
    </div>
  </body>
</html>
