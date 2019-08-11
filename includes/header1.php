<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SLIATE RESERACH SYMPOSIUM-2018</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

<style>
/* Style the header */
header {
    background-color: #2E3E6A;
    padding: 40px;
    text-align: center;
    font-size: 35px;
    color: white;
}
</style>


</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">
       <div class="pull-right">
         <?php 

    if(isset($_SESSION['user_id'])){

        echo '<div id="b1" onload="hideIn()"><a href="logout.php"><button  class="btn btn-primary">Log Out</button></a></div>';


      }else{

        echo '<div id="b2" onload="hideOUT()"><a href="login.php"><button  class="btn btn-primary" >Login</button></a></div>';
     }

  ?>

  <script>
    function hideOUT(){
      var x = document.getElementById('b1');
      var y = document.getElementById('b2');
      x.style.display = "none";
      y.style.display = "block";
    }

  </script>

    <script>
    function hideIn(){
      var x = document.getElementById('b1');
      var y = document.getElementById('b2');
      x.style.display = "block";
      y.style.display = "none";
    }

  </script>

       </div>

      <div id="logo" class="pull-left">
        <h1><a href="#intro" ><img src="img/logoss.png" alt="" title="" style="width: 300px; height: 60px;" /></a></h1>                
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>         
           <li class="menu-has-children"><a href="#">About Us</a>
            <ul>
              <li><a href="aboutsliate.php">ABOUTH SLIATE</a></li>
              <li><a href="about.php">ABOUTH SYMPOSIUM</a></li>

            </ul>
          </li>
          <li class="menu-has-children"><a href="#">SYMPOSIUM</a>
            <ul>
             <!-- <li><a href="symposium_schedule.php">SYMPOSIUM SHEULE</a></li>-->
              
              <li><a href="keynote.php">KEYNOTE SPEKERS</a></li>
              <li><a href="past.php">PAST SYMPOSIUM - 2017</a></li>             
            </ul>
          </li>

          <li><a href="announce.php">ANNOUNCEMENT</a></li> 
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="news.php">NEWS</a></li>          
          <li><a href="contact.php">CONTACT US</a></li>          
        </ul>
        <br>
        <br>        
      </nav><!-- #nav-menu-container -->
    </div>
</header>

  