


<?php include("partials/menu.php"); ?>
<div class="main-content">
    <div class="warpper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        $id = $_GET['id'];
        $sql = " SELECT * FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($conn , $sql);
        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            }
            else
            {
                header('location:'.SITEURL."admin/manage-admin.php");
            }
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FULL NAME: </td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="full_name" value="<?php echo $full_name ;?>">
                    </td>
                </tr>
                <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" value="<?php echo $username ;?>">
                </td>
                </tr>
                <tr>
                <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET
    fullname = '$full_name',
    username = '$username'
    Where id ='$id'
    ";

    $res = mysqli_query($conn , $sql);
    if($res==TRUE){
        $_SESSION['update'] = "<div class='success'>Admin Update successfuly</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update'] = "<div class='error'>Failed To Delete Admin.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}
?>
<?php include("partials/footer.php"); ?>