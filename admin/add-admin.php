

<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="warpper">
        <h1>Add Admin</h1>
        <br> <br>
        <?php
            if(isset($_SESSION['add'])) { //check ssesion is set or not
                echo $_SESSION ['add'];  //display ssesion messager if set
                unset ($_SESSION ['add']); //remove ssesion message
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>
<?php
//process the value from form and save it in database
//check the submit button is clicked or not 
if(isset($_POST['submit'])){
//echo "button clicked";
$full_name=$_POST['full_name'];
$username=$_POST['username']; 
$password=md5($_POST['password']); //password encryption with md5
//sql query to insert data in database
$sql="INSERT INTO tbl_admin SET 
full_name ='$full_name',
username = '$username',
password = '$password'
";


//Excute query and save data in database
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));


//check data is inserted or not
if($res==TRUE){
//create a ssesion variable to display message
$_SESSION['add'] = "Admin Add Successfuly";
//redirect page 
header("location:".SITEURL.'admin/manage-admin.php');
}
else {
    $_SESSION['add'] = "Failed To Add Admin";
    //redirect page 
    header("location:".SITEURL.'admin/add-admin.php');
}
}
?>