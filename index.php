<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Building a Horizontal Timeline With CSS and JavaScript</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/css.css">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
</head>
<body>
<?php
require 'database-config.php';
// echo "Connected successfully";

$sql = "SELECT * FROM photos";
$sqlyear= "SELECT DISTINCT Year(timeline) AS timeline_year FROM photos ORDER BY Year(timeline) ASC";
$result = mysqli_query($conn, $sql);
$resultyear = mysqli_query($conn, $sqlyear);

if (!$result) {
  die("Can't query date. Error occure".mysqli_error($conn));
}

 ?>
<ul id="menubar">
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <div class="socials-share">
    <a class="bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank"><span class="fa fa-facebook"></span> Share</a>
    <a class="bg-google-plus" href="https://plus.google.com/share?url" target="_blank"><span class="fa fa-google-plus"></span> Plus</a>
  </div>
   <?php  if(isset($_SESSION['name'])){?>
    <li style="float:right"><a class="active" href="/TA8photostory/Login/logout.php">Logout</a></li>
    <li style="float:right"><a class="active" href="#"><?php echo "Xin chào, ".$_SESSION['name']?></a></li>
    
  <?php }else {?>
      <li style="float:right"><a class="active" href="/TA8photostory/Login/login.php">Login</a></li>
  <?php } ?>
</ul>
  <section class="section intro">
  <div class="container">
    <h1>Timeline &rarr;</h1>
  </div>
</section>

<section class="timeline">
  <ol>
        <?php 
        if ((mysqli_num_rows($result) > 0) ) {
          while($row = mysqli_fetch_assoc($result)) {
            $arrayVals[] = $row;
          }
        }

        if (mysqli_num_rows($resultyear) > 0) {

          while($row = mysqli_fetch_assoc($resultyear)) {
            $timeline_year=$row["timeline_year"];
            echo '<li>
                    <div id="timeline">

                      <time>' . $row["timeline_year"] . '</time>';
                        $len = count($arrayVals);
                        for($x = 0; ($x < $len) ; $x++) {
                        $row = $arrayVals[$x];
                          if (date("Y",strtotime($row["timeline"]))==$timeline_year) {
                            echo  '<a href="#" pull-right" data-toggle="modal" data-target="#'.$row["id"].'">';
                            echo '
                            
                            <img id="small-img" src="' . $row["image"] .'"> 
                            

                                ';

                            echo  '</a>';
                            
                          }                            
                        }                                                  
                      echo '
                    </div>
                  </li>';
          }
        }
    // output data of each row
    ?>


  </ol>

  
  <div class="arrows">
    <button class="arrow arrow__prev disabled">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_prev.svg" alt="prev timeline arrow">
    </button>
    <button class="arrow arrow__next">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_next.svg" alt="next timeline arrow">
    </button>


<?php 
$sqll = "SELECT id, title, description, image, phstories_id, timeline from photos";
$resultt = mysqli_query($conn, $sqll);
if(!$resultt){
    die( "Can't query data".mysqli_error($conn) );
}
  if (mysqli_num_rows($resultt) > 0) {
    while($row = mysqli_fetch_assoc($resultt)) {   
      echo'
        <div id="'.$row["id"].'" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h1 class="modal-title">'.$row["title"].'</h1>
                                    </div>
                                    <div class="modal-body" id="bigimg">
                                      <img id="big-img" src="'.$row["image"].'">
                                      <h4 class="description">'.$row["description"].'<h4>
                                      <h4>'.$row["timeline"].'</h4>
                                    </div>
                                    <div class="modal-footer">
                                    <a href="del.php?id='.$row['id'].'">
                                      <button type="button" class="btn btn-danger"  onclick="ConfirmDelete();">Xóa</button>
                                    </a>

                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>                                   
                                  </div>
                                </div>
                              </div>
      ';
    }
  } else {
    echo "0 result !";
  }


?>





<?php 
        if ((mysqli_num_rows($result) > 0) ) {
          while($row = mysqli_fetch_assoc($result)) {
            $arrayVals[] = $row;
          }
        }

        if (mysqli_num_rows($resultyear) > 0) {

          while($row = mysqli_fetch_assoc($resultyear)) {
            $timeline_year=$row["timeline_year"];
            echo '<li>
                    <div id="timeline">

                      <time>' . $row["timeline_year"] . '</time>';
                        $len = count($arrayVals);
                        for($x = 0; ($x < $len) ; $x++) {
                        $row = $arrayVals[$x];
                          if (date("Y",strtotime($row["timeline"]))==$timeline_year) {
                            
                            echo'
                              <div id="'.$row["id"].'" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <img id="small-img" src="' . $row["image"] .'">
                                    </div>
                                  </div>
                                </div>
                              </div>                            
                            ';
                          }                            
                        }                                                  
                      echo '
                    </div>
                  </li>';
          }
        }
    // output data of each row
    ?>





  <div class='menu closed'>
    <div class='messages button'></div>
    <div class='music button'></div>
   <div class='home button'></div>
   <div class='places button'></div>
   <div class='bookmark button'></div>
   <div class='main button' href="input.php"><a href="input.php">Add</a></div>
  </div>



  </div>
</section>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js'></script>
  <script src="js/index.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script>
  function ConfirmDelete() {
   return confirm("Bạn có chắc chắn muốn xóa?");
 }

  //   $(".menu").hover(function(){
  // $(this).toggleClass("closed");
  // $(this).hasClass("closed")
  // if($(this).hasClass("closed")) {
  //   $(".main.button").text("Add");
  // } else {
  //   $(".main.button").text("Add");
//   }
// })
</script>

</body>
</html>
