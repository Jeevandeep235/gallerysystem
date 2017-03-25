
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example of Bootstrap 3 Dropdowns within Buttons</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity=" sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

require_once("includes/init.php");
 ?>
 <?php
 $message="";
if(isset($_POST['submit'])){

  $photo = new Photo();
  $photo->title = $_POST['title'];
  $photo->set_file($_FILES['file_upload']);
  if($photo->save()){
    $message ="<h1>photo uploaded successfully</h1>";
  }
  else{
    $message=join("<br>",$photo->errors);
  }
}

?>

 <?php 
include ("includes/sidenav.php");

 ?>
  <div class="page-wrapper s" style="">
     <div class="container-fluid s">
         <div class="row">
           <div class="col-lg-12">
           <?php echo $message   ; ?>
               <h1 class="page-header" style="color: green;">
                  upload
                    <small>Subheading</small>
       
                </h1>
                    <ol class="breadcrumb">
                    <ol class="breadcrumb">
                      <li>
                       <i class="googleapis googleapis-dashboard"></i><a href="index.html"></a>
                       </li>
                       <li class="active">
                       <i class="googleapis googleapis-file"></i>
                       </li>
        
                    </ol>
      
              </div>
              <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                   <input type="text" name="title" class="form-control">
                  
                </div>
                 <div class="form-group">
                   <input type="file" name="file_upload" class="form-control">
                  
                </div>

                 
                   <input type="submit" name="submit" class="btn btn-primary">
                  
                
              </form>
    
             </div>
   
         </div>
   
  </div>



</body>
</html>                                   