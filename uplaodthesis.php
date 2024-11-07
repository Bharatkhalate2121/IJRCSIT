<?php

require('nav.php');
require('ses.php');

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
<title>File Upload Form</title>
<link rel="stylesheet" href="upload.css">
<style>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    
    <style>
        *{
            padding:0;
            margin:0;
        }
    </style>
</head>
<body>
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
    $authors = implode(", ", $_POST["authors"]); // Combine multiple authors into a comma-separated string
    // Check if pdp file is uploaded
   




// Check if pdp file is uploaded
if (isset($_FILES["pdpFile"])) {
    $pdpFileName = $_FILES["pdpFile"]["name"];
    $pdpFileTmpName = $_FILES["pdpFile"]["tmp_name"];
    $pdpFileError = $_FILES["pdpFile"]["error"];
    // Generate a random filename
    $randomFileName = uniqid() . '_' . $pdpFileName; // Prefix with unique ID to ensure uniqueness
    // Move the uploaded pdp file to desired directory with the random filename
    if ($pdpFileError === 0) {
        $pdpFilePath = "uploads/" . $randomFileName;
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
$zipFilePath=0;
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
    $sql = "INSERT INTO thesis (id, title, abstract, authors, pdp_file, zip_file, auth_name,status,vol,action_date)
        VALUES ('$new_id', '$title', '$abstract', '$authors', '$pdpFilePath', '$zipFilePath', '$authName',0,'$vol',curdate())";

    if ($conn->query($sql) === TRUE) {
        echo "
<script>
    alert('Data stored successfully');
    window.location.href = 'uplaodthesis.php';
</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
require('closecon.php');
?>

   <br>

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
                <label for="zipFile">ZIP File:</label>
                <input type="file" id="zipFile" name="zipFile">
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

</body>
</html>

<?php
require('footer.php');
?>
