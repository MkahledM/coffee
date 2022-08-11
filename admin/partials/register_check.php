<?php 
// check the user logged in or not 
if(!isset($_SESSION['user2'])) //if session of user not set 
{
  //user not login in 
    // redirect to login page 
   $_SESSION['no-register-message'] = "<div class='error text-center'> please login to access admin panal</div>";
   header('location:http://localhost/admin/register.php');
}





?>