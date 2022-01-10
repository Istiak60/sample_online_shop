<?php
session_start();
    include("connection.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD']== "POST")
    {
      //somthing was posted
     $user_name = $_POST['user_name'];
     $password = $_POST['password'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];
     $user_type =$_POST['user_type'];
     $address = $_POST['address'];
     $check =$_POST['check'];

        if((!empty($user_name) && !empty($password)  &&  !is_numeric($user_name) && $user_type=='User') || (!empty($user_name) && !empty($password)  &&  !is_numeric($user_name) && $user_type=='Admin'&& $check==$email+'admin123'))
        {
            
            $query = "INSERT INTO `users` (`user_name`, `password`, `email`, `contact`, `user_type`, `address`, `check`) 
            VALUES (:user_name, :password, :email, :contact, :user_type, :address, :check);";
            $conn = new PDO("mysql:host=localhost;dbname=bookcafe1_db", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);

            $stmt->bindParam(':user_name',$user_name);
            $stmt->bindParam(':password',$password);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':contact',$contact);
            $stmt->bindParam(':user_type',$user_type);
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':check',$check);

            $result = $stmt->execute();

            header("Location: login.php");
            die;
        }
        else{

            echo "please enter some correct data ";
        }




    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png"  href="img/logo4.png" sizes="16x4">

    <link rel="stylesheet" href="signup.css">
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

<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='Admin')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script>
<style>
    .header{
        height:180vh;
    }
</style>


    <title>Sign up</title>
</head>

<body>
<section class="header">
    
      
     
    
   
    
    
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
         
          


<!-- if condition to check user type--> 



        </li></ul> 
       

      </div>
      
      
      <i class="fa fa-bars" onclick="showmenu()"></i>
    </nav>
    <center >
        <div class="card" style="background-color:rgba(255,255,255,0.5);width:500px">
            <form method="post">
                <h1><b>Create Your Account</b></h3>

                    <!-- NAME -->
                    <div class="name">
                        <div class="form-elements">
                            <label for="name"></label>
                            Name
                        </div>
                    </div>
                    <div class="fields">
                        <input type="text" id="text" name ="user_name" style="width: 200px; height: 20px;" />
                    </div>

                    <!-- EMAIL-->
                    <div class="email">
                        <div class="form-elements">
                            <label for="email"></label>
                            Email
                        </div>
                    </div>
                    <div class="fields">
                        <input type="email" id="text" name ="email" style="width: 200px; height: 20px;" />
                    </div> 

                    <!-- PASSWORD -->
                    <div class="password">
                        <div class="form-elements">
                            <label for="password"></label>
                            Password
                        </div>
                    </div>
                    <div class="fields">
                        <input type="password" id="text" name ="password" style="width: 200px; height: 20px;" />
                    </div>

                   
                    

                    <!-- contact -->
                    <div class="contact">
                        <div class="form-elements">
                            <label for="contact"></label>
                            Contact
                        </div>
                    </div>

                  
                    <div class="fields">
                        <input type="text" id="contact" name ="contact" style="width: 200px; height: 20px;" />
                    </div> 
                      <!-- user type -->
                    <select id="user_type" name="user_type" onchange='CheckColors(this.value);' style="width: 200px; height: 35px;margin:7px 0px 5px 0px" />
                   
                    <option>Select User Type</option> 
                   
                   <option name="User" value="User">User</option>
                   <option name="Admin" value="Admin">Admin</option>
                 
                   </select>
                   <br>
                  
                
                  <input type="password" name="check" id="color" placeholder="Verify yourself" style="width: 200px; height: 25px;margin-top:20px;"/>





                    <!-- address -->

                    <div class="address">
                        <div class="form-elements">
                            <label for="address">
                                Address
                            </label>
                        </div>
                    </div>
                    <div class="fields">
                        <textarea name="address" id="address" cols="20" rows="5" style="width: 200px;">
                        </textarea>
                    </div>
                    
                
                    <!-- SUBMIT -->
                    <div class="labels">
                        
                            
                            <input id="button" type="submit" value="Signup"style="background-color: rgb(114, 12, 76);color:white; border-radius: 5px;" /><br><br>
                    
                    
                    </div>
                    <footer>
                        <p>Already Have an account?<a href="login.php">Log in</a></p>

                    </footer>
            </form>
        </div>
    </center>

  </section>
 <!-- Footer -->
  
 <footer class="bg-dark text-center text-white"  id="footer">
 
 <h4 style="padding:20px;font-size:30px;font-weight:bold;" >About Us</h4>
   <p>
   We are trying to give books from our book cafe very easily and at low cost.<br> Since people are
    not interested in reading books now, we have taken this initiative.<br> Hopefully we will be
                   able to deliver books to everyone's doorsteps
   </p>


 <!-- Grid container -->
 <div class="container p-4 pb-0">
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

</body>

</html>