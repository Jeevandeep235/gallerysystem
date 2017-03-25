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

<script src="http://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script type="text/javascript" src="script.js"></script>
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
 if(!$session->is_signed_in()) { redirect("login.php");}?>
                     <?php
if(empty($_GET['id'])){
  redirect("photos.php");
}
else{
  $photo=Photo::find_user_by_id($_GET['id']);

if(isset($_POST['update'])){
  if($photo){
     $photo->title = $_POST['title'];
    $photo->caption = $_POST['caption'];
     $photo->description= $_POST['description'];
    $photo->alternate_text=  $_POST['alternate_text'];
    $photo->save();

  }
}
}
 ?>







  <div class="page-wrapper s" style="">
     <div class="container-fluid s">
         <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header" style="color: green;">
                  photo
                    <small>Subheading</small>
       
                </h1>
                <form action="" method="post">
                <div class="col-md-8">
                  <div class="form-group">
                          <label for="caption">title</label>
                      <input type="text" name="title" class="form-control" value="<?php echo  $photo->title; ?>" >
                    </div>
                    <div class="form-group">
                          <label for="caption">Caption</label>
                      <input type="text" name="caption" class="form-control" value="<?php echo  $photo->caption; ?>" >
                    </div>
                    <div class="form-group">
                     <a href="#" class="thumbnail"><img src="<?php echo  $photo->picture_path(); ?>"></a>
                    </div>

                    <div class="form-group">
                        <label for="caption">Alternate Text</label>
                      <input type="text" name="alternate_text" class="form-control" value="<?php echo  $photo->alternate_text; ?>">
                    </div>

                    <div class="form-group">
                        <label for="caption">Description</label>
                      <textarea class="form-control" name="description" id="" cols="30" rows="10" ><?php echo  $photo->description; ?></textarea>
                  
                    </div>
                  
                </div>

                <div class="col-md-4">
                  <div class="photo-info-box">
                     <div class="info-box-header">
                      <h4>Save<span id="toggle" class=" glyphicon glyphicon-menu-up pull-right"></span></h4>
                      </div>
                  <div class="inside">
                    <div class="box-inner">
                      <p class="text">
                        <span class="glyphicon glyphicon-calender"></span>Upload on April 22,2030 @ 5:26
                      </p>
                      <p class="text">
                        Photo Id:<span class="data photo_id_box">34</span>
                        
                      </p>
                      <p class="text">
                        FileName: <span class="data">image.jpg</span>
                      </p>
                      <p class="text">
                        FileType: <span class="data">JPG</span>
                      </p>
                      <p class="text">
                      FileSize: <span class="data">33245345</span>
                      </p>

                    </div>
                    <div class="info-box-footer clearfix">
                      <div class="info-box-delete pull-left">
                         <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg">Delete</a>
                      </div>
                      <div class="info-box-update pull-right">
                         <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">
                      </div>
                    </div>    
                   </div>
                    
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