<?php
session_start();
require('conn.php'); 

function downloadFile($filePath, $fileName) {
    // Check if the file exists
    if (file_exists($filePath)) {
        // Attempt to read and output the file contents
        if (is_readable($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
          
            // Use readfile() to output the file contents
            if (readfile($filePath) === false) {
                // If readfile() fails, handle the error appropriately
                echo "<script type='text/javascript'>alert('File not available for this thesis'); window.location.href = 'view.php';</script>";
            }
        } else {
            // If the file is not readable, handle the error appropriately
            echo "<script type='text/javascript'>alert('File not available for this thesis'); window.location.href = 'view.php';</script>";
        }
    } else {
        // If the file does not exist, handle the error appropriately
        echo "<script type='text/javascript'>alert('File not available for this thesis'); window.location.href = 'view.php';</script>";
    }
}






if (isset($_POST['downloadPDF'])) {
    $sql = "SELECT pdp_file FROM thesis WHERE id='".$_SESSION['idd']."'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row['pdp_file'];
        $pdpFileName = basename($filename);
        $pdpFilePath = "uploads/" . $pdpFileName;
	  echo "<script type='text/javascript'>alert('".$pdpFileName.$pdpFilePath."');</script>";
	  
	
// Assuming $pdfFilePath and $pdfFileName are set correctly in your PHP code
echo "
<script>
document.addEventListener('DOMContentLoaded', function() {
    var fileURL = '" . $pdpFilePath . "'; // Relative path to your PDF file
    var fileName = '" . $pdpFileName . "'; // Name of the downloaded file

    var xhr = new XMLHttpRequest();
    xhr.open('GET', fileURL, true);
    xhr.responseType = 'blob';

    xhr.onload = function() {
        var blob = xhr.response;
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = fileName;
        document.body.appendChild(link); // Append the link to the body
        link.click();
        document.body.removeChild(link); // Clean up after download
        window.location.href = document.referrer;
    };

    xhr.send();
});
</script>";

	  
	  
	  
        //downloadFile($pdpFilePath, $pdpFileName);
    } else {
        echo "<script type='text/javascript'>alert('PDF file not available for this thesis');</script>";
    }
}

if (isset($_POST['downloadZIP'])) {

if($_POST['downloadZIP']!=0){
    $sql = "SELECT zip_file FROM thesis WHERE id='".$_SESSION['idd']."'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if($row['zip_file']!=0){
        $zipFileName = $row['zip_file'];
        $zipFilePath = "uploads/" . basename($zipFileName);
        
        echo "
<script>
document.addEventListener('DOMContentLoaded', function() {
    var fileURL = '" . $zipFilePath . "'; // Relative path to your PDF file
    var fileName = '" . $zipFileName . "'; // Name of the downloaded file

    var xhr = new XMLHttpRequest();
    xhr.open('GET', fileURL, true);
    xhr.responseType = 'blob';

    xhr.onload = function() {
        var blob = xhr.response;
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = fileName;
        document.body.appendChild(link); // Append the link to the body
        link.click();
        document.body.removeChild(link); // Clean up after download
        window.location.href = document.referrer;
    };

    xhr.send();
});
</script>";
        }else
        {
echo "<script type='text/javascript'>alert('ZIP file not available for this thesis');window.location.href = document.referrer;</script>";
}
        
       // downloadFile($zipFilePath, $zipFileName);
    }

else

{
echo "<script type='text/javascript'>alert('ZIP file not available for this thesis');</script>";
}

}

 else {
        echo "<script type='text/javascript'>alert('ZIP file not available for this thesis');</script>";
    }
}

require('closecon.php');
?>
