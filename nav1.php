<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Publisher</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="dianav.css">
 <link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="ind.css">


    <style>
    
.outer-div {
    display: flex;
    flex-direction: row;
    align-items: center; /* Center items horizontally */
  }

  @media screen and (max-width: 768px) {
    .outer-div {
      flex-direction: row; /* Adjust flex direction for smaller screens */
      justify-content: center;
      
    }
    .inner-div {
      width: 100%; /* Make inner div take full width on smaller screens */
      margin-top: 10px; /* Adjust margin for smaller screens */
    }

    
  }
ul {
      list-style-type: none;
      padding: 0;
     
    }

    li {
      display: inline-block;
      margin-right: 10px;
    
      
    }
     .navbar-text a:hover{
      border-bottom: 2px solid orange;
     
     }
     .col-md-8 h2 span:hover{
      border-bottom: 2px solid white;
      
     }
     .col-md-8 h5 span:hover{
      border-bottom: 2px solid white;
      
     }

     .nav-item:hover .dropdown-menu {
      display: block;
	z-index:1019;
    }

    .navbar-nav .nav-item:hover .dropdown-menu {
      display: block;
    }
    .dropdown-menu a span:hover{
      border-bottom: 2px solid orange;
      background-color: transparent;
    }
    .dropdown-menu a:hover{
      background-color: transparent;
    }
    .bottomhover a:hover{
      border-bottom: 2px solid orange;
    }
    .bottomhover1 a:hover{
      border-bottom: 2px solid orange;
      color: black;
    }
    .nav-item a span:hover{
      border-bottom: 2px solid orange;
    }

    /*For Article css*/
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        border-bottom: 2px solid #000000;
        position: relative;
    }


.sub-div {
  flex: 1;
  margin: 10px;
  text-align: center;
}

.sub-div img {
  width: 150px; /* Set the width of the image to 100% of its parent div */
  height: auto; /* Maintain the aspect ratio */
  
}

    .nav-tabs .nav-item.show .nav-link::before, .nav-tabs .nav-link.active::before {
        content: "";
        display: block;
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #fe7323;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
    }

    .nav-tabs .nav-item.show .nav-link:hover::before, .nav-tabs .nav-link.active:hover::before {
        transform: scaleX(1);
    }

    /*Button hover*/
    .om {
  background-color:#114E5E;
  border: none;
  color: black;
  padding: 5px 5px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  /* transition: 0.3s; */
  border: 2px solid #114E5E;;
}

.om:hover {
  background-color: white;
  color: white;
  border: 2px solid orange;
}

.hover-bg-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      transition: background-color 0.3s ease;
    }

    .hover-bg-btn:hover {
      background-color: #0056b3;
    }


    /* Custom CSS for sticky navbar */

   
    .sticky-top {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1020; /* Ensure it's above the content */
    }

    /* Second navbar initially hidden */
    .sticky-top.hidden {
      display: none;
	
    }

    </style>
  </head>
<body>





<?php




if(isset($_SESSION["name"])){
$nam=$_SESSION["name"];
if ($_SESSION["res"]==0)


{
echo'
     <!--This is head section-->
<header>
  <center> <a href="index.php"><img src="sknscoeheader.jpg" width="50%" ></a></center>

<!--Nav 1-->
<div style="display: flex; margin-bottom: 2%;">
<div style="width: 75%;">
<div class="container">
    <table style="width: 40%; " >
      <tbody >
        <tr >
          <td rowspan="2" ><a  href="#" style=" text-decoration: none;color: black;margin-left: 18%;"><img src="sknscoeicon.jpg" width="75px"></a></td>
          <td style="text-align: left; padding-top: 5%; padding-bottom: 0%;"><b>IJRCSIT</b><br><b> SKNSCOE Pandharpur</b></td>
        </tr>
        
      </tbody>
    </table>
  </div> 

   

  </div>
<div style="width: 25%;">
<nav class="navbar navbar-expand-lg navbar-light " >
<div class="container-fluid" >
  
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <!-- <a class="navbar-brand me-auto mb-2 mb-lg-0" href="index.php" style="width: 15%;"><img src="sknscoeicon.jpg" width="25%">IJRCSIT.SKNSCOE Pandharpur</a>
   

   

    <span class="navbar-text">
     
      <a href="all_issue.php" class="belowborder" style="text-decoration: none ;color: black;">Journals & Books</a>
      
    
    </span> -->

    
    <span class="navbar-text" style="margin-top: 13%;">
     
      <a href="all_issue.php" class="belowborder" style="text-decoration: none ;color: black;">Journals & Books</a>
      
    
    </span>
    
    <span>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-top:20%; ">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="logout.php"> <button class="btn bg-white " style="border-color: coral;" type="submit">Logout</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link justify-content-end" aria-current="page" href="" > <button class="btn btn-outline-info" type="submit" >U:'.$_SESSION["name"].'</button></a>
        </li>
        
        
      </ul>
     
    </span>
  </div>
</div>
</nav>
</div>
</div>
  <!--This is Big heading container-->



<div  class="container-fluid " style="background-color:#114E5E; height: 7%;">
<div class="container">
<div class="row" >
  <div class="col-md-12" style="margin-top: 5%;margin-bottom:5%;">
    
    <h2 style="color: white; "><span>International Journal of Research in Computer Science and Information Technology</span></h2>
  </div>

</div>
</div>
</div>
</div>


<!--This is nav2 in nav1-->
<div class="container-fluid" style="border-bottom:2px solid gray;">
<div class="container">
<div class="row" style="color: black;">
   

<div class="col-md-8" style="color: black; border-right: 1px solid gray; border-bottom: 1px solid gray;border-left: 1px solid gray;">
  <div class="outer-div">
    <div class="col-md-7 inner-div" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav" >

<li class="nav-item dropdown"  style="margin-left: 7%;">
  <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Article & Issue 
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
      <a class="dropdown-item" href="latestissue.php"><span>Latest Issue</span></a>
      <a class="dropdown-item" href="all_issue.php"><span>All Issues</span></a>

       </div>
</li>
<li class="nav-item dropdown" style="margin-left: 7%;">
  <a style="color: black; "  class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      About
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
      <a class="dropdown-item" href="aims_scopes.php"> <span>Aims and scops</span></a>
      <a class="dropdown-item" href="index.php#editor"> <span>Editorial board</span></a>
      <a class="dropdown-item" href="Journal_Insights.php"> <span>Journal insights</span></a>
     
  </div>
</li>

<li class="nav-item dropdown"  style="margin-left: 7%;">
  <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Publish
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
      <a class="dropdown-item" href="yourarticle.php"><span>see your article</span></a>
  </div>
</li>

</ul>
</div>





</nav>
  </div>
<div class="col-md-5 inner-div" style="border-left: 1px solid gray; padding-left: 2%;" >
  
     <span class="navbar-text col-md-4">
     <form class="d-flex" style="margin-top: 2px;" method="post"  action="search.php">
       <input class="form-control me-2"  type="search"  placeholder="Search" id="searchff" name="searchff" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
   </span>
 

</div>
</div>
</div>

<div class="col-md-4" style="border-right: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray; padding: 0;">
   <div class="outer-div">
<div class="col-md-6 inner-div" >
 <h6 style="text-align: center; margin-top: 15px; padding-bottom: 6%;padding-left: 2%;padding-right: 2%;" class="bottomhover"> <a  href="uplaodthesis.php"  role="button"  style="color: black;text-decoration: none;"> Submit your article</a></h6>

</div>
<div class="col-md-6 inner-div"  style="border-left: 1px solid gray;">
 <h6 style="text-align: center;margin-top: 15px; padding-bottom: 6%; padding-left: 2%;padding-right: 2%;" class="bottomhover"> <a  href="guide_Author.php"  role="button"  style="color: black;text-decoration: none;">Guide for authors</a></h6>

</div>
</div>
</div>


</div>
</div>
</div>

</header>

<!--Sticky navbar 2nd-->
<nav  id="navbar2" class="sticky-top hidden">

<div  class="container-fluid " style="background-color:#114E5E; height: 40%;">
<div >
<div class="row">
  <div class="col-md-9">
    
    <h4 style="color: white; margin-top: 2%; margin-bottom: 2%;"><span>IJRCSIT.SKNSCOE Pandharpur </span></h4>
    
  </div>
    <div class="col-md-3" style="background-color: rgb(29, 27, 27);">
 <h6 style="text-align: center; margin-top: 7%" class="bottomhover"> <a  href="uplaodthesis.php"  role="button"  style="color: white;text-decoration: none;">Submit your article<img src="whitearrow.png" width="6%"></a></h6>

</div>

</div>
</div>
</div>

<!--this is nav-->
<div class="container-fluid" style=" background-color: white;">
  <div >
  <div class="row" style="color: black;">
     
  
  <div class="col-md-12" style="color: black; border-right: 1px solid gray; border-bottom: 1px solid gray;border-left: 1px solid gray;">
    <div class="outer-div">
      <div class="col-md-7 inner-div" >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav" >
  
  <li class="nav-item dropdown"  style="margin-left: 7%;">
    <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Article & Issue 
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="latestissue.php"><span>Latest Issue</span></a>
        <a class="dropdown-item" href="all_issue.php"><span>All Issues</span></a>
        
    </div>
  </li>
  <li class="nav-item dropdown" style="margin-left: 7%;">
    <a style="color: black; "  class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        About
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="aims_scopes.php"> <span>Aims and scops</span></a>
        <a class="dropdown-item" href="index.php#editor"> <span>Editorial board</span></a>
        <a class="dropdown-item" href="Journal_Insights.php"> <span>Journal insights</span></a>
        
    </div>
  </li>
  
  <li class="nav-item dropdown"  style="margin-left: 7%;">
    <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Publish
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="yourarticle.php"><span>your article</span></a>
    </div>
  </li>
  
  </ul>
  </div>
  
  
  
  
  
  </nav>
    </div>
  <div class="col-md-5 inner-div" style="border-left: 1px solid gray; padding-left: 2%;" >
    
       <span class="navbar-text col-md-4">
       <form class="d-flex" style="margin-top: 2px;" method="post"  action="search.php">
       <input class="form-control me-2"  type="search"  placeholder="Search" id="searchff" name="searchff" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
     </span>
   
  
  </div>
  </div>
  </div>
  
  <div class="col-md-3" style="border-right: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray; padding: 0;">
     <div class="outer-div">
  
  </div>
  </div>
  
  
  </div>
  </div>
  </div>

</nav>';
}






if ($_SESSION["res"]==1)


{
echo'
<!--This is head section-->
<header>
  <center> <a href="index.php"><img src="sknscoeheader.jpg" width="50%" ></a></center>

<!--Nav 1-->
<div style="display: flex; margin-bottom: 2%;">
<div style="width: 75%;">
<div class="container">
    <table style="width: 40%; " >
      <tbody >
        <tr >
          <td rowspan="2"><a  href="#" style=" text-decoration: none;color: black;margin-left: 18%;"><img src="sknscoeicon.jpg" width="75px"></a></td>
          <td style="text-align: left; padding-top: 5%; padding-bottom: 0%;"><b>IJRCSIT</b><br><b> SKNSCOE Pandharpur</b></td>
        </tr>
        
      </tbody>
    </table>
  </div>
   

   

  </div>
<div style="width: 25%;">
<nav class="navbar navbar-expand-lg navbar-light " >
<div class="container-fluid" >
  
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <!-- <a class="navbar-brand me-auto mb-2 mb-lg-0" href="index.php" style="width: 15%;"><img src="sknscoeicon.jpg" width="25%">IJRCSIT.SKNSCOE Pandharpur</a>
   

   

    <span class="navbar-text">
     
      <a href="all_issue.php" class="belowborder" style="text-decoration: none ;color: black;">Journals & Books</a>
      
    
    </span> -->

    
    <span class="navbar-text" style="margin-top: 13%;">
     
      <a href="all_issue.php" class="belowborder" style="text-decoration: none ;color: black;">Journals & Books</a>
      
    
    </span>
    
    <span>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-top:20%; ">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="logout.php"> <button class="btn bg-white " style="border-color: coral;" type="submit">Logout</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link justify-content-end" aria-current="page" href="#" > <button class="btn btn-outline-info" type="submit" >A:'.$_SESSION["name"].'</button></a>
        </li>
        
        
      </ul>
     
    </span>
  </div>
</div>
</nav>
</div>
</div>
  <!--This is Big heading container-->



<div  class="container-fluid " style="background-color:#114E5E; height: 7%;">
<div class="container">
<div class="row" >
 <div class="col-md-12" style="margin-top: 5%;margin-bottom:5%;">
    
    <h2 style="color: white; "><span>International Journal of Research in Computer Science and Information Technology</span></h2>
  </div>

</div>
</div>
</div>
</div>


<!--This is nav2 in nav1-->
<div class="container-fluid" style="border-bottom:2px solid gray;">
<div class="container">
<div class="row" style="color: black;">
   

<div class="col-md-8" style="color: black; border-right: 1px solid gray; border-bottom: 1px solid gray;border-left: 1px solid gray;">
  <div class="outer-div">
    <div class="col-md-7 inner-div" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav" >

<li class="nav-item dropdown"  style="margin-left: 7%;">
  <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Article & Issue 
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
      <a class="dropdown-item" href="latestissue.php"><span>Latest Issue</span></a>
      <a class="dropdown-item" href="all_issue.php"><span>All Issues</span></a>

        </div>
</li>
<li class="nav-item dropdown" style="margin-left: 7%;">
  <a style="color: black; "  class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      About
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
      <a class="dropdown-item" href="aims_scopes.php"> <span>Aims and scops</span></a>
      <a class="dropdown-item" href="index.php#editor"> <span>Editorial board</span></a>
      <a class="dropdown-item" href="Journal_Insights.php"> <span>Journal insights</span></a>
      
  </div>
</li>

<li class="nav-item dropdown"  style="margin-left: 7%;">
  <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Assesment
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
      <a class="dropdown-item" href="review.php"><span>Asses article</span></a>
  </div>
</li>

</ul>
</div>





</nav>
  </div>
<div class="col-md-5 inner-div" style="border-left: 1px solid gray; padding-left: 2%;" >
  
     <span class="navbar-text col-md-4">
     <form class="d-flex" style="margin-top: 2px;" method="post"  action="search.php">
       <input class="form-control me-2"  type="search"  placeholder="Search" id="searchff" name="searchff" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
   </span>
 

</div>
</div>
</div>

<div class="col-md-4" style="border-right: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray; padding: 0;">
   <div class="outer-div">
<div class="col-md-6 inner-div" >
 <h6 style="text-align: center; margin-top: 15px; padding-bottom: 6%;padding-left: 2%;padding-right: 2%;" class="bottomhover">
 <a      onclick="viewq()" style="color: black;text-decoration: none;"> add Volume</a></h6>

</div>
<div class="col-md-6 inner-div"  style="border-left: 1px solid gray;">
 <h6 style="text-align: center;margin-top: 15px; padding-bottom: 6%; padding-left: 2%;padding-right: 2%;" class="bottomhover"> <a  href="guide_Author.php"  role="button"  style="color: black;text-decoration: none;">Guide for authors</a></h6>

</div>
</div>
</div>


</div>
</div>
</div>

</header>

<!--Sticky navbar 2nd-->
<nav  id="navbar2" class="sticky-top hidden">

<div  class="container-fluid " style="background-color:#114E5E; height: 40%;">
<div >
<div class="row">
  <div class="col-md-9">
    
    <h4 style="color: white; margin-top: 2%; margin-bottom: 2%;"><span>IJRCSIT.SKNSCOE Pandharpur </span></h4>
    
  </div>
    <div class="col-md-3" style="border: 1px solid gray;background-color: rgb(29, 27, 27);">
 <h6 style="text-align: center; margin-top: 7%" class="bottomhover"> <a  href="#"  role="button"  style="color: white;text-decoration: none;">Add volume<img src="whitearrow.png" width="6%"></a></h6>

</div>

</div>
</div>
</div>

<!--this is nav-->
<div class="container-fluid" style="background-color: white;">
  <div >
  <div class="row" style="color: black;">
     
  
  <div class="col-md-12" style="color: black; border-right: 1px solid gray; border-bottom: 1px solid gray;border-left: 1px solid gray;">
    <div class="outer-div">
      <div class="col-md-7 inner-div" >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav" >
  
  <li class="nav-item dropdown"  style="margin-left: 7%;">
    <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Article & Issue 
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="latestissue.php"><span>Latest Issue</span></a>
        <a class="dropdown-item" href="all_issue.php"><span>All Issues</span></a>
       
    </div>
  </li>
  <li class="nav-item dropdown" style="margin-left: 7%;">
    <a style="color: black; "  class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        About
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="aims_scopes.php"> <span>Aims and scops</span></a>
        <a class="dropdown-item" href="index.php#editor"> <span>Editorial board</span></a>
        <a class="dropdown-item" href="Journal_Insights.php"> <span>Journal insights</span></a>
        
    </div>
  </li>
  
  <li class="nav-item dropdown"  style="margin-left: 7%;">
    <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Assesment
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="review.php"><span>Asses article</span></a>
    </div>
  </li>
  
  </ul>
  </div>
  
  
  
  
  
  </nav>
    </div>
  <div class="col-md-5 inner-div" style="border-left: 1px solid gray; padding-left: 2%;" >
    
       <span class="navbar-text col-md-4">
       <form class="d-flex" style="margin-top: 2px;" method="post"  action="search.php">
       <input class="form-control me-2"  type="search"  placeholder="Search" id="searchff" name="searchff" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
     </span>
   
  
  </div>
  </div>
  </div>
  
  <div class="col-md-3" style="border-right: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray; padding: 0;">
     <div class="outer-div">
 
  </div>
  </div>
  
  
  </div>
  </div>
  </div>

</nav>';
}







}
else 
{

echo'
     <!--This is head section-->
<header>
  <center> <a href="index.php"><img src="sknscoeheader.jpg" width="50%" ></a></center>

<!--Nav 1-->
<div style="display: flex; margin-bottom: 2%;">
<div style="width: 75%;">
<div class="container">
    <table style="width: 40%; " >
      <tbody >
        <tr >
          <td rowspan="2" ><a  href="#" style=" text-decoration: none;color: black;margin-left: 18%;"><img src="sknscoeicon.jpg" width="75px"></a></td>
          <td style="text-align: left; padding-top: 5%; padding-bottom: 0%;"><b>IJRCSIT</b><br><b> SKNSCOE Pandharpur</b></td>
        </tr>
        
      </tbody>
    </table>
  </div>
   

   

  </div>
<div style="width: 25%;">
<nav class="navbar navbar-expand-lg navbar-light " >
<div class="container-fluid" >
  
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <!-- <a class="navbar-brand me-auto mb-2 mb-lg-0" href="index.php" style="width: 15%;"><img src="sknscoeicon.jpg" width="25%">IJRCSIT.SKNSCOE Pandharpur</a>
   

   

    <span class="navbar-text">
     
      <a href="all_issue.php" class="belowborder" style="text-decoration: none ;color: black;">Journals & Books</a>
      
    
    </span> -->

    
    <span class="navbar-text" style="margin-top: 13%;">
     
      <a href="all_issue.php" class="belowborder" style="text-decoration: none ;color: black;">Journals & Books</a>
      
    
    </span>
    
    <span>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-top:20%; ">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="register.php"> <button class="btn bg-white " style="border-color: coral;" type="submit">Register</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link justify-content-end" aria-current="page" href="login1.php" > <button class="btn btn-outline-info" type="submit" >Sign in</button></a>
        </li>
        
        
      </ul>
     
    </span>
  </div>
</div>
</nav>
</div>
</div>
  <!--This is Big heading container-->



<div  class="container-fluid " style="background-color:#114E5E; height: 7%;">
<div class="container">
<div class="row" >
 <div class="col-md-12" style="margin-top: 5%;margin-bottom:5%;">
    
    <h2 style="color: white; "><span>International Journal of Research in Computer Science and Information Technology</span></h2>
  </div>

</div>
</div>
</div>
</div>


<!--This is nav2 in nav1-->
<div class="container-fluid" style="border-bottom:2px solid gray;">
<div class="container">
<div class="row" style="color: black;">
   

<div class="col-md-8" style="color: black; border-right: 1px solid gray; border-bottom: 1px solid gray;border-left: 1px solid gray;">
  <div class="outer-div">
    <div class="col-md-7 inner-div" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav" >

<li class="nav-item dropdown"  style="margin-left: 7%;">
  <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Article & Issue 
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
      <a class="dropdown-item" href="latestissue.php"><span>Latest Issue</span></a>
      <a class="dropdown-item" href="all_issue.php"><span>All Issues</span></a>

       </div>
</li>
<li class="nav-item dropdown" style="margin-left: 7%;">
  <a style="color: black; "  class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      About
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
      <a class="dropdown-item" href="aims_scopes.php"> <span>Aims and scops</span></a>
      <a class="dropdown-item" href="index.php#editor"> <span>Editorial board</span></a>
      <a class="dropdown-item" href="Journal_Insights.php"> <span>Journal insights</span></a>
      
  </div>
</li>

<li class="nav-item dropdown"  style="margin-left: 7%;">
  <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Publish
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
      <a class="dropdown-item" href="login1.php"><span>Login to see your article</span></a>
  </div>
</li>

</ul>
</div>





</nav>
  </div>
<div class="col-md-5 inner-div" style="border-left: 1px solid gray; padding-left: 2%;" >
  
     <span class="navbar-text col-md-4">
     <form class="d-flex" style="margin-top: 2px;" method="post"  action="search.php">
       <input class="form-control me-2"  type="search"  placeholder="Search" id="searchff" name="searchff" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
   </span>
 

</div>
</div>
</div>

<div class="col-md-4" style="border-right: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray; padding: 0;">
   <div class="outer-div">
<div class="col-md-6 inner-div" >
 <h6 style="text-align: center; margin-top: 15px; padding-bottom: 6%;padding-left: 2%;padding-right: 2%;" class="bottomhover"> <a  href="#"  role="button"  style="color: black;text-decoration: none;"> Submit your article</a></h6>

</div>
<div class="col-md-6 inner-div"  style="border-left: 1px solid gray;">
 <h6 style="text-align: center;margin-top: 15px; padding-bottom: 6%; padding-left: 2%;padding-right: 2%;" class="bottomhover"> <a  href="guide_Author.php"  role="button"  style="color: black;text-decoration: none;">Guide for authors</a></h6>

</div>
</div>
</div>


</div>
</div>
</div>

</header>

<!--Sticky navbar 2nd-->
<nav  id="navbar2" class="sticky-top hidden">

<div  class="container-fluid " style="background-color:#114E5E; height: 40%;">
<div>
<div class="row">
  <div class="col-md-9">
    
    <h4 style="color: white; margin-top: 2%; margin-bottom: 2%;"><span>IJRCSIT.SKNSCOE Pandharpur </span></h4>
    
  </div>
    <div class="col-md-3" style="background-color: rgb(29, 27, 27);">
 <h6 style="text-align: center; margin-top: 7%" class="bottomhover"> <a  href="login1.php"  role="button"  style="color: white;text-decoration: none;">login to Submit your article<img src="whitearrow.png" width="6%"></a></h6>

</div>

</div>
</div>
</div>

<!--this is nav-->
<div class="container-fluid" style=" background-color: white;">
  <div >
  <div class="row" style="color: black;">
     
  
  <div class="col-md-12" style="color: black; border-right: 1px solid gray; border-bottom: 1px solid gray;border-left: 1px solid gray;">
    <div class="outer-div">
      <div class="col-md-7 inner-div" >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav" >
  
  <li class="nav-item dropdown"  style="margin-left: 7%;">
    <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Article & Issue 
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
        <a class="dropdown-item" href="latestissue.php"><span>Latest Issue</span></a>
        <a class="dropdown-item" href="all_issue.php"><span>All Issues</span></a>
        
    </div>
  </li>
  <li class="nav-item dropdown" style="margin-left: 7%;">
    <a style="color: black; "  class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        About
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="aims_scopes.php"> <span>Aims and scops</span></a>
        <a class="dropdown-item" href="index.php#editor"> <span>Editorial board</span></a>
        <a class="dropdown-item" href="Journal_Insights.php"> <span>Journal insights</span></a>
        
    </div>
  </li>
  
  <li class="nav-item dropdown"  style="margin-left: 7%;">
    <a style="color: black; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Publish
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="#"><span>login to see your article</span></a>
    </div>
  </li>
  
  </ul>
  </div>
  
  
  
  
  
  </nav>
    </div>
  <div class="col-md-5 inner-div" style="border-left: 1px solid gray; padding-left: 2%;" >
    
       <span class="navbar-text col-md-4">
       <form class="d-flex" style="margin-top: 2px;" method="post"  action="search.php">
       <input class="form-control me-2"  type="search"  placeholder="Search" id="searchff" name="searchff" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
     </span>
   
  
  </div>
  </div>
  </div>
  
  <div class="col-md-3" style="border-right: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray; padding: 0;">
     <div class="outer-div">
  
  </div>
  </div>
  
  
  </div>
  </div>
  </div>

</nav>';

}






?>


<div style="display: none;
            position: absolute;
            z-index: 1019;
            left: 0;
            top: 0;
            width: 17.6%;
            height: auto;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);" id="searchbox">
<div style=" background-color: #fefefe;
            
            border: 1px solid #888;
            width: 100%;
height: 40	%;">
<span class="close" onclick="closesearchbox()">&times;</span>
    <h2>Add Volume</h2>

<br>
<br>

    <form action="vol.php" method="post" enctype="multipart/form-data">
     


<div class="mb-3">
  <label for="title" class="form-label">Write all volume numbers as Arabic numerals and italicize (no abbreviation for volume). The issue number proceeds immediately after the volume and is not italicized. Place all issue information within parentheses.</label>
  <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
</div>
      

<button type="submit" class="btn btn-success" name="submitreview">Submit</button>
 <inputtype="button" class="btn btn-danger" onclick="closesearchbox()">cancel</button>
    </form><br>


  </div>
</div>






<div style="display: none;
            position: absolute;
            z-index: 1020;
            
            
            height: auto;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);" id="stickysearchbox">
<div style=" background-color: #fefefe;
            
            border: 1px solid #888;
            width: 100%;
height: 40	%;">
<span class="close" onclick="closestickysearchbox()">&times;</span>
   

<br>
<br>

    <form action="vol.php" method="post" enctype="multipart/form-data">
     


<div class="mb-3">
  <label for="title" class="form-label">Write all volume numbers as Arabic numerals and italicize (no abbreviation for volume). The issue number proceeds immediately after the volume and is not italicized. Place all issue information within parentheses.</label>
  <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
</div>
      

<button type="submit" class="btn btn-success" name="submitreview">Submit</button>
 <inputtype="button" class="btn btn-danger" onclick="closevolname()">cancel</button>
    </form><br>


  </div>
</div>





<div class="dialog-box" id="volname">
<div class="dialog-content">
<span class="close" onclick="closevolname()">&times;</span>
    <h2>Add Volume</h2>

<br>
<br>

    <form action="vol.php" method="post" enctype="multipart/form-data">
     


<div class="mb-3">
  <label for="title" class="form-label">Write all volume numbers as Arabic numerals and italicize (no abbreviation for volume). The issue number proceeds immediately after the volume and is not italicized. Place all issue information within parentheses.</label>
  <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
</div>
      

<button type="submit" class="btn btn-success" name="submitreview">Submit</button>
 <inputtype="button" class="btn btn-danger" onclick="closevolname()">cancel</button>
    </form><br>


  </div>
</div>













<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

$(document).ready(function() {


});


// Show or hide the second navbar based on the scroll position of the first navbar
$(window).scroll(function() {
var scrollTop = $(window).scrollTop();
if (scrollTop > 525) {
$("#navbar1").addClass("hidden");
$("#navbar2").removeClass("hidden");
} else {
$("#navbar1").removeClass("hidden");
$("#navbar2").addClass("hidden");
}
});





function searchf(){


document.getElementById('searchbox').style.display = 'block';



}

function closesearchbox() {
        document.getElementById('searchbox').style.display = 'none';
    }






function viewq() {
document.getElementById('volname').style.display = 'block';
}
 function closevolname() {
        document.getElementById('volname').style.display = 'none';
    }










function updateMargin() {


    var element = document.getElementById('searchff');
    var x = element.offsetLeft;
    var z =element.offsetRight;
    var y = element.offsetTop+38;
    
    // Set the margin of otherDivision based on the position of yourElementId
    var otherDivision = document.getElementById('searchbox');
    otherDivision.style.marginLeft = x + 'px';
otherDivision.style.marginRight = z + 'px';
    otherDivision.style.marginTop = y + 'px';
}


updateMargin();

window.addEventListener('resize', updateMargin);
window.addEventListener('scroll', updateMargin);




</script>



</body>
</html>