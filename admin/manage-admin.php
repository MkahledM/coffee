
<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="warpper">
    <h1>Manage Admin</h1>
    <br/> <br/>
    <?php
    if(isset($_SESSION['add'])) {
        echo $_SESSION ['add'];  //display ssesion messager
        unset ($_SESSION ['add']); //remove ssesion message
    }
    if(isset($_SESSION['delete'])) {
        echo $_SESSION ['delete'];  //display ssesion messager
        unset ($_SESSION ['delete']); //remove ssesion message
    }
    if(isset($_SESSION['update'])) {
        echo $_SESSION ['update'];  //display ssesion messager
        unset ($_SESSION ['update']); //remove ssesion message
    }
    if(isset($_SESSION['user-not-found'])) {
        echo $_SESSION ['user-not-found'];  //display ssesion messager
        unset ($_SESSION ['user-not-found']); //remove ssesion message
    }
    if(isset($_SESSION['pwd-not-match'])) {
        echo $_SESSION ['pwd-not-match'];  //display ssesion messager
        unset ($_SESSION ['pwd-not-match']); //remove ssesion message
    }
    if(isset($_SESSION['change-pwd'])) {
        echo $_SESSION ['change-pwd'];  //display ssesion messager
        unset ($_SESSION ['change-pwd']); //remove ssesion message
    }
    ?>
    <br> <br> <br>
    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br/> <br/> <br/>
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php
        //query to get all admin
        $sql = "SELECT * FROM tbl_admin";

        //Excute the Query
        $res = mysqli_query($conn ,  $sql);

        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);//function to get all row in database
            $sn=1;
            //check the num of rows
            if($count>0)
            {
                //we have data in database 
                while($rows=mysqli_fetch_assoc($res))
                {
                    //while loop to get all data from database
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a> 
                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            else
            {
                //we dont have data in database
            }
        }

        ?>


    
    </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>
