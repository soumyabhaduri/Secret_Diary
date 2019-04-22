<?php
session_start();
if($_SESSION['email'])
	echo "You have logged in!!";
else
	header("Loacation: session1.php");
?>