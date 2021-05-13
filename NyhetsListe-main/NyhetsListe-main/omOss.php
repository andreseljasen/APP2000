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
    <title>Om oss</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Informasjon om oss</b></h1>
    </div>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
    Vestibulum mattis pulvinar odio quis dapibus.<br>
    Sed commodo, sapien vitae tristique commodo, ligula dui volutpat magna, sed blandit orci nisl sit amet diam.<br>
    Integer sit amet justo ligula. Donec finibus nisl maximus lorem vestibulum congue.<br>
    Phasellus a purus ut nisl tristique rutrum id eget urna. Nam sodales fringilla lorem, et dictum enim efficitur a.<br>
    Vivamus felis sem, accumsan in libero sed, placerat sagittis diam.<br>
    Fusce quis lacinia urna, id maximus ante. Vestibulum diam lacus, mattis at viverra quis, dictum suscipit massa.<br>
    Mauris finibus mollis vulputate. Donec eget porttitor ex. Cras risus sapien, pellentesque in convallis vitae, vulputate vel tellus.<br> 
    </p>

    <p>
    Maecenas semper non felis ac pellentesque. Quisque porttitor fringilla justo, non gravida justo rutrum ac. Aenean orci enim, congue vitae dolor sodales, viverra ullamcorper ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis ultricies urna. Ut ultricies felis dictum metus fringilla malesuada. Quisque viverra accumsan laoreet. Ut laoreet tortor sit amet ante laoreet, ut ornare dui rutrum. Aenean eu sagittis ante. Nulla placerat massa quis tristique ultrices. Duis eu ligula mollis, rhoncus nibh in, volutpat ante. Phasellus et lobortis dui, at tincidunt felis. Mauris arcu ante, dictum vitae nulla sit amet, ullamcorper tempor odio. 
    </p>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>