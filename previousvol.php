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
      border-right: 0px solid #ddd;

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

    
        <?php
	  $curvol=$_SESSION['vol']-1;
        $sqlq = "SELECT vol, vol_name, YEAR(s_date) AS year, MONTH(s_date) AS month, YEAR(e_date) AS eyear, MONTH(e_date) AS emonth, RIGHT(YEAR(e_date), 2) AS teyear FROM vol WHERE vol =".$curvol;
        $stmtq = $conn->prepare($sqlq);
        $stmtq->execute();
        $resq = $stmtq->get_result();

        if ($resq->num_rows > 0) {
            while ($rowq = $resq->fetch_assoc()) {

if ($rowq["vol"] ==1){

echo '<div style="display:flex;" class="justify-content-center">
                       <span onclick=""><img src="arrow.png" style="transform: rotate(180deg);" alt="Previous"></span>
                      

                      
                         <h3>' . $rowq['vol_name'] . '  ('.$rowq['year'].' - '.$rowq['teyear'].')</h3>

                   
                        <span onclick="nextpage(' . $rowq["vol"] . ')"><img src="arrow.png"  alt="Previous"></span>
                      </div>	';


}
else{

                echo '<div style="display:flex;" class="justify-content-center">
                        <span onclick="previouspage(' . $rowq["vol"] . ')"><img src="arrow.png" style="transform: rotate(180deg);" alt="Previous"></span>
                        <h3>' . $rowq['vol_name'] . '  ('.$rowq['year'].' - '.$rowq['teyear'].')</h3>

                       <span onclick="nextpage(' . $rowq["vol"] . ')"><img src="arrow.png"  alt="Previous"></span>
                      </div>';
            }
        }}
        ?>

<br><hr>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="sticky-div" id="sidebar">
        <h2 style="margin-top:150px;">Pages</h2>
        <nav aria-label="Page navigation example">


<ul class="pagination">
    <li class="page-item">
        <a class="page-link" onclick="previouspage('. ($curpage-2) .')" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>

    <?php
    $totalrows = 0;
    $curpage=$_SESSION['vol'] + 1;
    $sqlqq = "SELECT * FROM vol";
    $stmtqq = $conn->prepare($sqlqq);
    $stmtqq->execute();
    $resqq = $stmtqq->get_result();
    if ($resqq->num_rows > 0) {
        while ($rowqq = $resqq->fetch_assoc()) {
            $totalrows++;

		if(($totalrows<=$curpage && $totalrows>=$curpage-3)||($totalrows>$curpage && $totalrows<=$curpage+3)){
		
            echo '<li class="page-item"><a class="page-link" onclick="previouspage('. ($totalrows+1) .')">' . $totalrows . '</a></li>';

}

            
            }
        }
   echo'

    <li class="page-item">
        <a class="page-link" onclick="previouspage('. ($curpage+2) .')" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
</ul></nav>';


?>




      </div>
    </div>
	<div class="col-md-8" style="margin-right:0px; border-left:1px solid #ddd;">
	
    <?php
   
    $sql = "SELECT * FROM accepted_thesis;";
    $res = $conn->query($sql);
    $chck=0;
    if ($res->num_rows > 0) {
      // output data of each row
      while($ro = $res->fetch_assoc()) {
	
	$quer="select * from thesis where id=".$ro['id']." && vol=".$_SESSION['vol']-1;
	$result=$conn->query($quer);
	 if (1) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
if($chck==0){
echo '
              
                <div class="bottomhover" style="border-bottom: 2px solid transparent; text-decoration: none; color: inherit;"
   onmouseover="this.style.borderBottom="2px solid orange";" 
   onmouseout="this.style.borderBottom="2px solid transparent";">
                    <h5><a href="#" style="text-decoration:none; color:black;" id="myAnchor" onclick="view('.$row["id"].')" >'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span></span>
                </div>

<br>
              ';
        echo '<script>var farmerId2 = ' . json_encode($row["id"]) . ';</script>';
       $chck=9;
        }
        else
        {
            echo '
                <hr>
                <div class="bottomhover" style="border-bottom: 2px solid transparent; text-decoration: none; color: inherit;"
   onmouseover="this.style.borderBottom="2px solid orange";" 
   onmouseout="this.style.borderBottom="2px solid transparent";">
                    <h5><a href="#" style="text-decoration:none; color:black;" id="myAnchor" onclick="view('.$row["id"].')" >'.$row["title"].'</a></h5>
                    <span>'.$row["authors"].'</span><br>
                    <span></span>
                </div>

<br>
              ';
        echo '<script>var farmerId2 = ' . json_encode($row["id"]) . ';</script>';
            
        }
            
        
      }
    } else {
      
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





function previouspage(farmerId) {
 
farmerId:farmerId
  $.ajax({
    url: 'processpreviosvol.php',
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





function nextpage(farmerId) {
 
farmerId:farmerId
  $.ajax({
    url: 'processnextvol.php',
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
