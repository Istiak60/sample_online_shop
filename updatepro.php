<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


if($_SERVER['REQUEST_METHOD']== "POST")
{
  //somthing was posted
 $user_name = $_POST['user_name'];
 $password = $_POST['password'];
 $email = $_POST['email'];
 $contact = $_POST['contact'];
 $address = $_POST['address'];
  
 if(!empty($user_name)&&!empty($password)  &&  !is_numeric($user_name))
 {
     
     //save to database
   
     $query ="UPDATE users SET user_name ='$user_name', password ='$password',email='$email',contact ='$contact',address='$address' 
     WHERE user_name='".$user_data['user_name']."'; ";
    $result = mysqli_query($con, $query);
    if($result)
    {   function_alert("updated");
        header("Location: profile.php");
      
      
        die;
    }  
    else{

        function_alert("Enter some Correct Data");
    }
    
    
 }
 else{

    function_alert("Enter some Correct Data");
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
    <link rel="icon" type="image/png"  href="img/logo4.png" sizes="16x4">

     <link rel="stylesheet" type="text/css" href="bookupload.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signup.css">
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->	
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">	
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-9/css/all.min.css" rel="stylesheet"> -->	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
<link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .header{
        height:180vh;
    }
</style>

    <title>Profile Edit</title>
</head>

<body>

<section class="header">
        <nav>
            <div class="book_icon">
                <!-- <i class="fas fa-book-open"></i> -->
                <a style="text-decoration:none;margin-bottom: 50px;" href="dashboard.php"><h2 style="margin-bottom: 50px">Book Cafee</h2></a>
              </div>
          <div class="nav-links" id="navlinks">
            <i class="fa fa-times" onclick="hidemenu()"></i>
            <ul style="margin-top: -100px" >
          
              <li><a href="#footer">ABOUT</a></li>
              <li><a href="https://goo.gl/maps/YmhKTKTKD1kPx4DP6">CONTACT</a></li>
             
              <li><a href="profile.php">PROFILE</a></li>
              <li><a href="logout.php">LOG OUT</a></li>
            
               <li><a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style ="background-color:rgba(0,0,0,0.01);border: 0px">CATEGORIES
  </a>

  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item"  href="dashboard2.php?item=Bangla Literature">Bangla Literature</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Nobels">Nobels</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Poems">Poems</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Story">Story</a></li>
    <li><a class="dropdown-item"  href="dashboard2.php?item=Fantasy">Fantasy</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Horror">Horror</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Advanture">Advanture</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Comics">Comics</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Cookings">Cookings</a></li>
    <li><a class="dropdown-item" href="dashboard2.php?item=Journals">Journals</a></li>
  
  
  
  </ul></li>
      
    </li><li> 
  
  
  <!-- if condition to check user type--> 
 
    <?php if($user_data['user_type'] =="Admin"){ ?> 
     <a href="bookupload.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true" style="witdh:50px"><i class="mdi mdi-cloud-upload" aria-hidden="true"style ="color:rgb(6, 209, 245);font-size:30px"></i></a></li>
     <li ><a href="orders.php"><i class="fas fa-dolly" style="font-size: 30px; color:rgb(6, 209, 245)"></i></a></li>	

     <?php} ?>
    <?php }else{
} ?>
<?php if($user_data['user_type'] =="User"){ ?> 
     <a href="cart.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true" style="witdh:50px"><i class="mdi mdi-cart" aria-hidden="true"style ="color:rgb(6, 209, 245);font-size:30px"></i></a></li>
    <?php} ?>
    <?php }else{
} ?>

  
            </ul> 
            
    </div>  
      <i class="fa fa-bars" onclick="showmenu()"></i>
    </nav>
    
<center >
<p1 style="font-size:40px;color:white;"> Hello </p1> <br />
           <p style="font-size:40px;color:aqua;margin-bottom:-50px;"> 

            <?php echo $user_data['user_name']; ?>
          </p>
        <div class="card" style="background-color:rgba(255,255,255,0.5);width:500px;margin-bottom:-10px;">
            <form method="post">
                <h1><b>Update Your Profile</b></h3>

                    <!-- NAME -->
                    <div class="name">
                        <div class="form-elements">
                            <label for="name" style="margin-left:70px"></label>
                            Name
                        </div>
                    </div>
                    <div class="fields">
                        <input type="text" id="text" name ="user_name" value="<?php echo $user_data['user_name'];
                        
                        
                        ?>" style="width: 200px; height: 20px;" />
                    </div>

                    <!-- EMAIL-->
                    <div class="email">
                        <div class="form-elements">
                            <label for="email"style="margin-left:70px"></label>
                            Email
                        </div>
                    </div>
                    <div class="fields">
                        <input type="email" id="text" name ="email"value="<?php echo $user_data['email'];
                        
                        
                        ?>" style="width: 200px; height: 20px;" />
                    </div> 

                    <!-- PASSWORD -->
                    <div class="password">
                        <div class="form-elements">
                            <label for="password"style="margin-left:50px"></label>
                            Password
                        </div>
                    </div>
                    <div class="fields">
                        <input type="text" id="text" name ="password"value="<?php echo $user_data['password'];
                        
                        
                        ?>" style="width: 200px; height: 20px;" />
                    </div>

                   
                    

                    <!-- contact -->
                    <div class="contact">
                        <div class="form-elements">
                            <label for="contact"style="margin-left:70px"></label>
                            Contact
                        </div>
                    </div>

                  
                     <div class="fields"> 
                        <input type="text" id="contact" name ="contact"value="<?php echo $user_data['contact'];
                        
                        
                        ?>" style="width: 200px; height: 20px;" />
                    </div> 
                      
                    <!-- address -->

                    <div class="address">
                        <div class="form-elements">
                            <label for="address"style="margin-left:140px">
                                Address
                            </label>
                        </div>
                    </div>
                    <div class="fields"> 
                        <input type="text" id="address" name ="address"value="<?php echo $user_data['address'];
                        
                        
                        ?>" style="width: 200px; height: 20px;" />
                    </div> 
                    <!-- SUBMIT -->
                    <div class="labels">
                        
                            
                            <input id="button" href="profile.php" type="submit" value="Update"style="background-color: rgb(114, 12, 76);color:white; border-radius: 5px;" /><br><br>
                            

                    
                    </div>
                    
            </form>
        </div>
    </center>

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
