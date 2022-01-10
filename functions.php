<?php

function check_login($con)
{
    if(isset($_SESSION['id']))
    {
      
        $id=$_SESSION['id'];
        $email=$_SESSION['email'];
        $query = "select * from users where id = '$id' limit 1";
        $stmt = $con->prepare($query);
        $result = $stmt->execute();
       

        
        
          

            
            //return $id;
          
    }
    //redirect to login
   // header("Location: login.php");
    //die;



}

function random_num($length)
{
  $text = "";
  if($length<5)
  {
      $length = 5;
  }
  $len = rand(4,$lenght);
   for($i = 0; $i < $len; $i++)
   {
     
    $text .=rand(0,9);

   }
return $text;
}
function function_alert($message) {
      
  // Display the alert box 
  echo "<script>alert('$message');</script>";
}

    