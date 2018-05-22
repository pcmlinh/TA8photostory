<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Building a Horizontal Timeline With CSS and JavaScript</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
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
  <li style="float:right"><a class="active" href="#about">About</a></li>
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
                    <div>

                      <time>' . $row["timeline_year"] . '</time>';
                        $len = count($arrayVals);
                        for($x = 0, $limit=0; ($x < $len) ; $x++) {
                        $row = $arrayVals[$x];
                          if (date("Y",strtotime($row["timeline"]))==$timeline_year) {
                            echo '<img id="small-img" src="' . $row["image"] .'">';
                            $limit++;
                            if ($limit==6) {
                              break;
                            }
                          }                            
                        }

                        
                           

                      echo '
                      <button class="btmore">More</button>
                    </div>
                  </li>';
          }
        }
    // output data of each row
    ?>
  </ol>
  
  <div class="arrows">
    <button class="arrow arrow__prev disabled" disabled>
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_prev.svg" alt="prev timeline arrow">
    </button>
    <button class="arrow arrow__next">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_next.svg" alt="next timeline arrow">
    </button>
  </div>
</section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>