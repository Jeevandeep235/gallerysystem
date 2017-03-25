<?php 

require_once("includes/init.php");
 ?>
<?php 
if(empty($_GET['id'])){

  redirect("comments.php");
// print_r($_GET);
// die("");
 
// 
}

$comments = Comment::find_user_by_id($_GET['id']);
if ($comments) {
  # code...
  $comments->delete();
  // echo $photo;
  // die("stop");
  redirect("comments.php");
}
else{
  redirect("comments.php");
}






?>