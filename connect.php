<?php

$servername = "localhost";
$username ="root";
$password ="";
$database="newdatabase";

mysqli_connect($servername, $username, $password,$database);
if(mysqli_connect_error())
echo "There is an error";
else
echo "Connection Successful";

?>