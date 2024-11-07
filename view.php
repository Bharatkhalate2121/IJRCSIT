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
        echo '<h3>  ';

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
<br><hr>
</div>

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
        
    
    </form>
</center>
      </div>
    </div>

    <?php
    $idd=$_SESSION["idd"];
    $sql = "SELECT * FROM thesis Where id='".$idd."' ";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
        echo '<div class="col-md-8">
                <h1>Review Thesis</h1><hr>
                <div class="bottomhover" >
                    <h5>'.$row["title"].'<br></h5>
			  <span>Thesis uploaded on '.$row["action_date"].'</span><br>
                    <span><b>'.$row["authors"].'</b></span><br>
                    <span>'.$row["id"].'</span>
			  <span>'.$row["abstract"].'</span>
                </div><br><br>
			
<h2>Take action</h2><br>
        <div class="button-row">
   <!-- <form action="take_action.php" method="post">-->
        <button type="submit"  class="btn btn-outline-success btn-block" onclick="openDialogg()">Accept Thesis</button>&nbsp;&nbsp;
   <!-- </form>-->
    <button type="submit"  class="btn btn-outline-danger btn-block" onclick="openDialog()">Reject Thesis</button>&nbsp;&nbsp;
    <button type="submit"  class="btn btn-outline-warning btn-block" onclick="open1()">Send for review</button>  
</div>

              </div>';
      }
    } else {
      echo "0 results";
    }
    ?>


  </div>

</div>



<div id="xyz" class="dialog-box">
    <!-- Dialog content -->
    <div class="dialog-content">
       <center>
 <!-- Close button -->
        <span class="close" onclick="closeDialogg()">&times;</span>
        <!-- Form inside the dialog box -->
        <form class="form-inline" action="take_action.php" method="post">
 <div class="form-check form-switch">

  <label class="form-check-label" for="flexSwitchCheckDefault">Check the switch for marking the article as special</label><br><br>
<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="setsp" style="margin-left:40%;"><br><br>

</div>

  <button type="submit" name="acceptthesis" class="btn btn-outline-success mb-2 ">Accept Thesis</button>


        </form>
</center>
    </div>
</div>





<div id="pqr" class="dialog-box">
    <!-- Dialog content -->
    <div class="dialog-content">
       <center>
 <!-- Close button -->
        <span class="close" onclick="close1()">&times;</span>
        <!-- Form inside the dialog box -->
        <form class="form-inline" action="take_action.php" method="post">
 <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Enter Reason</label>
    <input type="text" class="form-control" id="inputPassword2" name="reason_review" placeholder="Reason">
  </div>
  <button type="submit" name="reviewthesis" class="btn btn-outline-warning mb-2 ">Send for review</button>


        </form>
</center>
    </div>
</div>





<div id="abc" class="dialog-box">
    <!-- Dialog content -->
    <div class="dialog-content">
       <center>
 <!-- Close button -->
        <span class="close" onclick="closeDialog()">&times;</span>
        <!-- Form inside the dialog box -->
        <form class="form-inline" action="take_action.php" method="post" >
 <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Enter Reason</label>
    <input type="text" class="form-control" id="inputPassword2" name="reason_reject" placeholder="Reason">
  </div>
  <button type="submit" name="rejectthesis" class="btn btn-outline-danger mb-2 ">Reject Thesis</button>


        </form>
</center>
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


function openDialogg() {
        document.getElementById('xyz').style.display = 'block';
    }

    // Function to close the dialog box
    function closeDialogg() {
        document.getElementById('xyz').style.display = 'none';
    }



function open1() {
        document.getElementById('pqr').style.display = 'block';
    }

    // Function to close the dialog box
    function close1() {
        document.getElementById('pqr').style.display = 'none';
    }




function openDialog() {
        document.getElementById('abc').style.display = 'block';
    }

    // Function to close the dialog box
    function closeDialog() {
        document.getElementById('abc').style.display = 'none';
    }

</script>

<?php
require('footer.php');
require('closecon.php');
?>
</body>
</html>
