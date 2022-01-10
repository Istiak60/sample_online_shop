<?php 
$localhost = "localhost"; #localho
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "bookcafe1_db";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {

 $t=$_POST['title'];
 $a=$_POST['author'];
 $c =$_POST['Categories'];
 $p =$_POST['price'];
 $q =$_POST['quantity'];
 $d =$_POST['description'];
 $radio = $_POST["bs"];
//$fn=$_FILES['image']['name'];
$fn=addslashes(file_get_contents($_FILES["image"]['tmp_name']));
//$tm=$_FILES['image']['tmp_name']; 
$fn1=$_FILES['pdf']['name'];
//$fn1=addslashes(file_get_contents($_FILES["pdf"]['tmp_name1']));
$tm1=$_FILES['pdf']['tmp_name1']; 
move_uploaded_file($tm,"bookimg/".$fn);
move_uploaded_file($tm1,"bookimg/".$fn1);

if($radio=="New")
{
  $sql ="insert into books (book_name,author_name,image,pdf,Categories,price,quantity,description)  values ('$t','$a','$fn','$fn1','$c','$p','$q','$d') ";


  if(mysqli_query($conn,$sql)){

      header("Location: dashboard.php");
  }
  else{
      echo "Error";
  }
}
else if($radio=="Already uploaded")
{
  $query = "UPDATE books SET quantity = quantity+'$q' WHERE book_name='$t'; ";
$result = mysqli_query($conn, $query);
if($result>0){
  header("Location: dashboard.php");
}
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

    <title>Book Uploads</title>
  
</head>

<body>

<section class="header"style="height:250vh">
   <nav>
        <div class="book_icon">
            <!-- <i class="fas fa-book-open"></i> -->
            <a style="text-decoration:none;" href="dashboard.php"><h2>Book Cafee</h2></a>

          </div>
      <div class="nav-links" id="navlinks" >
        <i class="fa fa-times" onclick="hidemenu()"></i>
        <ul>
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
    </li>
    <li ><a href="orders.php"><i class="fas fa-dolly" style="font-size: 30px; color:rgb(6, 209, 245)"></i></a></li>	

  </ul> 

    
      
    </div>
      
      
      <i class="fa fa-bars" onclick="showmenu()"></i>
    </nav>
    <center>
 <div class="details"style="height:1400px;width:550px; background-color:rgba(255,255,255,0.5)">
<form method="post" enctype="multipart/form-data">
<h1><b1>Book Details</b1></h3>

<div class="mywork">
    <div class="mywork1">
    <label>BOOK NAME</label>
    <br><br>
    <input type="text" name="title" style="width: 300px; height: 20px:margin-left:20px">
    <br>
</div>

    <div class="mywork1">
    <label>ATHOUR</label>
    <br><br>
    <input  type="text" name="author" style="width: 300px; height: 20px:">
    <br>
    
    </div>
    <div class="mywork1">
     <label>BOOK IMAGE</label>
     <br><br>
    <input type="File" name="image" style="width: 300px; height: 20px:">
    <br>
    </div>
    <div class="mywork1">
    <label>BOOK PDF</label>
    <br><br>
    <input type="File" name="pdf"style="width: 300px; height: 20px:">
    <br>
    </div>
    <select id="Categories" name="Categories" style="width: 300px; height: 35px;" />
                   
                    <option name="Bangla Literature">Bangla Literature</option>
                    <option name="Nobels">Nobels</option>
                    <option name="Poems">Poems</option> 
                    <option name="Fantasy">Fantasy</option>
                    <option name="Horror">Horror</option>
                    <option name="Advanture">Advanture</option>
                    <option name="Comics">Comics</option>
                    <option name="Cookings">Cookings</option>
                    <option name="Journals">Journals</option>
                    <option name="Story" >Story</option>
                    <option name="CATEGORIES" selected>CATEGORIES</option>
                    </select>
               <br><br>
    <div class="mywork1">
    <label>PRICE</label>
    <br><br>
    <input  type="text" name="price" style="width: 300px; height: 20px:">
    <br>
    
    </div>
    <div class="mywork1">
    <label>QUANTITY</label>
    <br><br>
    <input  type="number" name="quantity" style="width: 300px; height: 20px:">
    <br>
    </div>
    
    <div class="mywork1">
    <label>BOOK STATUS</label>
    <br><br>
    <input style="margin-left: -120px" type="radio" name="bs" value="New" checked>New<br> 
    <input style="margin-left: 6px" type="radio" name="bs" value="Already uploaded">Already uploaded
    <!-- <input  type="number" name="quantity" style="width: 300px; height: 20px:"> -->
    <br>
    </div>

    <div class="mywork1">
    <label>DESCRIPTION</label>
    <br><br>
   
    <input type="text" name="description"style="width: 300px; height: 20px:">
    
    </div>
    <br>              
   


    <input type="submit" name="submit" value="upload" style="background-color: rgb(114, 12, 76);color:white; border-radius: 5px;">
   

    </div>
    </div> 
</form>
</div>
</center>
  



  
  </section>

 <!-- Footer -->
  
 <footer class="bg-dark text-center text-white" id="footer">
 
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
