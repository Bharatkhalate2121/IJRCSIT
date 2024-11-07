<?php
require('nav.php');
require('conn.php');

if(!isset($_SESSION["name"])) {
   echo '<script>
            alert("Login to access this page");
            window.location.href = "index.php";
        </script>';
        exit; 
}
else{ 
 if ($_SESSION["res"] != 1) {
        echo '<script>
            alert("This page is not available");
            window.location.href = "index.php";
        </script>';
        exit; // Terminate script execution after redirection
    }}


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
    
	<div class="col-md-12" >
	<h1>Review thesis</h1><br>
    <?php
    $sql = "SELECT * FROM thesis";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
if($row["status"]==0){
        echo ' <hr><div class="bottomhover" >
                    <h5><a href="#" id="myAnchor" style="text-decoration:none; color:black;" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
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
});

function view(farmerId) {
 
farmerId:farmerId
  $.ajax({
    url: 'process.php',
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

</script>

<?php
require('footer.php');
require('closecon.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
