<?php
session_start();
$servername ="localhost";
$username ="root";
$password ="";
$database="diary";
	   
 if(mysqli_connect_error())
{
       die("There is an error");
}

        $link=mysqli_connect($servername, $username, $password,$database);
		$email = mysqli_real_escape_string($link,$_SESSION['email']);
		$diary = mysqli_real_escape_string($link,$_POST['diary']);
        // var_dump($email);
	    // $q2=mysqli_real_escape_string($link,$_POST['diary']);
        $query = "UPDATE user SET diary='$diary' WHERE email= '$email'";
        $query1=mysqli_query($link,"select diary from user where email='$email'");
        while ($row = $query1->fetch_assoc()) {
          echo $row['diary']."<br>";
        }
		mysqli_query($link, $query);
        if(array_key_exists("email",$_SESSION))
        {
	     echo "<p>Logged In! <a href='diary1.php?Logout=1'>Log out</a></p>";
	     session_destroy();
   
	    }
//CONCAT('test',col);
?>
<html>
<head><style type="text/CSS">
.jumbotron{background-image:url(ppj.jpg);background-size: cover;}
</style></head>
<body class="jumbotron">
</body></html>