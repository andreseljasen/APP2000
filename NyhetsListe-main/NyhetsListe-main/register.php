<?php
// Include config file
require_once "php/config.php";
 
// Define variables and initialize with empty values
$bruker_navn = $passord = $confirm_passord = "";
$bruker_navn_err = $passord_err = $confirm_passord_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["bruker_navn"]))){
        $bruker_navn_err = "Skriv inn brukernavn.";
    } else{
        // Prepare a select statement
        $sql = "SELECT bruker_id FROM Bruker WHERE bruker_navn = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_bruker_navn);
            
            // Set parameters
            $param_bruker_navn = trim($_POST["bruker_navn"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $bruker_navn_err = "Brukernavnet er tatt.";
                } else{
                    $bruker_navn = trim($_POST["bruker_navn"]);
                }
            } else{
                echo "Oops! Noe gikk feil. Prøv igjen senere.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["passord"]))){
        $passord_err = "Skriv inn passord.";     
    } elseif(strlen(trim($_POST["passord"])) < 6){
        $passord_err = "Passordet må ha minst 6 tegn.";
    } else{
        $passord = trim($_POST["passord"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_passord"]))){
        $confirm_passord_err = "Bekreft passordet.";     
    } else{
        $confirm_passord = trim($_POST["confirm_passord"]);
        if(empty($passord_err) && ($passord != $confirm_passord)){
            $confirm_passord_err = "Passordet matcher ikke.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($bruker_navn_err) && empty($passord_err) && empty($confirm_passord_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Bruker (bruker_navn, passord) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_bruker_navn, $param_passord);
            
            // Set parameters
            $param_bruker_navn = $bruker_navn;
            $param_passord = password_hash($passord, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Noe gikk feil. Prøv igjen senere.";
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
    <title>Registrer deg</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Registrer deg</h2>
        <p>Fyll ut formen</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="register_form">
            <div class="form-group <?php echo (!empty($bruker_navn_err)) ? 'has-error' : ''; ?>">
                <label>Brukernavn</label>
                <input type="text" name="bruker_navn" class="form-control" value="<?php echo $bruker_navn; ?>">
                <span class="help-block"><?php echo $bruker_navn_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($passord_err)) ? 'has-error' : ''; ?>">
                <label>Passord</label>
                <input type="password" name="passord" class="form-control" value="<?php echo $passord; ?>">
                <span class="help-block"><?php echo $passord_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_passord_err)) ? 'has-error' : ''; ?>">
                <label>Bekreft Passord</label>
                <input type="password" name="confirm_passord" class="form-control" value="<?php echo $confirm_passord; ?>">
                <span class="help-block"><?php echo $confirm_passord_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset" onclick ='document.getElementById("register_form").reset()'>
            </div>
            <p>Har bruker allerede? <a href="login.php">Login her</a>.</p>
        </form>
    </div>  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
</body>
</html>