<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example of Bootstrap 3 Dropdowns within Buttons</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body>
<?php  
require_once("includes/init.php");
 ?>
 
 <?php

  if($session->is_signed_in()){
  	redirect("index.php");
  }

  if(isset($_POST['submit'])){
  	$username=trim($_POST['username']);
  	$password=trim($_POST['password']);


  	// match to check database user

    $user_found=User::verify_user($username,$password);


  	if($user_found){
  		$session->login($user_found);
  		redirect("index.php");
  	}
  	else{
  		$the_message="your password or username are incorrect";
  	}
  }
  	else{
      $the_message="";
  		$username="";
  		$password="";
  	}
  




  ?>


<div class="col-md-4 col-md-offset-4">
<h2><?php echo $the_message;  ?></h2>
<form action="" method="post">

<div class="form-group">
<label for="username">username</label>
<input type="text" class="form-control" name="username" value=" <?php htmlentities($username) ?>">
  
</div>
<div class="form-group">
<label for="password">password</label>
<input type="text" class="form-control" name="password" value="<?php htmlentities($password) ?>">
  
</div>

<div class="form-group">

<input type="submit" class="btn btn-primary" name="submit"  value="submit">
  
</div>




  
</form>
  
</div>


</body>
</html>





