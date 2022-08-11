<?php
include("../config/constants.php");

//get id from admin to delete
$id = $_GET['id'];

//create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res =mysqli_query($conn ,$sql);

if($res==TRUE){
    $_SESSION['delete'] = "<div class='success'>Admin Deleted successfuly</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    $_SESSION['delete'] = "<div class='error'>Failed To Delete Admin. Try Again Later</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

?>