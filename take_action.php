<?php
session_start();
require('conn.php'); 


if (isset($_POST['acceptthesis'])) {

$f=0;

 if (isset($_POST['setsp']) && $_POST['setsp'] == 'on') {
$f=1;
}

    $sql = "INSERT INTO accepted_thesis (id, date_action,sp) VALUES (".$_SESSION['idd'].", CURDATE(),".$f.")";
    $result = $conn->query($sql);
    if ($result) {
	  $sql = "UPDATE thesis set status=3 WHERE id=".$_SESSION['idd'];
    $result = $conn->query($sql);
	   echo "<script type='text/javascript'>alert('Accepted'); window.location.href = 'review.php';</script>";
        //echo "<script type='text/javascript'>alert('Accepted');</script>";
    } else {
	    echo "<script type='text/javascript'>alert('Error'); window.location.href = 'view.php';</script>";
       //echo "<script type='text/javascript'>alert('error');</script>";
    }
}


if (isset($_POST['rejectthesis'])) {
$sql = "INSERT INTO rejected_thesis (id, date_action, reason) VALUES (".$_SESSION['idd'].", CURDATE(), '".$_POST['reason_reject']."')";
    $result = $conn->query($sql);
    if ($result) {
	$sql = "UPDATE thesis set status=1 WHERE id=".$_SESSION['idd'];
    $result = $conn->query($sql);
 echo "<script type='text/javascript'>alert('Rejected'); window.location.href = 'review.php';</script>";
       // echo "<script type='text/javascript'>alert('sent for review');</script>";
    } else {
	    echo "<script type='text/javascript'>alert('Error'); window.location.href = 'view.php';</script>";
       // echo "<script type='text/javascript'>alert('error');</script>";
    }
}

if (isset($_POST['reviewthesis'])) {
    $sql = "INSERT INTO review_thesis (id, date_action, reason) VALUES (".$_SESSION['idd'].", CURDATE(), '".$_POST['reason_review']."')";
    $result = $conn->query($sql);
    if ($result) {
$sql = "UPDATE thesis set status=2 WHERE id=".$_SESSION['idd'];
    $result = $conn->query($sql);
 echo "<script type='text/javascript'>alert('Sent for review'); window.location.href = 'review.php';</script>";
       // echo "<script type='text/javascript'>alert('sent for review');</script>";
    } else {
	    echo "<script type='text/javascript'>alert('Error'); window.location.href = 'view.php';</script>";
       // echo "<script type='text/javascript'>alert('error');</script>";
    }
}


if (isset($_POST['deletethesis'])) {
$user_id=$_SESSION['idd'];
   $sql = "DELETE FROM thesis WHERE id = $user_id;
        DELETE FROM accepted_thesis WHERE id = $user_id;
        DELETE FROM rejected_thesis WHERE id = $user_id;
        DELETE FROM review_thesis WHERE id = $user_id;";

$result = $conn->multi_query($sql);

    if ($result) {

 echo "<script type='text/javascript'>alert('deleted Sussessfully'); window.location.href = 'yourarticle.php';</script>";
    } else {
	    echo "<script type='text/javascript'>alert('Error'); window.location.href = 'yourarticle.php';</script>";
       // echo "<script type='text/javascript'>alert('error');</script>";
    }
}


require('closecon.php');
?>