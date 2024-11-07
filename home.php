<?php require('conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Publisher</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
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
    
<div class="container">
<div class="row">
<div class="col">
<!-- Your main content here -->
<p style="margin-top: 2%;">International Journal of Research in Computer Science and Information Technology (IJRCSIT) is an international academic journal which gains a foothold in the Asia and all over the world. It aims to promote the integration of innovation in Computer Science and technology. The focus is to publish papers on state-of-the-art innovations in Computer Science and Information technology. Submitted papers will be reviewed by technical committees of the Journal and Association. The audience includes researchers, managers and operators for intelligent engineering and systems as well as designers and developers.</p>
<p style="margin-top: 1%;">All submitted articles should report original, previously unpublished research results, experimental or theoretical, and will be peer-reviewed. Articles submitted to the journal should meet these criteria and must not be under consideration for publication elsewhere. Manuscripts should follow the style of the journal and are subject to both review and editing.</p>
<p style="margin-top: 1%;">Biannualy<br><span>ISSN:2319-5010</span><br>
<span>Subject Category: Computer Science And Information Technology</span><br>
<span>Published by: SKN Sinhgad College of Engineering,Pandharpur, India.</span><br>
<span>Each accepted paper will be charged from Rs. 1000 for publishing.</span>
</p>
</div>
</div>
</div>


  

    <!--This is main Section-->
    <main>
         <!--About the journal-->

         <div class="container mt-4 " style="background-color: rgb(221, 221, 221); height: 40%;"   >
             <h5 style="margin-left: 7%; padding-top: 40px;">About the journal</h5>
             <p style="margin-left: 7%;">IJRCSIT aims to promote the integration of innovation in Computer Science and technology. The focus is to publish papers on state-of-the-art innovations in Computer Science and Information technology., …</p>
            <p class="bottomhover" style="padding-bottom: 40px;"> <a  style="text-decoration: none;margin-left: 7%; " href="aims_scopes.php">View full aims & scope</a></p>
            </div>



            <!--charges section-->

            <div class="container" style="margin-top: 5%;">
                <div class="row">
                  <div class="col-md-3" style="border-left: 2px solid black;">
                     <h2>$15</h2>
                     <span>Article publishing charge</span><br>
                     <span>for open access</span>
                  </div>
                  <div class="col-md-3" style="border-left: 2px solid black;">
                    <h2 style="margin-top: 2%;">30 days</h2>
                    <span>Submission to acceptance</span>
                    
                 </div>
                 <div class="col-md-3" style="border-left: 2px solid black;">
                  <h2 style="margin-top: 2%;">7 days</h2>
                  <span>Acceptance to publication</span>
                 
               </div>
               <div class="col-md-3" style="border-left: 2px solid black;">
                <div class="container" style="margin-top: 11%; " >
                  <div  class="bottomhover">
                  <button class="om" style="margin-right: 1%;" ><img src="arrow.png" width="50%" ></button><a href="Journal_Insights.php"  style="text-decoration: none;color: black;">View insight</a>
                  </div>
                  </div>
             </div>

                </div>
            </div>

            <!--About editor in chief-->

            <div class="container-fluid" style="background-color:#114E5E; height: 50%; margin-top: 50px;"  id="editor">
               <p  style="color: white; margin-left: 6%;padding-top: 30px;" ><strong  style="font-size: 25px;margin-right: 1%;">Editor-in-Chief</strong> </p>
             
              <div style="display: flex;" >
                <div  style="text-align: right; padding-bottom: 0%; width: 20%; " >
                 <img  src="Dr.K.J.Karande.jpg"  class="rounded-circle" alt="Dr.K.J.Karande" width="50%"> 
                </div>
                <div style="color: white;padding-top: 1%; width: 80%;margin-left: 2%;">
                
                 <div>
                  <h5>Prof. Dr. Kailash J. Karande (PhD)</h5>
                 </div>
                 <div>
                  <p>SKN Sinhgad COE Pnadharpur, affilated Punyashlok Ahilyadevi Holkar Solapur Univercity, Solapur.</p>
                 </div>
                </div>
              </div>


              <p  style="color: white; margin-left: 6%;padding-top: 30px;" ><strong  style="font-size: 25px;margin-right: 1%;">Senior-Editor</strong> </p>
             
              <div style="display: flex;" >
                <div  style="text-align: right; padding-bottom: 4%; width: 20%; " >
                 <img  src="svpingle.png"  class="rounded-circle" alt="Dr. S.V.Pingle" width="50%"> 
                </div>
                <div style="color: white;padding-top: 1%; width: 80%;margin-left: 2%;">
                
                 <div>
                  <h5>Prof. Dr. Subhash V. Pingale (PhD)</h5>
                 </div>
                 <div>
                  <p>Dept. of Computer Science & Engineering, SKN Sinhgad COE Pnadharpur, affilated Punyashlok Ahilyadevi Holkar Solapur Univercity, Solapur.</p>
                 </div>
                </div>
              </div>
              
            </div>



   
    <!--This is Footer Section-->
    <footer>
        <!--1st footer-->

        <div class="container-fluid" style="background-color: rgb(221, 221, 221) ;height: 50%;margin-top: 3%; ">
              <div class="container">
                  
              </div>
        


        <!--Card in footer-->

    


    </footer>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function viewd(farmerId) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = JSON.parse(this.responseText);
                if (result.redirect) {
                    window.location.href = result.redirect;
                } else {
                    console.log("No redirect URL received");
                }
            }
        };
        xhttp.open("POST", "processcommon.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("farmerId=" + farmerId);
    }




function downloadannouncement(farmerId) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = JSON.parse(this.responseText);
                if (result.redirect) {
                    window.location.href = result.redirect;
                } else {
                    console.log("No redirect URL received");
                }
            }
        };
        xhttp.open("POST", "processar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("farmerId=" + farmerId);
    }








function opensearchDialog() {
        document.getElementById('searchdiv').style.display = 'block';
    }

    // Function to close the dialog box
    function closesearchDialog() {
        document.getElementById('searchdiv').style.display = 'none';
    }










</script>






</body>
</html>


<?php
require('closecon.php');?>
