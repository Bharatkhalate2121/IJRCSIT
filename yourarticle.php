<?php
require('nav.php');
require('conn.php');

require('ses.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Div in Bootstrap</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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


<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="sticky-div" id="sidebar">
        <center>
<h2 style="margin-top:150px;"> view by</h2>
        <button type="submit"  class="btn btn-outline-primary btn-block" onclick="openunderscutiny()">Under scrutiny >></button>
    <button type="submit"  class="btn btn-outline-success btn-block" onclick="openaccepted()">Accepted >></button>
<button type="submit"  class="btn btn-outline-danger btn-block" onclick="openrejected()">Rejected >></button>  
<button type="submit"  class="btn btn-outline-warning btn-block" onclick="openreview()">Need review >></button>  </center>
      </div>
    </div>







	<div class="col-md-8" style="margin-right:0px;"   id="under_scrutiny">
	<h1>Your thesis</h1><br>
    <?php
    $sql = "SELECT * FROM thesis WHERE auth_name='" . $_SESSION['name'] . "' AND status=0";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
if(1){
        echo '<hr><div class="bottomhover" style="">
                    <h5><a href="#" style="text-decoration:none; color:black;" id="myAnchor" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span>'.$row["id"].'</span>
                </div>';
        echo '<script>var farmerId2 = '. json_encode($row["id"]) . ';</script>';}
      }
    } else {
      echo "0 results";
    }
    ?>
  
</div>






<div class="col-md-8" style="margin-right:0px;"   id="accepted">
	<h1>Your thesis</h1><br>
    <?php
    $sql = "SELECT * FROM thesis where auth_name='".$_SESSION['name']."' AND status=3";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
if(1){
        echo '
                <hr>
                <div class="bottomhover" >
                    <h5><a href="#" style="text-decoration:none; color:black;" id="myAnchor" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span>'.$row["id"].'</span>
                </div>

              ';
        echo '<script>var farmerId2 = ' . json_encode($row["id"]) . ';</script>';}
      }
    } else {
      echo "0 results";
    }
    ?>
  </div>







<div class="col-md-8" style="margin-right:0px;"   id="rejected">
	<h1>Your thesis</h1><br>
    <?php
    $sql = "SELECT * FROM thesis where auth_name='".$_SESSION['name']."' AND status=1";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
if(1){
        echo '<hr>
                
                <div class="bottomhover" >
                    <h5><a href="#" id="myAnchor" style="text-decoration:none; color:black;" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span>'.$row["id"].'</span>
                </div>
      ';
        echo '<script>var farmerId2 = ' . json_encode($row["id"]) . ';</script>';}
      }
    } else {
      echo "0 results";
    }
    ?>
  </div>





<div class="col-md-8" style="margin-right:0px;"   id="review">
	<h1>Your thesis</h1><br>
    <?php
    $sql = "SELECT * FROM thesis where auth_name='".$_SESSION['name']."' AND status=2";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
if(1){
        echo '
                
                <div class="bottomhover" >
                    <h5><a href="#" style="text-decoration:none; color:black;" id="myAnchor" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span>'.$row["id"].'</span>
                </div>
<br>
              ';
        echo '<script>var farmerId2 = ' . json_encode($row["id"]) . ';</script>';}
      }
    } else {
      echo "0 results";
    }
    ?>
  </div>






  </div>
</div>

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

	  document.getElementById('under_scrutiny').style.display = 'block';
	  document.getElementById('accepted').style.display = 'none';
	  document.getElementById('rejected').style.display = 'none';
	  document.getElementById('review').style.display = 'none';

});

function view(farmerId) {
 
farmerId:farmerId
  $.ajax({
    url: 'processyourarticle.php',
    type: 'POST',
    data: { farmerId: farmerId },
    success: function(result) {
      if (result.redirect) {
        window.location.href = result.redirect;
      } else {
        console.log("No redirect URL received");
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error('Error:', textStatus, errorThrown);
    }
  });
}



function openunderscutiny() {
        document.getElementById('under_scrutiny').style.display = 'block';
	  document.getElementById('accepted').style.display = 'none';
	  document.getElementById('rejected').style.display = 'none';
	  document.getElementById('review').style.display = 'none';
    }

function openaccepted() {
        document.getElementById('accepted').style.display = 'block';
        document.getElementById('under_scrutiny').style.display = 'none';
	  document.getElementById('rejected').style.display = 'none';
	  document.getElementById('review').style.display = 'none';    }

function openrejected() {
        document.getElementById('rejected').style.display = 'block';
        document.getElementById('under_scrutiny').style.display = 'none';
	  document.getElementById('accepted').style.display = 'none';
	  document.getElementById('review').style.display = 'none';
    }

function openreview() {
        document.getElementById('review').style.display = 'block';
        document.getElementById('under_scrutiny').style.display = 'none';
	  document.getElementById('accepted').style.display = 'none';
	  document.getElementById('rejected').style.display = 'none';
    }

</script>

<?php
require('footer.php');
require('closecon.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>