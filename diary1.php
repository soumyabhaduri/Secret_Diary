<?php
session_start();
$servername = "localhost";
$username ="root";
$password ="";
$database="diary";
$error="";
if(array_key_exists("Logout",$_GET))
{
	
	
	unset($_SESSION);
	setcookie("email","",time() - 60*60);
	$_COOKIE["email"]="";
	
	
}
else if(array_key_exists("email",$_SESSION)or array_key_exists("email",$_COOKIE))
{
	//header("Location: propart.php");
}
if(array_key_exists('submit',$_POST))
{
$link=mysqli_connect($servername, $username, $password,$database);
if(mysqli_connect_error())
{
die("There is an error");
}

if(!$_POST['email'])
	$error .="An email address is required.<br>";
if(!$_POST['password'])
	$error .="A password is required.<br>";
if($error != "")
	$error="<p>There were error(s) in your form</p>".$error;

else
{
	 
		 if($_POST['signup']=='1')
		 { 
	     $query="select * from user where email='".mysqli_real_escape_string($link,$_POST['email'])."' limit 1";
		$result=mysqli_query($link, $query);
		if(mysqli_num_rows($result)>0)
         echo "<p>Email address has already been taken</p>";
	     else
	    {
		  $query="INSERT INTO `user` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
          if(mysqli_query($link,$query))
		  {
			 $query="update user set password='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."'where id=".mysqli_insert_id($link)." limit 1";
			 $_SESSION['email']=mysqli_insert_id($link);
			 if($_POST['stayLoggedIn']=='1')
			 {
				 setcookie("email",mysqli_insert_id($link),time +60 +60*24 +365);
			 }
			 header("Location: propart.php");
			 
			 echo "<p>You have been signed up!!</p>";
		     
		 }
		 else
			 echo "<p>Problem,Please try again later!!</p>";
	 }
		 }
	else {
             $query = "SELECT email,password FROM `user` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
					
                
                    if (isset($row)) {
                        
                        $hashedPassword = $_POST['password'];
                        
                        if ($hashedPassword == $row['password']) {
                            $row['password']=$row['password'];
                            $_SESSION['email'] = $row['email'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                setcookie("email", $row['email'], time() + 60*60*24*365);

                            } 

                            header("Location: propart.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
                    
                }
                }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Hello, world!</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<style type="text/CSS">
.jumbotron{background-image:url(ppj.jpg);background-size: cover;}
.container{text-align:center;width:400px ;top:150px;}
#log{display:none}
body{color:#FFF}
u{color:blue;font-weight:bold}
#diary{}
</style>
  </head>
  <body class="jumbotron">

 
  <div class="container">
  
    <h1 class="display-4">Secret Diary</h1>
	<br>
	<p>
	<strong>Store your thoughts permanently and securely.</strong>
	</p>
	<p>
	Interested?Sign Up now</p>
	
<form method="POST" id="sign">
<div class="form-group">
<input type ="text" class="form-control" name="email" placeholder="Email"></div>
<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="password"></div>

<div class="checkbox">
<label>

<input type="checkbox"  name="Stayloggedin" value="1">
Stay Logged In
</label></div>

<div class="form-group">
<input type="hidden"  name="signup" value="1">
<input type="submit" class="btn btn-success" class="form-control" name="submit" value="Sign up!"></div>

<p><a id="change"><u>Log In</u></a></p>

</form>



<form method="POST" id="log">
<p>Log In your username and password</p>
<div class="form-group">
<input type ="text" class="form-control" name="email" placeholder="Email"></div>
<div class="form-group">
<input type="password" class="form-control"name="password" placeholder="password"></div>

<div class="checkbox">
<label>
<input type="checkbox"  name="Stayloggedin" value="1">Stay Logged In
</label></div>
<div class="form-group">
<input type="hidden"  name="signup" value="0">
<input type="submit"  class="btn btn-success"  class="form-control" name="submit" value="Log In!"></div>

<p><a id="chan"><u>Sign Up</u></a></p>

</form>
<div id="errro"><?php echo $error; ?></div>

</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/dojo/1.13.0/dojo/dojo.js"></script>
	 <script type="text/javascript">
     
        $("#change").click(function() {
            
            $("#log").toggle();
            $("#sign").toggle();
            
            
        }); 
		
		
        $("#chan").click(function() {
            
            $("#log").toggle();
            $("#sign").toggle();
             
            
        }); 
     
	   
		  

      </script>
	
	
	 
	</body>
</html>
