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
    .std{
      f
      width: 300px;
      height: 200px;
      border: 1px solid lightgreen;
      border-radius: 10px;
    
      background: silver;
      
    }
   
  
  </style>

</head>

<body>
<?php
//require_once("admin/includes/init.php");
 require_once("admin/includes/init.php");
require_once("admin/includes/photo.php");
require_once("admin/includes/comment.php");

$photo = Photo::find_user_by_id($_GET['id']);
if(empty($_GET['id'])){
  redirect('index.php');
}
//echo $photo->title;
if(isset($_POST['submit'])){
  $author=trim($_POST['author']);
  $body=trim($_POST['body']);

  $new_comment=Comment::create_comment($photo->id ,$author,$body);
    if($new_comment && $new_comment->save()){
    redirect("photo.php?id={$photo->id}");

}
else{
  $message="There was some problem solveing";
}
}
else{
$author="";
$body="";
}

$comments=Comment::find_the_comments($photo->id);


?>
<?php 

include("include/header.php");

?>

<div class="col-lg-12">
<h1><?php echo $photo->title ?></h1>
  <p class="lead">
  by <a href="#">Jeevan</a>
    
  </p>
  <hr>
  <img src="admin/<?php echo $photo->picture_path();   ?>" class="img-responsive">
  <hr>
  <p class="lead"><?php echo $photo->caption; ?></p>
  <p><?php echo $photo->description; ?></p>
  <hr>
</div>
<div class="row">
    <div class="col-md-6"><div class="well">
      <h4>Leave a comment</h4>
      <form role="form" method="post">
          <div class="form-group">
          <label for="author">Author</label>
             <input type="text" name="author" class="form-control">      
          </div>
           <div class="form-group">
             <textarea name="body" class="form-control" rows="3"></textarea>     
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </form> 
      <!-- comment -->
<?php foreach ($comments as $comment ):
  

  


?>


      <div class="media">
        <a href="$" class="pull-left">
       <img src="http://placehold.it/64*64" alt="" style="width:200px;,height: 100px;">
       </a>
        <div class="media-body">
      <h4 class="media-heading"><?php echo $comment->author; ?>
      <small>August 25,2030 at 9:30 PM</small>
        
      </h4>
      <?php echo $comment->body; ?>
    </div>
</div>
<?php endforeach; ?>

  </div>

</div>





<?php 

//include("include/sidenav.php");

?></div> 

</div>


</body>
</html>                                   



