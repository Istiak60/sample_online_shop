<?php
session_start();

include("functions.php");
$localhost = "localhost"; #localho
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "bookcafe1_db";  #database name


#conection string
$con = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
$user_data = check_login($con); 


if(isset($_POST["delete"]))
{
  $u =$_GET['id'];
  $t =$_POST['book_name'];
  $rq=$_POST['rquantity'];
      
    $sql = "DELETE FROM orders WHERE id = $u ";
    $result=mysqli_query($con,$sql);
    $query = "UPDATE books SET quantity = quantity+'$rq' WHERE book_name='$t'; ";
    $result1 = mysqli_query($con, $query);
        if($result&&$result1){
           
        header("location:".$_SERVER['HTTP_REFERER']);
       
    }
    else{
        echo "Error";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png"  href="img/logo4.png" sizes="16x4">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order list</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
<style>
/* .cart-items */
.small-container cart-page table{
    width:50%;
}
.cart-page {
    margin: 80px auto;
}
table {
    width: 80%;
    border-collapse: collapse;
   
    background-color:rgba(255,255,255,0.5);
}
.cart-info {
    display: flex;
    flex-wrap: wrap;
    
}
th {
    text-align: left;
    padding: 5px;
    color: #fff;
    background: #ff523b;
    font-weight: normal;
}
td {
    padding: 10px 5px;
}

td p {
    width: 100px;
    height: 30px;
    /* padding: 5px 0px 50px 50px; */
    
    
}
td a {
    color: #ff523b;
    font-size: 12px;
}
td img {
    width: 80px;
    height: 80px;
    margin-right: 10px;
}
.total-price table td {
    display: flex;
    justify-content: flex-end;
    margin-left:200px;
}
.total-price table {
    border-top: 3px solid #ff523b;
    width: 10%;
    max-width: 410px;
    
    
}

th:last-child {
    text-align:right;
}
h5{
    margin-left:100px;
    margin-top:8.5px;
    font-size:18px;
    color: rgb(255,0,0);
    text-align:right;

}
.footer{
    color:black;
}
.text-box1 {
    width: 90%;
    height:20%;
    color: #fff;
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    padding-bottom:100px;
}

.text-box1 h1 {
  font-size: 52px;
}

.text-box1 p {
  margin: 10px 0 40px;
  font-size: 14px;
  color: rgb(52, 248, 199);
  font-size: 40px;
}

.text-box1 p1 {
  margin: 10px 0 40px;
  font-size: 14px;
  color: #fff;
  font-size: 30px;
}

   
</style>



</style>

</head>
<body>
<section class="header"style=" background-attachment: fixed">  
   <nav>
   <div class="book_icon">
                <i class="fas fa-book-open"></i>
                <!-- <h2 style="margin-bottom: 50px">Book Cafee</h2> -->
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
    </li>
  <!-- if condition to check user type--> 
 
 



</ul> 
    </div>
      <i class="fa fa-bars" onclick="showmenu()"></i>
    </nav>
    <div class="text-box1">
          <h1>Book Cafee</h1>
          
           <p1>  Orders </p1> <br />
           <p> 

            <?php echo $user_data['user_name'] ; ?>
          </p><br><br>
          
         
        </div><br><br>
        <br><br>
        

    
        <!-- Cart items detailes -->
        <center>
        <div class="small-container cart-page"style="padding-bottom:40px;margin-bottom:-10px;">
            <table>
                <tr>
                <th >User ID</th>
                <th >User Name</th>
                    <th>Product</th>
                    <!-- <th >Cancle order</th> -->
                    <th>Quantity</th>
                    <th>Price</th>
                   
                    <th >Subtotal</th>
                    
                </tr>
               
                <?php
      
        $res=mysqli_query($con,"SELECT * FROM `orders` ;");
      

      

       
      if(mysqli_num_rows($res)>0)
      {$total = 0;
       while($row= mysqli_fetch_array($res))
            {    
                  
                ?>
                     <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>" ecntype="multipart/form-data">

           <tr>     
            
      
           <td><input type="text" id="country" name="book_name" style="border-style: none;background:none;" value="<?php echo ($row['user_id']);?>" readonly><br><br></td>  
           <td><input type="text" id="country" name="book_name" style="border-style: none;background:none;" value="<?php echo ($row['user_name']);?>" readonly><br><br></td>
           <td><input type="text" id="country" name="book_name" style="border-style: none;background:none;" value="<?php echo ($row['book_name']);?>" readonly><br><br></td>

       

      
        <td><input type="text" id="country" name="rquantity" style="border-style: none;background:none;padding-left:25px;" value=<?php echo $row['rquantity'];?> readonly><br><br></td>
 

        <td><p style="padding-left:5px;"><?php echo $row['price'];?> </p></td>

        
        

         <td align="right"><p><?php echo $row['total_price'];?> </p></td>
         <?php
           $total = $total +$row['total_price'];
          ?>
         
        
       </tr>
                </form>
       </div>
       <?php
          
        
            }?>
<div class="total-price">
    <table>
        <tr>
            <td align="right"><h5 >Subtotal</h5></td>
            <td align="right">৳ <?php echo  $total ?></td>
        </tr>
        <tr>
            <td align="right"><h5>Vat</h5></td>
            <td align="right">৳ <?php
            $vat=0;
            $vat=($total*0.10);
            echo $vat;
            ?>
            </td>
        </tr>
        <tr>
            <td align="right"><h5>Total</h5></td>
            <td align="right">৳ 
            <?php
            
            echo ($total+$vat);
            ?>

            </td>
        </tr>
 </table>
 </div>
 </table>
<?php


       }       
 ?>
 
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
 <!-- JS for toggle menu -->
 <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>


    </body>
</html>
