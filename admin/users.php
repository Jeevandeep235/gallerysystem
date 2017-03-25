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
<style type="text/css">
 .nav li,.sp, .bs-example{
      margin: 10px;
      color: white;
    }
     .d{
        margin-top: 10px;
        padding-bottom:  20px;

    }
    .d a{
        color: white;
    }
    .s{
        width: 1000px;
          float: left;
    background: white;
    margin-top: 50px;
    margin-left: 40px;
    
  
  
  }
  .user_image{
    width: 62px;
    height: 62px;
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
$users = User::find_all_users();

?>

  <div class="page-wrapper s" style="">
     <div class="container-fluid s">
         <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header" style="color: green;">
                  users
                    
       
                </h1>
                <a href="add_user.php" class="btn btn-primary">Add User</a>
                <div class="col-md-12">

                  <table class="table table-hover">
                    <thead>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>UserName</th>
                      <th>firstName</th>
                      <th>lastName</th>
                    </thead>
                  

                    <tbody>
                         <?php foreach($users as $user):

                    ?>
            
                      <tr>
                      <td><?php echo $user->id; ?></td>

                      <td><img class="user_image"  src= "<?php   echo $user->image_path_and_placeholder(); ?>" alt=""></td>
                      <td><?php echo $user->username; ?>
                      <div class="action_link">
                      <a href="delete_users.php?id=<?php echo $user->id; ?>">Delete</a>
                      <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                      
                        
                      </div></td>

                      
                      <td><?php echo $user->first_name; ?></td>
                      <td><?php echo $user->last_name; ?></td>
                      </tr>
                     <?php endforeach; ?> 
                    </tbody>
                  </table>
                </div>
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