


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 <div class="page-wrapper s" style="">
     <div class="container-fluid s">
         <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header" style="color: green;">
                  Blank
                    <small>Subheading</small>
       
                </h1>
                <?php
              include ("init.php");
              
//                  $result_set=User::find_all_users();
//                   while($row = mysqli_fetch_array($result_set)) {
//                    echo $row['username']."<br>";
// }
                //  $found_user=User::find_user_by_id(2);
                //  $user = User:: instaation($found_user);

                //   echo $user->id;
                //   echo $user->username;
               //   $user=new User();
               //   $user->username = "Deep the second";
               //   $user->password = "jeevan the first";
               //   $user->first_name= "jeevan";
               //   $user->last_name= "deep";

               // $user->create(); 
              // $photo=new Photo();
                 
                 
              //    $photo->title= "mountain view";
              //        $photo->size= 0;
                
              //  $photo->create();
                 // $user=User::find_user_by_id(23);
                   
                 //       $user->last_name="willaii";
                 //          $user->update();  



                    // $users=User::find_user_by_id(21);
                    // $users->delete();

                 //  $user = Photo::find_user_by_id(1);
                 // echo $user->title="nishu jii";
                 // $user->save();  
                 //    $user = User::find_user_by_id(23);
                 //  $user->username="nishu jiihg";
                 // $user->save();  
                    //   $users=User::find_all_users();
                    // foreach($users as $user){
                    //    echo $user->username;
                    //   }
                 // $photos = Photo::find_all_users();
                 // foreach($photos as $photo){
                 //  echo $photo->title;
                 // }
              //echo INCLUDES_PATH;
                                    ?>
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
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>