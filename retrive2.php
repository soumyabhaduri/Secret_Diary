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
$query="select *from user";
if($result=mysqli_query($link, $query))
{
$row=mysqli_fetch_array($result);
print_r($row);
echo "<br>Your name is:".$row['name'].' Bhaduri';
}
}

?>