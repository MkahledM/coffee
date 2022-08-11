<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>


         <?php
         if(isset($_GET['id'])){
     
            //get all detales
              $id = $_GET['id'];
           //mysql query
              $sql = "SELECT * FROM tbl_category WHERE id=$id";
              $res = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($res);

              if($count==1){

                // get all data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            


              }
              else
              {
                           //REDIRECT TO MANAGE CATEGORY
            $_SESSION['no-category-found'] = "<div class='error'> category not found </div>";
            header('location:'.SITEURL.'admin/manage-category.php');



              }


         }
         else
         {
            //REDIRECT TO MANAGE CATEGORY

            header('location:'.SITEURL.'admin/manage-category.php');

         }
         
         ?>




        <form action="" method="POST" enctype="multipart/form-data">
       <table class="tbl-30">
              <tr>
                <td> Title: </td>
                <td>
                <input type="text" name="title" placeholder="category title" value="<?php echo $title; ?>">

                </td>
              </tr>
              <tr>
                <td>Current Image:</td>
                <td>
                <?php
                if($current_image !=""){
                    //display image

                    ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
                    <?php
                }
                else
                {
                    //show errormessage
                   echo "<div class'error'>image not added</div>";

                }
                ?>
                </td>
              </tr>
              <tr>
                <td>New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
              </tr>
               <tr>
                 <td>Featured:</td>
              <td>
                <input <?php if($featured=="yes"){echo"checked";} ?> type="radio" name="featured" value="yes">Yes
                <input <?php if($featured=="no"){echo"checked";} ?> type="radio" name="featured" value="no"> No

              </td>
               </tr>
               <tr>
                 <td>Active:</td>
              <td>
                <input <?php if($active=="yes"){echo"checked";} ?> type="radio" name="active" value="yes">Yes
                <input <?php if($active=="no"){echo"checked";} ?> type="radio" name="active" value="no"> No

              </td>
               </tr>
               <tr>
                <td colspan="2">
                    <input type="hidden" name=" current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name=" id" value="<?php echo $id; ?>">

                    <input type="submit" name="submit" value="Update Category" class="btn btn-secondary">
                </td>
               </tr>




        </table>
        </form>
        <!-- //save update data -->
        <?php
        //get all value from form
        
         if(isset($_POST['submit'])){

          $id = $_POST['id'];
          $title = $_POST['title'];
          $current_image = $_POST['current_image'];
          $featured = $_POST['featured'];
          $active = $_POST['active'];

          //update image if is selected 
          if($_FILES['image']['name']){
            //get all image details

            $image_name = $_FILES['image']['nmae'];
            if($image_name != "")
            {
                //upload new image 

                $ext = end(explode('.',$image_name));
            $image_name = "drink_category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/category/".$image_name;
              //upload image
            $upload = move_uploaded_file($source_path,$destination_path);

            //check image is upload or no if not upload stop proccess and show error message 
            if($upload==false){
                $_SESSION['upload'] = "<div class='error'> failed to upload image</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();

            }
            if($current_image != ""){
                $remove_path = "../images/category/".$current_image;
                $remove = unlink($remove_path);
                if($remove==false){
                    $_SESSION['failed_remove'] = "<dive class'error'>failed to remove current image</dive>";
                    //redirect
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();
                }

            }
           

            }
            else{

                $image_name = $current_image; 
            }
          }
          else{

            $image_name = $current_image;
          }

          //updating  database 
          $sql2 = "UPDATE tbl_category  SET 
          title = '$title',
          image_name = '$image_name',
          featured = '$featured',
          active = '$active'
          WHERE id=$id";
          $res2 = mysqli_query($conn,$sql2);

          if($res2==true){
            //category update
            $_SESSION['update'] = "<div class='success'>category update successfuly</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
          }
          else {
            $_SESSION['update'] = "<div class='error'>category update failed</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
          }

         }




        ?>
          
</div>
</div>


<?php include('partials/footer.php')?>
