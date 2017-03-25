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
  .admin-photo-thumbnail{
    width: 200px;
    border-radius:5px;
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
$photos = Photo::find_all_users();

?>

  <div class="page-wrapper s" style="">
     <div class="container-fluid s">
         <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header" style="color: green;">
                  photo
                    <small>Subheading</small>
       
                </h1>
                <div class="col-md-12">

                  <table class="table table-hover">
                    <thead>
                      <th>Photo</th>
                      <th>Id</th>
                      <th>FileName</th>
                      <th>title</th>
                      <th>size</th>
                      <th>Link</th>
                    </thead>
                  

                    <tbody>
                         <?php foreach($photos as $photo):

                    ?>
            
                      <tr>
                      <td><img class="admin-photo-thumbnail" src= "<?php echo $photo->picture_path(); ?>" alt="">
                      <div class="action_link">
                      <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                      <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                      <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                        
                      </div></td>

                      <td><?php echo $photo->id; ?></td>
                      <td><?php echo $photo->filename; ?></td>
                      <td><?php echo $photo->title; ?></td>
                      <td><?php echo $photo->size; ?></td>
                      <td>
                      <a href="comment_photo.php?id=<?php echo $photo->id; ?>">
                      <?php $comments = Comment::find_the_comments($photo->id);

                          echo count($comments);

                       ?></a></td>
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