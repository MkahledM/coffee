<?php include('../config/constants.php'); ?>



<html>
    <head>
        <title>register</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body   >
        <div class="register ">
            <h1 class="text-center">register</h1>
            <br><br>
            <?php
          if(isset($_SESSION['false'])){
            echo $_SESSION['false'];
            unset($_SESSION['false']);
          }

            if(isset($_SESSION['add_user'])){

                  echo  $_SESSION['add_user'];
                  unset($_SESSION['add_user']);}
            //       if(isset($_SESSION['no-register-message'])){
            //         echo $_SESSION['no-register-message'];
            //         unset($_SESSION['no-register-message']);
            //      }
            //  ?>
            <br><br>
            <form action="" method="POST" class="text-center">
            Full Name:<br>
                    <input type="text" name="full_name" placeholder="Enter Your Name" require><br><br>
                
                Username:<br>

                <input type="text" name="username" placeholder="enter username" require><br><br>

                password:<br>

                <input type="password" name="password" placeholder="enter your password" require><br><br>

                Confirm password:<br>

                <input type="password" name="confirm_password" placeholder="enter your password" require><br><br>

                <input type="submit" name="submit" value="register" class="btn btn-primary"><br><br>
                <div class="text-center">
                    <h5>Already have account?<a href="login.php">sign in</a></h5>
                </div>
            

                <!-- <button name="submit" class="btn btn-primary" >login</button> -->











            </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit'])){

    // echo "button clicked";
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password= md5($_POST['password']); 
    $confirm_password=md5($_POST['confirm_password']); //password encryption with md5
    $_SESSION['users'] = $username;
    if($confirm_password!=$password){
    //   echo "mmmmmmmmm";
               $_SESSION['false'] = "<div class='error'> false password</div>";
               header("location:".SITEURL.'admin/register.php');
    }
    else{
        // echo"hi";

        $sql="INSERT INTO tbl_user SET 
        full_name ='$full_name',
        username = '$username',
        password = '$password'
        ";
        $res = mysqli_query($conn, $sql) ;
        if($res==true){
            //create a ssesion variable to display message
            $_SESSION['add_user'] = " <div class'success'>user Add Successfuly</div>";
           

            //redirect page 
            header("location:".SITEURL.'admin/login.php');
            }
            else {
                $_SESSION['add_user'] =  "<div class'error'>user Add Successfuly</div>";
                //redirect page 
                header("location:".SITEURL.'admin/register.php');
            }
           
        }
//             //sql query to insert data in database
   }
    ?>