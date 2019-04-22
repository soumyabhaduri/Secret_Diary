<?php


$servername = "localhost";
$username ="root";
$password ="";
$database="newdatabase";

if(array_key_exists('email',$_POST)or array_key_exists('password',$_POST))
{
$link=mysqli_connect($servername, $username, $password,$database);
if(mysqli_connect_error())
{
die("There is an error");
}
		 

	if($_POST['email'] == '')
		echo "<p>Email address is required</p>";
	else if($_POST['password'] == '')
		echo "<p>Password is required</p>";
	else{
		$query="select * from signup where email='".mysqli_real_escape_string($link,$_POST['email'])."'";
		$result=mysqli_query($link, $query);
		if(mysqli_num_rows($result)>0)
         echo "<p>Email address has already been taken</p>";
	 else
	 {
		 $query="INSERT INTO `signup` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
         if(mysqli_query($link,$query))
			 echo "<p>You have been signed up!!</p>";
		 else
			 echo "<p>Problem,Please try again later!!</p>";
	 }
	}
}
?>
<form method="post">
<input type="text" name="email" placeholder="Email">
<input type="password" name="password" id="pwd" placeholder="password">
<input type="submit" value="Sign up">
</form>
