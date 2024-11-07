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
	<h1 >Search results</h1><br><br>









<?php
// Establish database connection (replace with your actual database credentials)

// Retrieve search query from the form
if (isset($_POST['searchff'])) {
    $search_query = $_POST['searchff'];

    // Prepare SQL query
    $sql = "SELECT * FROM thesis WHERE title LIKE '%$search_query%' AND status=3";

    // Execute query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<hr><div class="bottomhover" >
                    <h5><a href="#" id="myAnchor" style="text-decoration:none; color:black;" onclick="view('.$row["id"].')">'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span>'.$row["id"].'</span>
                </div>
<br>';
        }
    } else {
        echo "0 results found";
    }
} else {
    echo "No search query provided";
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