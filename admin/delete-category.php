<?php 
include('../config/constants.php');
//check is the id and image value is set or not
if(isset($_GET['id']) or isset($_GET['image_name']))
{
$id = $_GET['id'];
$image_name = $_GET['image_name'];

if($image_name !="")
{
    $path = "../images/category/".$image_name;
    //remove image
    $remove = unlink($path);
    //if failed to remove image show message error
    if($remove==false){
        $_SESSION['remove'] = "<dive class'error'>failed to remove category image</dive>";
        //redirect
        header('location:'.SITEURL.'admin/manage-category.php');
        die();

    }
}
//delete from database
$sql = "DELETE FROM tbl_category WHERE id=$id";

$res = mysqli_query($conn,$sql);

// check if delete
if($res==true){
    $_SESSION['delete'] = "<div class='success'>ccategory delete from database successfuly</div>";
    header('location:'.SITEURL.'admin/manage-category.php');

}else{

//message error
    $_SESSION['delete'] = "<div class='error'>ccategory delete from database failed</div>";
    header('location:'.SITEURL.'admin/manage-category.php');

}




}
else
{
//redirect to manage category page
header('location:'.SITEURL.'admin/manage-category.php');

}


















?>
