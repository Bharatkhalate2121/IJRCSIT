<?php
session_start();
require('conn.php');
require('nav.php');
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <style>
    .sticky-div {
      position: -webkit-sticky; /* Safari */
      position: sticky;
      top: 0;
      background-color: white;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
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


	<div class="col-md-14" style="margin-left:7%;">
	<h1 >Special Issues</h1><br><br>
    <?php
   
    $sql = "SELECT * FROM accepted_thesis where sp=1;";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
	
	$quer="select * from thesis where id=".$ro['id'];
	$result=$conn->query($quer);
	 if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
if(1){
echo '
                
                <div class="bottomhover" >
                    <h5><a href="#" id="myAnchor" style="text-decoration:none; color:black;" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span>'.$row["id"].'</span>
                </div>
<br>
              ';
        echo '<script>var farmerId2 = ' . json_encode($row["id"]) . ';</script>';
        }
      }
    } else {
      echo "0 results";
    }}}
 else {
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
    url: 'processcommon.php',
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