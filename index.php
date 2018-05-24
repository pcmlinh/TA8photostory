<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Building a Horizontal Timeline With CSS and JavaScript</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">
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

   <?php  if($_SESSION['name'] != NULL){?>
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
                            echo '
                            
                            <img id="small-img" src="' . $row["image"] .'" style="cursor:pointer" onclick="onClick(this)"> 
                            

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


  </ol>

  
  <div class="arrows">
    <button class="arrow arrow__prev disabled">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_prev.svg" alt="prev timeline arrow">
    </button>
    <button class="arrow arrow__next">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_next.svg" alt="next timeline arrow">
    </button>


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
