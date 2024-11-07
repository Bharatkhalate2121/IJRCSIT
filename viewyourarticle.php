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
 if ($_SESSION["res"] != 0) {
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
<link rel="stylesheet" type="text/css" href="dia1.css">


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
        echo '<h3> ';

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
	  <button type="submit" name="downloadPDF" class="btn btn-outline-dark btn-block">Download PDF File</button><br><br>
       
    </form>
<br><br>
<h2>Status</h2><br><br>
<?php
$idd=$_SESSION["idd"];
    $sql = "SELECT * FROM thesis Where id='".$idd."' ";
    $res = $conn->query($sql);

if ($res->num_rows > 0) {
      // output data of each row
      while($row = $res->fetch_assoc()) {
	if($row['status']==0)
{
	echo '<mark style="background-color: grey; color: white;">under Scrutiny</mark>';
}

elseif ($row['status'] == 1) {
    echo '<mark style="background-color: red; color: white;">Rejected</mark> <br>';
    echo "<u>Reason</u>:";
    $sql = "SELECT * FROM rejected_thesis WHERE id='" . $idd . "'";
    $r = $conn->query($sql);
    if ($r->num_rows > 0) {
       
        $rejected_rows = $r->fetch_all(MYSQLI_ASSOC);

        
        $last_rejected_row = end($rejected_rows);

        
        echo $last_rejected_row["reason"];
        echo "<br><u>on</u>" . $last_rejected_row["date_action"];
    }
}




elseif ($row['status'] == 2) {
    echo '<mark style="background-color: yellow; color: white;">Sent Back to you</mark><br>';
    echo "<u>Reason</u>:";
    $sql = "SELECT * FROM review_thesis WHERE id='" . $idd . "'";
    $r = $conn->query($sql);
    if ($r->num_rows > 0) {
        // Fetch all rows into an array
        $rejected_rows = $r->fetch_all(MYSQLI_ASSOC);

        // Get the last element of the array
        $last_rejected_row = end($rejected_rows);

        // Print the reason and date of the last rejected row
        echo $last_rejected_row["reason"];
        echo "<br><u>on</u>" . $last_rejected_row["date_action"];
    }
}

if($row['status']==3)
{
	echo '<mark style="background-color: green; color: white;">Selected</mark>';
}
}}
?>





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
                <h1>Your Thesis</h1><br>
                <div class="bottomhover">
                    <h5>'.$row["title"].'<br></h5>
			  <span>Thesis uploaded on '.$row["action_date"].'</span><br>
                    <span><b>'.$row["authors"].'</b></span><br>
                    <span>'.$row["id"].'</span>
			  <span>'.$row["abstract"].'</span>
                </div><br><br>';

if($row["status"]==1){

	echo'	
<h2>Take action</h2><br>
        <div class="button-row">
    <form action="take_action.php" method="post" style="margin-left:19%;">
        <button type="submit" name="deletethesis" class="btn btn-outline-danger btn-block">Delete Application</button>&nbsp;&nbsp;
    </form> 
</div>
';
}


if($row["status"]==0){

	echo'
<h2>Take action</h2><br>

        <div class="button-row">
    <form action="take_action.php" method="post" style="margin-left:19%;">
        <button type="submit" name="deletethesis" class="btn btn-outline-danger btn-block">Delete Application</button>&nbsp;&nbsp;
    </form> 
</div>';
}


if($row["status"]==2){

	echo'
<h2>Take action</h2><br>
        <div class="button-row">
    <form action="take_action.php" method="post"  >
        <button type="submit" name="deletethesis" class="btn btn-outline-danger btn-block">Delete Application</button>&nbsp;
    </form> 
<button type="submit" name="reviewthesis" class="btn btn-outline-warning mb-2 " onclick="openDialog()">Send for review</button>
</div>

</div>';



}






      }
    } else {
      echo "0 results";
    }
    ?>


  </div>

</div>

















<div class="dialog-box" id="abc">
<div class="dialog-content">
<span class="close" onclick="closeDialog()">&times;</span>
    <h2>Upload Files</h2>



   <div class="container1">
        <h2>Upload Thesis</h2>
        <form id="uploadForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            

<div class="form-group">
    <label  for="pdpFile">PDP File:</label>
    <input type="file" class="form-control-file" id="id="pdpFile" name="pdpFile" required>
  </div>


        		


            <div id="zipSwitchContainer">




              
                <input type="hidden" id="zipSwitch" name="zipSwitch">
            </div>
        
            <div id="zipFileContainer" style="display: none;">
                <input type="hidden" id="zipFile" name="zipFile">
            </div>
        
            


<label for="title" class="sr-only">Title:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>

        
            	


<label for="abstract">Abstract:</label>
    <textarea class="form-control" id="abstract" rows="4" name="abstract" cols="50" required></textarea>

<label for="authors" class="sr-only">Authors:</label>
            <div id="authorsContainer">
	


    <input type="text" class="form-control" id="author1" name="authors[]" placeholder="Author" required>


            </div>

<button type="button" class="btn btn-primary" id="addAuthor">Add Author</button>
        
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const zipSwitch = document.getElementById('zipSwitch');
            const zipFileContainer = document.getElementById('zipFileContainer');
            const authorsContainer = document.getElementById('authorsContainer');
            const addAuthorBtn = document.getElementById('addAuthor');
            let authorCount = 1;

            zipSwitch.addEventListener('change', function () {
                if (zipSwitch.checked) {
                    zipFileContainer.style.display = 'block';
                } else {
                    zipFileContainer.style.display = 'none';
                }
            });

            addAuthorBtn.addEventListener('click', function () {
                authorCount++;
                const newAuthorInput = document.createElement('input');
                newAuthorInput.type = 'text';
                newAuthorInput.id = 'author' + authorCount;
                newAuthorInput.name = 'authors[]';
                newAuthorInput.placeholder = 'Author ' + authorCount;
                authorsContainer.appendChild(newAuthorInput);
            });
        });
    </script>

  </div>
</div>










    <?php
// Database connection details
require('conn.php');

// Process form submission
if (isset($_POST["submit"])) {
    // Fetch the maximum ID from the database and increment it by 1
    $sql_max_id = "SELECT MAX(id) AS max_id FROM thesis";
    $result_max_id = $conn->query($sql_max_id);
    $row_max_id = $result_max_id->fetch_assoc();
    $max_id = $row_max_id["max_id"];
    $new_id = $max_id + 1;

    // Retrieve form data
    $title = $_POST["title"];
    $abstract = $_POST["abstract"];
    $authors = implode(" &  ", $_POST["authors"]); // Combine multiple authors into a comma-separated string
    // Check if pdp file is uploaded
    if (isset($_FILES["pdpFile"])) {
        $pdpFileName = $_FILES["pdpFile"]["name"];
        $pdpFileTmpName = $_FILES["pdpFile"]["tmp_name"];
        $pdpFileError = $_FILES["pdpFile"]["error"];
        // Move the uploaded pdp file to desired directory
        if ($pdpFileError === 0) {
            $pdpFilePath = "uploads/" . $pdpFileName;
            move_uploaded_file($pdpFileTmpName, $pdpFilePath);
        }
    }

    // Check if zip file upload switch is turned on
    $zipFilePath = ""; // Initialize zip file path
    if (isset($_POST["zipSwitch"]) && $_POST["zipSwitch"] == "on" && isset($_FILES["zipFile"])) {
        $zipFileName = $_FILES["zipFile"]["name"];
        $zipFileTmpName = $_FILES["zipFile"]["tmp_name"];
        $zipFileError = $_FILES["zipFile"]["error"];
        // Move the uploaded zip file to desired directory
        if ($zipFileError === 0) {
            $zipFilePath = "uploads/" . $zipFileName;
            move_uploaded_file($zipFileTmpName, $zipFilePath);
        }
    }
else
{
 $zipFilePath = 0;
}


    // Get the name from session
    $authName = $_SESSION["name"];

    // Fetch last volume number
    $sql_last_vol = "SELECT vol FROM vol ORDER BY vol DESC LIMIT 1";
    $result_last_vol = $conn->query($sql_last_vol);
    if ($result_last_vol && $result_last_vol->num_rows > 0) {
        $lstvolno = $result_last_vol->fetch_assoc();
        $vol = $lstvolno['vol'];
    }

    // Insert data into database
     $sql = "UPDATE thesis 
        SET id = '$new_id', 
            title = '$title', 
            abstract = '$abstract', 
            authors = '$authors', 
            pdp_file = '$pdpFilePath', 
            zip_file = '$zipFilePath', 
            auth_name = '$authName', 
            status = 0 
        WHERE id = $idd";

    if ($conn->query($sql) === TRUE) {
        

echo'<div class="alert alert-success fade show" role="alert" style="position: fixed; top: 0;width:50%; left: 50%; transform: translateX(-50%); z-index: 9999;">
  <strong>Thesis Updated</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="redirectToScript()">
    <span aria-hidden="true">&times;</span>
  </button>
  </button>
</div>
<script>
function redirectToScript() {
    // Redirect to your PHP script
    window.location.href = "yourarticle.php";
}
</script>


';


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
require('closecon.php');
?>

















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

document.getElementById('abc').style.display = 'none';
});








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
;
?>
</body>
</html>