<?php 

require_once("includes/init.php");
 ?>
<?php 
// if(empty($_GET['id'])){

//   redirect("users.php");
// // print_r($_GET);
// // die("");
 
// // 
// }

$user = User::find_user_by_id($_GET['id']);
if ($user) {
  # code...
  $user->delete();
  // echo $user;
  // die("stop");
  redirect("users.php");
}
else{
  redirect("users.php");
}






?>