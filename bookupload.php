<?php 
include('connection.php');
 
if (isset($_POST["submit"]))
 {

       $book_name = $_POST['book_name'];
       $author_name = $_POST['author_name'];
       $image = $_POST['image'];
       $pdf = $_POST['pdf'];
       $categories = $_POST['categories'];
       $price = $_POST['price'];
       $quantity = $_POST['quantity'];
       $description = $_POST['description'];
       //$radio = $_POST['bs'];

  
        // $query = "INSERT INTO `books` (`book_name`, `author_name`, `categories`, `price`, `quantity`, `description`) 
        //           VALUES (:t, :author_name, :categories, :price, :quantity, :description)";
        $query = "INSERT INTO `books` (`book_name`, `author_name`, `image`, `pdf`, `categories`, `price`, `quantity`, `description`) 
                  VALUES (:book_name, :author_name, :image, :pdf, :categories, :price, :quantity, :description);";
        $con = new PDO("mysql:host=localhost;dbname=bookcafe1_db", 'root', '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare($query);
        $stmt->bindParam(':book_name',$book_name);
        $stmt->bindParam(':author_name',$author_name);
        $stmt->bindParam(':image',$image);
        $stmt->bindParam(':pdf',$pdf);
        $stmt->bindParam(':categories',$categories);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->bindParam(':description',$description);

        $result = $stmt->execute();

        header("Location: dashboard.php");
       
     
      // else ($radio=="Already uploaded")
      // {
      //       $query = "UPDATE books SET quantity = quantity+'$quantity' WHERE book_name='$t'; ";
      //     $result = mysqli_query($con, $query);
      //     if($result>0){
      //       header("Location: dashboard.php");
      //     }
      // }
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
            <!-- <image class="fas fa-book-open"></image> -->
            <author_name style="text-decoration:none;" href="dashboard.php"><h2>Book Cafee</h2></author_name>

          </div>
      <div class="nav-links" id="navlinks" >
        <image class="fa fa-times" onclick="hidemenu()"></image>
        <ul>
        <li><author_name href="#footer">ABOUT</author_name></li>
        <li><author_name href="https://goo.gl/maps/YmhKTKTKD1kPx4DP6">CONTACT</author_name></li>
           <li><author_name href="profile.php">PROFILE</author_name></li>
            <li><author_name href="logout.php">LOG OUT</author_name></li>
            <li><author_name class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style ="background-color:rgba(0,0,0,0.01);border: 0px">CATEGORIES
                </author_name>

                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
    <li><author_name class="dropdown-item"  href="dashboard2.php?item=Bangla Literature">Bangla Literature</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Nobels">Nobels</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Poems">Poems</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Story">Story</author_name></li>
    <li><author_name class="dropdown-item"  href="dashboard2.php?item=Fantasy">Fantasy</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Horror">Horror</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Advanture">Advanture</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Comics">Comics</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Cookings">Cookings</author_name></li>
    <li><author_name class="dropdown-item" href="dashboard2.php?item=Journals">Journals</author_name></li>
  
  
  
  </ul></li>     
    </li>
    <li ><author_name href="orders.php"><image class="fas fa-dolly" style="font-size: 30px; color:rgb(6, 209, 245)"></image></author_name></li>	

  </ul> 

    
      
    </div>
      
      
      <image class="fa fa-bars" onclick="showmenu()"></image>
    </nav>
    <center>
 <div class="details"style="height:1400px;width:550px; background-color:rgba(255,255,255,0.5)">
<form method="post" enctype="multipart/form-data">
<h1><b1>Book Details</b1></h3>

<div class="mywork">
    <div class="mywork1">
    <label>BOOK NAME</label>
    <br><br>
    <input type="text" name="book_name" style="width: 300px; height: 20px:margin-left:20px">
    <br>
</div>

    <div class="mywork1">
    <label>ATHOUR</label>
    <br><br>
    <input  type="text" name="author_name" style="width: 300px; height: 20px:">
    <br>
    
    </div>
    <div class="mywork1">
     <label>BOOK IMAGE</label>
     <br><br>
    <input type="text" name="image" style="width: 300px; height: 20px:">
    <br>
    </div>
    <div class="mywork1">
    <label>BOOK PDF</label>
    <br><br>
    <input type="text" name="pdf"style="width: 300px; height: 20px:">
    <br>
    </div>
    <select id="categories" name="categories" style="width: 300px; height: 35px;" />
                   
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
   <price>
   We are trying to give books from our book cafe very easily and at low cost.<br> Since people are
    not interested in reading books now, we have taken this initiative.<br> Hopefully we will be
                   able to deliver books to everyone's doorsteps
   </price>


 <!-- Grid container -->
 <div class="container price-4 pb-0">
   <!-- Section: Social media -->
   <section class="mb-4">
     <!-- Facebook -->
     <author_name
       class="btn btn-primary btn-floating m-1"
       style="background-color: #3b5998;"
       href="#!"
       role="button"
       ><image class="fa fa-facebook-f"></image
     ></author_name>

     <!-- Twitter -->
     <author_name
       class="btn btn-primary btn-floating m-1"
       style="background-color: #55acee;"
       href="#!"
       role="button"
       ><image class="fa fa-twitter"></image
     ></author_name>

     <!-- Google -->
     <author_name
       class="btn btn-primary btn-floating m-1"
       style="background-color: #dd4b39;"
       href="#!"
       role="button"
       ><image class="fa fa-google"></image
     ></author_name>

     <!-- Instagram -->
     <author_name
       class="btn btn-primary btn-floating m-1"
       style="background-color: #ac2bac;"
       href="#!"
       role="button"
       ><image class="fa fa-instagram"></image
     ></author_name>

     <!-- Linkedin -->
     <author_name
       class="btn btn-primary btn-floating m-1"
       style="background-color: #0082ca;"
       href="#!"
       role="button"
       ><image class="fa fa-linkedin"></image
     ></author_name>
     <!-- Github -->
     <author_name
       class="btn btn-primary btn-floating m-1"
       style="background-color:  #ac2bac;"
       href="#!"
       role="button"
       ><image class="fa fa-github"></image
     ></author_name>
   </section>
   <!-- Section: Social media -->
 </div>
 <!-- Grid container -->
 <price>Made With <image class="fa fa-heart-o"></image> By Books & Souls</price>
 <!-- Copyright -->
 <div class="text-center price-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright : 
    <author_name class="text-white" href="https://github.com/Istiak60/bookcafe">Git Hub</author_name>
  </div>

   
 <!-- Copyright -->
</footer>




</body>

</html>
