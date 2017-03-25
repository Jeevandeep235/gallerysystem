<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example of Bootstrap 3 Dropdowns within Buttons</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<style type="text/css">
  .thumbnail{
    width: 200px;
    border-radius: 5px;
  }
</style>
</head>

<body style="background: black;">

 <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Visit home page</a>
        </div>

<?php 
include ("includes/header.php");

 ?>
 <?php 
include ("includes/sidenav.php");

 ?>
  <?php 

require_once("includes/init.php");
 ?>
 <?php 

$user = new User();
 if(isset($_POST['create'])){

$user->username=$_POST['username'];
 $user->first_name=$_POST['firstname'];
 $user->last_name=$_POST['lastname'];
 $user->password=$_POST['password'];
 $user->set_file($_FILES['userimage']);
 $user->save_user_and_image();

 }
 ?>







  <div class="page-wrapper s" style="">
     <div class="container-fluid s">
         <div class="row">
           <div class="col-md-8">
               <h1 class="page-header" style="color: green;">
                  user
                    <small>Subheading</small>
       
                </h1>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-8">

                 <div class="form-group">

                      
                      <input type="file" name="userimage">
                    </div>

                  <div class="form-group">

                          <label for="username">username</label>
                      <input type="text" name="username" class="form-control" >
                    </div>
                    <div class="form-group">
                          <label for="firstname">firstname</label>
                      <input type="text" name="firstname" class="form-control"  >
                    </div>
                   

                    <div class="form-group">
                        <label for="Lastname">Lastname</label>
                      <input type="text" name="lastname" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="Password"></label>
                        <input type="submit" name="create" class="btn btn-primary pull-right">
                    </div>




                  
                </div>

                
               </form> 
                    <ol class="breadcrumb">
                    <ol class="breadcrumb">
                      <li>
                       <i class="googleapis googleapis-dashboard"></i><a href="index.html">Dashboard</a>
                          </li>
                       <li class="active">
                       <i class="googleapis googleapis-file"></i>Blank Page
                       </li>
        
                    </ol>
                </div>
    
             </div>
   
         </div>
   
  </div>


</body>
</html>                                   