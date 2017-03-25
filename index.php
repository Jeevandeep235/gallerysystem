<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		.std{
			float:right;
			width: 300px;
			height: 200px;
			border: 1px solid lightgreen;
			border-radius: 10px;
			margin-right: 40px;
			background: silver;
			clear:right;
		}
		div.stf{
			float: right;
		}
			.s{
			float:right;
		
			
			position: absolute;
			top: 1000px;
			left:  20px;
		
			
			clear:right;
		}
	</style>
</head>
<body>
<?php 

include("include/header.php");

?>
<?php
require_once("admin/includes/functions.php");
require_once("admin/includes/config.php"); 
require_once("admin/includes/database.php");
require_once("admin/includes/db_obj.php");
require_once("admin/includes/user.php");
require_once("admin/includes/photo.php");
require_once("admin/includes/session.php");
require_once("admin/includes/paginate.php");


?>

<?php 
$page = !empty($_GET['page'])? (int)$_GET['page']:1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .="OFFSET {$paginate->offset()}";

 $photos=Photo::find_this_query($sql);     ?>
<div class="row">

   <div class="col-md-12">
 <div class="thumbnails row">
   <?php foreach($photos as $photo): ?>

   
      <div class="col-xs-6 col-md-3">
      <a href="photo.php?id=<?php echo $photo->id; ?>" class="tumbanil">
      	<img src="admin/<?php echo $photo->picture_path(); ?>" alt="" class="home_page_photo img-responsive">
      </a>
      	
     
    	
    </div>


   <?php endforeach;  ?>
 </div>

 <div class="row">
 	
 	<ul class="pager">
 	<?php

if($paginate->page_total()>1){
	if($paginate->has_next()){
		echo " <li class='next'><a href='index.php={$paginate->next()}'>Next</a></li>";
	}
}

 	?>
 	
 	 <li class="previous"><a href="">Prev</a></li>
 		
 	</ul>
 </div>
   	
   </div>
    

<?php 
//include("include/sidenav.php");

?>
<div>
	<?php 

//include("include/footer.php");

?>
</div>
</div>
</body>
</html>