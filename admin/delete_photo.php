<?php 

require_once("includes/init.php");
 ?>
<?php 
// if(empty($_GET['id'])){

//   redirect("photos.php");
// // print_r($_GET);
// // die("");
 
// // 
// }

$photo = Photo::find_user_by_id($_GET['id']);
if ($photo) {
  # code...
  $photo->delete_photo();
  // echo $photo;
  // die("stop");
  redirect("photos.php");
}
else{
  redirect("photos.php");
}






?>