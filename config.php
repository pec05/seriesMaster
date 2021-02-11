<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root'); //u835127795_admin
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'seriesmaster');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>