<?php 
include('../config/constants.php');
//check is the id and image value is set or not
if(isset($_GET['id']) )
{
$id = $_GET['id'];



//delete from database
$sql = "DELETE FROM tbl_user WHERE id=$id";

$res = mysqli_query($conn,$sql);

// check if delete
if($res==true){
    $_SESSION['deleteu'] = "<div class='success'>user delete from database successfuly</div>";
    header('location:'.SITEURL.'admin/users.php');

}
else{

//message error
    $_SESSION['deleteu'] = "<div class='error'>user delete from database failed</div>";
    header('location:'.SITEURL.'admin/users.php');

}




}
else
{
//redirect to manage category page
header('location:'.SITEURL.'admin/manage-admin.php');

}


















?>
