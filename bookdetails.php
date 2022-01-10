<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  $book_name=$_GET['item'];
  $localhost = "localhost"; #localho
  $dbusername = "root"; #username of phpmyadmin
  $dbpassword = "";  #password of phpmyadmin
  $dbname = "bookcafe1_db";  #database name
  
  #conection string
  $con = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
  $user_data = check_login($con); 
  if(isset($_POST["add_to_cart"]))
  { $t=0;    
    $un =$user_data['user_name'];
        $u =$user_data['user_id'];
      $t=(string)$_POST['book_name'];
      $p =$_POST['price'];
      $rq =$_POST['rquantity'];
      $q =$_POST['quantity'];
      $tp=($p*$rq);
      $uq=$q-$rq;
  
      if(!empty($rq)){
      $sql ="insert into orders (user_name,user_id,book_name,price,rquantity,total_price)  values ('$un','$u','$t','$p','$rq','$tp') ";
     $r1 = mysqli_query($con,$sql);
     $query = "UPDATE books SET quantity ='$uq'WHERE book_name='$t'; ";
    $result = mysqli_query($con, $query);
   
    
    
    if(($result&&$r1))
    {
      
      
        header("location:".$_SERVER['HTTP_REFERER']);
    }
  
  
     else if(($r1&&$result))
      {
        
        
          header("location:".$_SERVER['HTTP_REFERER']);
      }
      else{
          echo 'error';
          
      }
    } 
  }
  if(isset($_POST["comment"]))
  {   
    $un =$user_data['user_name'];
        $u =$user_data['user_id'];
        $cm=$_POST['cmt'];
        $book_name=$_POST['bkn'];
        $rating=$_POST['rating'];
        $tr=$_POST['tr'];
        $ro= mysqli_query($con,"SELECT SUM(rating) AS total FROM reviews where book_name='$book_name'");
        
      
      while ($row = mysqli_fetch_assoc($ro))
    { 
         $sum=$sum+ $row['total'];
    }

      
       
       $sum=$sum+$rating;
  $av_rating=$sum/($tr+1);
      if(!empty($cm)){
      $sql ="insert into reviews (user_name,user_id,book_name,comment,rating)  values ('$un','$u','$book_name','$cm','$rating') ";
     $r1 = mysqli_query($con,$sql);

     $query = "UPDATE reviews SET total_review =$tr+1   WHERE book_name='$book_name'; ";
  $result = mysqli_query($con, $query);

  
  $query1 = "UPDATE reviews SET total_rating = '$sum'   WHERE book_name='$book_name'; ";
  $result1 = mysqli_query($con, $query1);
  $query2 = "UPDATE reviews SET average_rating = '$av_rating'   WHERE book_name='$book_name'; ";
  $result2 = mysqli_query($con, $query2);
  $query3 = "UPDATE books SET   rating = '$av_rating'   WHERE book_name='$book_name'; ";
  $result3 = mysqli_query($con, $query3);
  

  
    if(($r1&&$result))
    {
      
      
        header("location:".$_SERVER['HTTP_REFERER']);
    }
   
  
    }
    
    
    
  }
  if(isset($_POST["delete"]))
{
  $un =$_GET['id'];
  $cmn=$_POST['cmnt'];
  $book_name=$_POST['bkn'];
  $rating=$_POST['rtg'];
  $tr=$_POST['tr'];

  $sql = "DELETE FROM reviews WHERE id = $un ";
  
    $result=mysqli_query($con,$sql);
  //   $query = "UPDATE reviews SET total_rating = total_rating - '$rating' WHERE book_name='$book_name'; ";
  //   $result1 = mysqli_query($con, $query);
  //   $query2 = "UPDATE reviews SET average_rating = (total_rating/('$tr'-1))   WHERE book_name='$book_name'; ";
  // $result2 = mysqli_query($con, $query2);
  
  $ro= mysqli_query($con,"SELECT SUM(rating) AS total FROM reviews where book_name='$book_name'");
        
      
  while ($row = mysqli_fetch_assoc($ro))
{ 
     $sum=$sum+ $row['total'];
}

  
   
  //  $sum=$sum-$rating;
$av_rating=$sum/($tr-1);
 

 $query = "UPDATE reviews SET total_review =$tr-1   WHERE book_name='$book_name'; ";
$result = mysqli_query($con, $query);


$query1 = "UPDATE reviews SET total_rating = '$sum'   WHERE book_name='$book_name'; ";
$result1 = mysqli_query($con, $query1);
$query2 = "UPDATE reviews SET average_rating = '$av_rating'   WHERE book_name='$book_name'; ";
$result2 = mysqli_query($con, $query2);
$query3 = "UPDATE books SET   rating = '$av_rating'   WHERE book_name='$book_name'; ";
$result3 = mysqli_query($con, $query3);





        if($result&&$result1&&$result2){
   
       
           
        header("location:".$_SERVER['HTTP_REFERER']);
       
    }





}
    
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" type="image/png"  href="img/logo4.png" sizes="16x4">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Book Details</title>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->	
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">	
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-9/css/all.min.css" rel="stylesheet"> -->	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link rel="stylesheet" href="style1.css" />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"> -->

        <!-- <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
        <!-- CSS only -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />  <link
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

        <!-- JavaScript Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<style>
  ::placeholder{
    color: black;
   
  }
  .container{
    background-color:rgba(255,255,255,0.6);
  }
  .col-4{
 margin-top:5px;
 margin-bottom:5px;
  }
  .col-8{
 margin-top:40px;
 margin-bottom:20px;
 font-size:25px;
  }
  .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 6vw;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: left;
}
.addtxt {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    font-size: 13px;
    width: 350px;
    background-color: #e5e8ed;
    font-weight: 500
}

.form-control: focus {
    color: #000
}

.second {
    width: 100%;
    background-color: #68b7f0ba;
    border-radius: 4px;
    box-shadow: 10px 10px 5px #aaaaaa;
}

.text1 {
    font-size: 30px;
    font-weight: 500;
    color: rgb(171, 1, 1);
}

.text2 {
    font-size: 25px;
    font-weight: 500;
    /* margin-left: 6px; */
    color: #012ac8de;
    /* padding-left:10px;
    align:justify; */
}

.text3 {
    font-size: 20px;
    font-weight: 500;
    margin-right: 4px;
    color: rgb(171, 1, 1);
}

.text3o {
    color: blue;
}

.text4 {
    font-size: 20px;
    font-weight: 500;
    color: rgb(171, 1, 1);
}

.text4i {
    color: #00a5f4
}

.text4o {
    color: white
}

.thumbup {
    font-size: 13px;
    font-weight: 500;
    margin-right: 5px
}

.thumbupo {
    color: #17a2b8
}
</style> 


    </head>
    <body>
    <section class="header"style=" background-attachment: fixed">  
     <nav>
   <div class="book_icon">
                <!-- <i class="fas fa-book-open"></i> -->
                <!-- <h2 style="margin-bottom: 50px">Book Cafee</h2> -->
                <a style="text-decoration:none;margin-bottom: 50px;" href="dashboard.php"><h2 style="margin-bottom: 50px">Book Cafee</h2></a>

              </div>
          <div class="nav-links" id="navlinks">
            <i class="fa fa-times" onclick="hidemenu()"></i>
            <ul style="margin-top: -100px" >
            <li><form action="searchengine.php" method="GET">
<input style="border-radius:10px;
     background-color: rgb(60,170,144,0.5); border: none; padding:3px;	"type="text" name="query" placeholder="search here"/>
<!-- <input type="submit" value="Search" /> -->
<i style=" color:rgb(6, 209, 245); font-size: 20px; margin-top: -50px" class="fas fa-search"></i>
</form></li>
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
    <li> 
  
  
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


<!-- test -->

<div class="container mb-10">
<?php
$res=mysqli_query($con,"SELECT * FROM `books` where book_name='$book_name'");
if(mysqli_num_rows($res)>0)
{
 while($row= mysqli_fetch_array($res))
 
      {    
          ?>
     <form method="post" action="bookdetails.php?action=add&id=<?php echo $row["id"]; ?>" ecntype="multipart/form-data">
     <div class="row"> 
     <div class="col-4">  
      <?php  echo '<a href="temp.php?item='.$row['book_name'].' " ><img src="data:image;base64,'.base64_encode($row['image']).' " "width="350" height="500"></a>';?>
      
    </div>
      <div class="col-8 " >
        
        <input type="text" id="country" name="book_name" style="border-style: none;background:none;font-size:40px;" value="<?php echo ($row['book_name']);?>" readonly>   
        
        <p>Rating : <?php echo number_format((float) $row['rating'],2,'.', '');?> / 5</p>
        <p>Author  Name  :   <?php echo $row['author_name'];?></p>
         
         
   <p>Category : <?php echo $row['categories'];?></p>    
  
  <p>Price (৳) : <input type="text" id="country" name="price" style="border-style: none;background:none;" value=<?php echo $row['price'];?> readonly></p>
   <p>Description : <?php echo $row['description'];?></p>   
  
  <?php if($row['quantity']>0&&$user_data['user_type'] =="User"){ ?> 
     <p>Available Quantity : <input type="text" id="country" name="quantity" style="border-style: none;background:none;" value=<?php echo $row['quantity'];?> readonly></p>
     <p>Required Quantity : <?php echo '<input  type="number" name="rquantity"max="'.$row['quantity'].'"min="1" style="width: 70px; height: 20px;background:none;">';?></p> 
      <?php echo'<input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-success">';?>
      <?php} ?>
<?php }else{
} ?>

  <?php if($row['quantity']<=0&&$user_data['user_type'] =="User"){ ?> 
        <p style="color:red;font-weight:bold; font-size:20px;" ; >Available Quantity :  <?php echo 'Out of Stock';?></p> 
        <p>Required Quantity : <?php echo '<input type="number" name="rquantity" style="width: 70px; height: 20px;background:none;" disabled>';?></p> 
      <?php echo'<input type="submit" name="add_to_cart" value="Unavailable " class="btn btn-danger" disabled>';?>  
<?php} ?>
<?php }else{
} ?>
</form>
<?php if($row['quantity']>0&&$user_data['user_type'] =="Admin"){ ?> 
  <p>Available Quantity : <input type="text" id="country" name="quantity" style="border-style: none;background:none;" value=<?php echo $row['quantity'];?> readonly></p>

      <?php} ?>
<?php }else{
} ?>

  <?php if($row['quantity']<=0&&$user_data['user_type'] =="Admin"){ ?> 
    <form method="POST" action="bookupload.php">

        <p style="color:red;font-weight:bold; font-size:20px;" >Available Quantity :  <?php echo 'Out of Stock<br><input type="submit" ahref="bookupload.php" value="Like to Upload " class="btn btn-info">';?></p > 
        
</form>

<?php} ?>
<?php }else{
} ?>




</div>
</div>
<?php 
$res1=mysqli_query($con,"SELECT * FROM `reviews` where book_name='$book_name'");?>


 <?php if($user_data['user_type'] =="User"){?>
  <h2 style="margin-top: 50px;margin-bottom: 25px; font-size:30px">Drop Your Review <h2>
<form method="POST" action="bookdetails.php?action=add&id=<?php echo $row["id"]; ?>" ecntype="multipart/form-data">
<textarea class="form-control " style=" width: 50%;background-color:rgba(255,255,255,0.8);" id="js--review-writing" name="cmt" required rows="3" placeholder="Please write your honest opinion and give a rating"></textarea>


<!-- rating -->
<p style="margin-top: 50px;margin-bottom: 25px; font-size:30px">Rating </p>
<!-- <div style="text-align: left; font-size:15px"> -->

<div class="rating"  > 
  <input type="radio" name="rating" value="5" id="5">
  <label for="5"style="color: #dd4b39; font-size:60px; text-align: left">☆</label>
   <input type="radio" name="rating" value="4" id="4">
   <label for="4" style="color: #dd4b39;font-size:60px">☆</label> 
   <input type="radio" name="rating" value="3" id="3">
   <label for="3" style="color: #dd4b39;font-size:60px">☆</label>
    <input type="radio" name="rating" value="2" id="2">
    <label for="2" style="color: #dd4b39;font-size:60px">☆</label>
     <input type="radio" name="rating" value="1" id="1">
     <label for="1" style="color: #dd4b39; font-size:60px">☆</label>
</div>

<!-- </div> -->
<input type="hidden" id="custId" name="tr" value="<?php echo mysqli_num_rows($res1);?>">

<input style="text-align: left;" type="submit" name="comment" value="Submit " class="btn btn-success btn-lg mb-5"style="position:absolute;left:1410px; top:960px;" ><br>
<input type="hidden" id="custId" name="bkn" value="<?php echo ($row['book_name']);?>">


</form>
<?php} ?>
    <?php }else{
} ?>
<h2 style="margin-top: 50px;margin-bottom: 25px; font-size:30px">Reviews & Ratings of Others<h2>
<?php 
// $res1=mysqli_query($con,"SELECT * FROM `reviews` where book_name='$book_name'");
if(mysqli_num_rows($res1)>0)
{$tr=0;
 while($row= mysqli_fetch_array($res1))
      {    $tr++;
          ?>

<!-- <div class="container justify-content-center mt-5 border-left border-right"> -->
      <div class="d-flex justify-content-center py-2">
        <div class="second py-2 px-2"> <span class="text1"><?php  echo ($row['user_name']);?> </span>
            <div class="d-flex justify-content-between py-1 pt-2">
                <div><span class="text2"style="padding-left:10px;"><?php  echo ($row['comment']);?></span></div>
            </div>
            <div class="d-flex justify-content-between py-1 pt-2">
            <div><span class="text3">Rated : </span><span class="text4"><?php  echo  ($row['rating']); ?></span></div>            </div>
        
        <?php if($user_data['user_type'] =="Admin"){?>
          <form method="POST" action="bookdetails.php?action=add&id=<?php echo $row["id"]; ?>" ecntype="multipart/form-data">

        
        <input type="hidden" id="custId" name="bkn" value="<?php echo ($row['book_name']);?>">
        <input type="hidden" id="custId" name="cmnt" value="<?php echo ($row['comment']);?>">
        <input type="hidden" id="custId" name="rtg" value="<?php echo ($row['rating']);?>">
        <input type="hidden" id="custId" name="unm" value="<?php echo ($row['user_name']);?>">
        <input type="hidden" id="custId" name="tr" value="<?php echo mysqli_num_rows($res1);?>">

        <input style ="margin-left:93%;"type="submit" name="delete" value="Remove" class="btn btn-danger">



        </form>
<?php} ?>
    <?php }else{
} ?>

</div>
    </div>
     
     
     <?php
     } 
    
 }
?>

 <?php
     } 
  
 }
?>

</div>



             <!-- Footer -->
  
  <footer class="bg-dark text-center text-white"id="footer">
 
 <h4 style="padding:20px;font-size:30px;font-weight:bold;" >About Us</h4>
   <p>
   We are trying to give books from our book cafe very easily and at low cost.<br> Since people are
    not interested in reading books now, we have taken this initiative.<br> Hopefully we will be
                   able to deliver books to everyone's doorsteps
   </p>


 <!-- Grid container -->
 <div class="container p-4 pb-0 bg-dark">
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

     <!-- Javascript for toggole menu  -->
   <script>
       var navlinks = document.getElementById("navlinks");
       function showmenu() {
         navlinks.style.right = "0";
       }
       function hidemenu() {
         navlinks.style.right = "-200px";
       }
     </script>
</body>
</html>