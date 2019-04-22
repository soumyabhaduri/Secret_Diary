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

//$query="INSERT INTO student (name, roll) VALUES ('r',21)";
//$query="INSERT INTO user (name) VALUES ('rohan')";
$query="update user set name='king' where name='bhaduri' limit 1";
//limit 1 means update only one row extra security
if(!mysqli_query($link,$query))
	echo "error";
}

?>