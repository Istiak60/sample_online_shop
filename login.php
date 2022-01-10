<?php
session_start();
include("connection.php");
include("functions.php");

if(isset($_POST['btnSignIn']))  {
  echo $_POST['email'].'<br>';
  echo $_POST['password'].'<br>';
  


// // var_dump($_SERVER['REQUEST_METHOD']);
// if(isset($_POST['btnSignIn']))echo "btn clicked<br>";

// if($_SERVER['REQUEST_METHOD']== "POST")
// 
 var_dump($_GET);
  //somthing was posted
  $email = $_POST['email'];
  $password = $_POST['password'];
    if(!empty($email)&&!empty($password)  )
    {
        
       
        $query="select * from users where email = '$email' limit 1";
        // $query = "SELECT * FROM `users` WHERE email LIKE :email AND password LIKE :password;";

     $stmt = $con->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
    $result = $stmt->execute();
		$totalfound = $stmt->fetch();

    var_dump($totalfound);
    if($result)
    {
      $user_data = $totalfound;
      if($result && count($user_data) > 0){
      
        
            $_SESSION['id']=$user_data['id'];
            $_SESSION['email']=$user_data['email'];
            $_SESSION['user_name']=$user_data['user_name'];
          header("Location: dashboard.php");
      

        
      
    }
  }
}
}
// 		// if(count($totalfound) > 0){
// 		// 	$_SESSION['is_authenticated']=true;
// 		// 	$_SESSION['user_id']=$totalfound['id'];

			
// 		// 	header("Location: http://localhost/CRUD/front/public/dashboard.php");
			
			
// 		// }else{
// 		// 	$_SESSION['is_authenticated']=false;
// 		// 	header("location:http://localhost/CRUD/404.php");
// 		// }

        
       
            
          
//     //         {
  
//     //           $user_data =  mysqli_fetch_assoc($result);
             
//     //         } 

//     //     }

//     //    function_alert("wrong password or email");
       
//     // }
//     // else{

//     //     function_alert("wrong password or email");
//     // }

//     // //
//     // $query = "SELECT * FROM `users` WHERE email LIKE :email AND password LIKE :password;";

		
		


// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="img/logo4.png" sizes="16x4">

    <link rel="stylesheet" href="signin.css">
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

    <title>Sign in</title>
</head>

<body>
<section class="header" style="padding-bottom:30px;"> 
    <nav>
        <div class="book_icon">
            <i class="fas fa-book-open"></i>
            <h2>Book Cafee</h2>
          </div>
      <div class="nav-links" id="navlinks">
        <i class="fa fa-times" onclick="hidemenu()"></i>
        <ul>
        <li><a href="#footer">ABOUT</a></li>
           <li><a href="#footer">CONTACT</a></li>
          <li><a href="signup.php">SIGN UP</a></li>
         
        </li></ul> 
       

      </div>
      
      
      <i class="fa fa-bars" onclick="showmenu()"></i>
    </nav>
    <center>

<div class="container" style="background-color:rgb(0,0,0,0.5);width:500px;margin-bottom:30px;" >
    <form method="post">

        <h1>Sign In </h1>
        <label for="Email" style="color: white;"><b>Email</b></label>
        <br>
        <input type="text" placeholder="Enter email" name="email"required style="padding:20px"><br><br>

        <label for="password" style="color: white;"><b>Password</b></label>
        <!-- <input type="password" placeholder="Enter password" name="password"  required><br><br> -->
        <input id="text" placeholder="Enter password" type="password" name="password"required style="padding:20px"><br><br>
        <br>
        <input type="submit" value="Sign In" name="btnSignIn" id="btnSignIn"
            style="background-color: rgb(233, 38, 80);color:rgb(243, 236, 236);border-radius: 5px;margin-top:10px; font-size: 25px;margin-top: 15px;" />

    </form>
</div>

</center>



   
  </section>
 
 <!-- Footer -->
  
 <footer class="bg-dark text-center text-white" id="footer" style="padding-top:10px;">
 
 <h4 style="padding:20px;font-size:30px;font-weight:bold;" >About Us</h4>
   <p style="margin-bottom:-100px;">
   We are trying to give books from our book cafe very easily and at low cost.<br> Since people are
    not interested in reading books now, we have taken this initiative.<br> Hopefully we will be
                   able to deliver books to everyone's doorsteps
   </p>


 <!-- Grid container -->
 <div class="container p-4 pb-0"style="background-color:#212529;box-shadow:none;padding-top:1000px;">
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
 <div class="text-center p-3" style="background-color: rgba(128, 128, 128, 0.2);">

   
 <!-- Copyright -->
</footer>

</body>

</html>