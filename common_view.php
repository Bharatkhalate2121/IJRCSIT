<?php
require('nav.php');
require('conn.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Div in Bootstrap</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="dia.css">


  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <style>
    .sticky-div {
      position: -webkit-sticky; /* Safari */
      position: sticky;
      top: 0;
      background-color: white;
      padding: 20px;
      border-right: 1px solid #ddd;
      z-index: 1000; /* Ensure it's above other elements */
    }
    .stick-to-top {
      top: 0 !important;
    }
    .bottomhover a:hover{
      border-bottom: 2px solid orange;
    }
  </style>
</head>
<body>
<br>
<div class="container" >


<center>


<?php
// Assuming you've already started the session
$idd = $_SESSION["idd"];

// Prepare and execute the query for fetching thesis data
$sql = "SELECT * FROM thesis WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idd);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo '<h3>';

        // Prepare and execute the query for fetching vol_name
        $sqlq = "SELECT vol_name FROM vol WHERE vol = ?";
        $stmtq = $conn->prepare($sqlq);
        $stmtq->bind_param("i", $row["vol"]);
        $stmtq->execute();
        $resq = $stmtq->get_result();

        if ($resq->num_rows > 0) {
            while ($rowq = $resq->fetch_assoc()) {
                echo $rowq['vol_name'].'</h3>';
            }
        }
    }
} else {
    echo "0 results";
}
?>
</center>


</div>
<br><hr>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="sticky-div" id="sidebar">
<center>
        <h2>Download Buttons</h2><br><br>
        <form action="dow.php" method="post">
        <!-- Button to download PDF file -->
	  <button type="submit" name="downloadPDF" class="btn btn-outline-dark btn-block">Download PDF File</button><br><br>
       <!-- <button type="submit" name="downloadPDF">Download PDF File</button><br><br>-->
        
        <!-- Button to download ZIP file -->
       <!-- <button type="submit" name="downloadZIP">Download ZIP File</button>-->
    </form>
</center>
      </div>
    </div>

    <?php
    $idd=$_SESSION["idd"];
    $abc=1;

 $sql = "SELECT * FROM accepted_thesis Where id='".$idd."' ";
    $resm = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($date_accepetedd = $resm->fetch_assoc()) {
$abc=$date_accepetedd["date_action"];}}



    $sql = "SELECT * FROM thesis Where id='".$idd."' ";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
        echo '<div class="col-md-8">
                <h3>'.$row["title"].'</h3><hr><br>
                <div class="bottomhover" >
                    
			  <span>Thesis uploaded on '.$row["action_date"].'&nbsp;& accepted on ' .$abc.'</span><br><br>
                    <span><b>Authors:'.$row["authors"].'</b></span><br><br>
                    <span>Abstract:-</span><br>
			  <span>'.$row["abstract"].'</span>
                </div><br><br>
			<center>
</center>
              </div>';
      }
    } else {
      echo "0 results";
    }
    ?>


  </div>

</div>




<br><br>



<script>
$(document).ready(function() {
  var lastScrollTop = 0;
  $(window).scroll(function(event){
    var st = $(this).scrollTop();
    if (st > lastScrollTop){
      // downscroll code
      $('#sidebar').removeClass('stick-to-top');
    } else {
      // upscroll code
      $('#sidebar').addClass('stick-to-top');
    }
    lastScrollTop = st;
  });
});





</script>

<?php
require('footer.php');
require('closecon.php');
?>
</body>
</html>
