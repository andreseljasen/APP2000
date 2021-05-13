<?php
define('DB_SERVER', 'itfag.usn.no');
define('DB_USERNAME', 'h20DAT2000gr9');
define('DB_PASSWORD', 'paraply123');
define('DB_NAME', 'h20DAT2000_dbgr9');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>