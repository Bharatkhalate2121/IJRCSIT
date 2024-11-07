<?php require('conn.php');
session_start();
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

  <style>
    /* Add your CSS styles here */
  </style>
</head>
<body>

<!-- Your HTML content here -->
<h5><a href="#" id="myAnchor" onclick="view()">Add vol</a></h5>

<script>
function view() {
alert("hi");
  $.ajax({
    url: 'vol.php',
    type: 'POST',
    data: { farmerId: "abc" },
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

</body>
</html>
