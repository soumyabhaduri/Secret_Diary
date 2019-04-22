<?php
$servername = "localhost";
$username ="root";
$password ="";
$database="newdatabase";

$link=mysqli_connect($servername, $username, $password,$database);
if(mysqli_connect_error())
{
die("There is an error");
}
else
{
$query="select * from user";
if(mysqli_query($link, $query))
{
echo "Query successful";
}
}

?>