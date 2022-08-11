
<?php include('../config/constants.php'); ?>



<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">login</h1>
            <br><br>
            <?php 
            if(isset($_SESSION['login'])){

               echo  $_SESSION['login'];
               unset($_SESSION['login']);
            }
            if(isset($_SESSION['login_user'])){

                echo  $_SESSION['login_user'];
                unset($_SESSION['login_user']);
             }
            if(isset($_SESSION['no-login-message'])){
               echo $_SESSION['no-login-message'];
               unset($_SESSION['no-login-message']);
            }
            if(isset( $_SESSION['enter_data'] )){
                echo  $_SESSION['enter_data'] ;
                unset( $_SESSION['enter_data'] );
            }
            
            
            ?>
            <br><br>
            <form action="" method="POST" class="text-center">
                Username:<br>

                <input type="text" name="username" placeholder="enter username"><br><br>

                password:<br>

                <input type="password" name="password" placeholder="enter your password"><br><br>

                <input type="submit" name="submit" value="login" class="btn btn-primary"><br><br>
                <div class="text-center">
                    <h5>Already have account?<a href="register.php">sign in</a></h5>
                </div>
                <!-- <button name="submit" class="btn btn-primary" >login</button> -->











            </form>
        </div>
    </body>
</html>



<?php

if(isset($_POST['submit'])){



   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $sql = "SELECT * FROM tbl_admin  WHERE username='$username' AND password='$password'";
   $res= mysqli_query($conn,$sql);
   $count = mysqli_num_rows($res);

if($count==true){

$_SESSION['login'] = "<div class='success text-center'>login successful $username</div>";
$_SESSION['user'] = $username; //check user logged in or not and logout unset it
header('location:'.SITEURL.'admin/');
}
elseif ($count==false) {
    // echo"mmmmmmmmmmmmmmmmmmmmmmm";
    $username2 = $_POST['username'];
    $password2 = md5($_POST['password']);
    $username2;
    $sql2 = "SELECT * FROM tbl_user WHERE username='$username2' AND password='$password2'";
    $res2= mysqli_query($conn,$sql2);
    $count=mysqli_num_rows($res2);
    $_SESSION['user2'] = $username2; 
 if($count==1){
    // echo"hellohhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh";

 
//  $_SESSION['login_user'] = "<div class='success text-center'>login successful </div>";
//   $_SESSION['users'] = $username2;//check user logged in or not and logout unset it
 header('location:http://localhost/index.php');
}
//  else{
//     echo"hhhhhhhhhhhhh";
//      $_SESSION['login_user'] = "<div class='error text-center'> username and password not match </div>";
//      header('location:'.SITEURL.'admin/login.php');
//  }
    
}
else{
            $_SESSION['login_user'] = "<div class='error text-center'> username and password not match </div>";

    $_SESSION['login'] = "<div class='error text-center'> username and password not match </div>";
     header('location:'.SITEURL.'admin/login.php');
}
  
}
else{

    $_SESSION['enter_data'] = "<div class='error text-center'> enter your name and password </div>";

}






?>