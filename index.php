<?php
session_start();
include("connection.php");
include("functions.php");

// $user_data = check_login($con);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="img/logo4.png" sizes="16x4">

    <title>Welcome</title>
    
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"> -->

  <!-- <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">





</head>
<body>
<section class="header" >
<nav>
            <div class="book_icon">
                <i class="fas fa-book-open"></i>
                <h2>Book Cafee</h2>
              </div>
          <div class="nav-links" id="navlinks">
            <i class="fa fa-times" onclick="hidemenu()"></i>
            <ul>
            <li><a href="#footer">ABOUT</a></li>
            <li><a href="https://goo.gl/maps/YmhKTKTKD1kPx4DP6">CONTACT</a></li>
</ul></li>
    </div>

                <i class="fa fa-bars" onclick="showmenu()"></i>
            </nav>   
        <div class="container"style="box-shadow: none; ">
           
            <div class="row">
                <div class="col-md-12">
                    <div class="book_content"style="margin-top: 15px;">
                        <h2>Book Cafee</h2>
                        <p>We are trying to give books from our book cafe very easily and at low cost. Since people are
                            not interested in reading books now, we have taken this initiative. Hopefully we will be
                            able to deliver books to everyone's doorsteps.</p>
                    </div>
                    <div class="book_btn">
                        <div class="btn_left">
                            <a href="signup.php">Sign Up</a>
                        </div>
                        <div class="btn_right">
                            <a href="login.php">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    </section>
<!-- Footer -->
  
<footer class="bg-dark text-center text-white"id="footer">
 
 <h4 style="padding:20px;font-size:30px;font-weight:bold;" >About Us</h4>
   <p>
   We are trying to give books from our book cafe very easily and at low cost.<br> Since people are
    not interested in reading books now, we have taken this initiative.<br> Hopefully we will be
                   able to deliver books to everyone's doorsteps
   </p>


 <!-- Grid container -->
 <div class="container p-4 pb-0"style="box-shadow: none">
   <!-- Section: Social media -->
   <section class="mb-4">
     <!-- Facebook -->
     <a
       class="btn btn-primary btn-floating m-1"
       style="background-color: #3b5998;"
       href="#!"
       role="button"
       ><i class="fa fa-facebook-f"></i
     ></a>

     <!-- Twitter -->
     <a
       class="btn btn-primary btn-floating m-1"
       style="background-color: #55acee;"
       href="#!"
       role="button"
       ><i class="fa fa-twitter"></i
     ></a>

     <!-- Google -->
     <a
       class="btn btn-primary btn-floating m-1"
       style="background-color: #dd4b39;"
       href="#!"
       role="button"
       ><i class="fa fa-google"></i
     ></a>

     <!-- Instagram -->
     <a
       class="btn btn-primary btn-floating m-1"
       style="background-color: #ac2bac;"
       href="#!"
       role="button"
       ><i class="fa fa-instagram"></i
     ></a>

     <!-- Linkedin -->
     <a
       class="btn btn-primary btn-floating m-1"
       style="background-color: #0082ca;"
       href="#!"
       role="button"
       ><i class="fa fa-linkedin"></i
     ></a>
     <!-- Github -->
     <a
       class="btn btn-primary btn-floating m-1"
       style="background-color:  #ac2bac;"
       href="#!"
       role="button"
       ><i class="fa fa-github"></i
     ></a>
   </section>
   <!-- Section: Social media -->
 </div>
 <!-- Grid container -->
 <p>Made With <i class="fa fa-heart-o"></i> By Books & Souls</p>
 <!-- Copyright -->
 <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright : 
    <a class="text-white" href="https://github.com/Istiak60/bookcafe">Git Hub</a>
  </div>

   
 <!-- Copyright -->
</footer>

    <!-- Bootstrap  JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>