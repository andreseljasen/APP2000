<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "php/config.php";
 
// Define variables and initialize with empty values
$bruker_navn = $passord = "";
$bruker_navn_err = $passord_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $bruker_navn_err = "Skriv in brukernavn.";
    } else{
        $bruker_navn = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $passord_err = "Skriv inn passord.";
    } else{
        $passord = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($bruker_navn_err) && empty($passord_err)){
        // Prepare a select statement
        $sql = "SELECT bruker_id, bruker_navn, passord FROM Bruker WHERE bruker_navn = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_bruker_navn);
            
            // Set parameters
            $param_bruker_navn = $bruker_navn;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $bruker_id, $bruker_navn, $hashed_passord);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($passord, $hashed_passord)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["bruker_id"] = $bruker_id;
                            $_SESSION["brukernavn"] = $bruker_navn;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $passord_err = "Passordet er ikke gyldig.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Ingen bruker med dette brukernavnet.";
                }
            } else{
                echo "Oops! Noe gikk feil. Prøv igjen senere.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Fyll inn login informasjon.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($bruker_navn_err)) ? 'has-error' : ''; ?>">
                <label>Brukernavn</label>
                <input type="text" name="username" class="form-control" value="<?php echo $bruker_navn; ?>">
                <span class="help-block"><?php echo $bruker_navn_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($passord_err)) ? 'has-error' : ''; ?>">
                <label>Passord</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $passord_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Har du ikke bruker? <a href="register.php">Registrer deg</a>.</p>
        </form>
    </div>    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>