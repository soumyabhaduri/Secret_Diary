<?php
session_start();
if(array_key_exists("email",$_COOKIE))
{
	$_SESSION['email']=$_COOKIE['email'];
}

else
{
	//header("Location: diary1.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Secret Diary</title>
	
	<style type="text/CSS">
.jumbotron{background-image:url(ppj.jpg);background-size: cover;}
#but{margin:10px auto}
</style>
 </head>
  <body class="jumbotron">
    
    <form class="container-fluid" method='post' action='
    dodo.php'> 
    <h1>Wanna See the previous contents and to save this present content then click the Save button below"</h1> 
    <textarea id="diary" class="form-control" rows=10 cols=80 name="diary">

    </textarea>
	<button type="submit"  id="but" class="btn btn-warning">Save</button>
    
    </form>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>