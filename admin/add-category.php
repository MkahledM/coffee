
<?php include('partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
<?php
        if(isset($_SESSION['add'])){
           echo  $_SESSION['add'] ;
           unset( $_SESSION['add']);

         }

         if(isset($_SESSION['upload'])){
            echo  $_SESSION['upload'] ;
            unset( $_SESSION['upload']);
 
          }
         ?>
           <br><br>
        <!-- add category from starts -->
        <form action="" method="POST" enctype="multipart/form-data">
     
        <table class="tbl-30">
              <tr>
                <td> Title: </td>
                <td>
                <input type="text" name="title" placeholder="category title">

                </td>
              </tr>
              <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
              </tr>
               <tr>
                 <td>Featured:</td>
              <td>
                <input type="radio" name="featured" value="yes">Yes
                <input type="radio" name="featured" value="no"> No

              </td>
               </tr>
               <tr>
                 <td>Active:</td>
              <td>
                <input type="radio" name="active" value="yes">Yes
                <input type="radio" name="active" value="no"> No

              </td>
               </tr>
               <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn btn-secondary">
                </td>
               </tr>




        </table>
          
          


        </form>
        <!-- add category from end -->
        <?php 
        //check the button is clicked or no
        if(isset($_POST['submit'])){

          //get value from the form
         $title = $_POST['title'];
         //check if radio burron check or no
         if(isset($_POST['featured'])){
             //get value from form
            $featured = $_POST['featured'];

         }
         else{
            //get defualt value
            $featured = "No";
         }
        
         //check if radio burron check or no
         if(isset($_POST['active'])){
             //get value from form
            $active = $_POST['active'];

         }
         else{
            //get defualt value
            $active = "No";
         }

         //check image selected or no 
        if(isset($_FILES['image']['name'])){
            //upload image
            $image_name = $_FILES['image']['name'];
            if($image_name !=""){

            //auto rename and get extention for image
            $ext = end(explode('.',$image_name));
            $image_name = "drink_category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/category/".$image_name;
              //upload image
            $upload = move_uploaded_file($source_path,$destination_path);

            //check image is upload or no if not upload stop proccess and show error message 
            if($upload==false){
                $_SESSION['upload'] = "<div class='error'> failed to upload image</div>";
                header('location:'.SITEURL.'admin/add-category.php');
                die();

            }
          }

        }
        else{
            $image_name = "";
        }
         //create sql query to insert category to database
         $sql = "INSERT INTO  tbl_category SET 
         title = '$title',
         image_name='$image_name',
         featured = '$featured',
         active = '$active'
         ";
         
         //excute the query 
         $res = mysqli_query($conn,$sql);
             
         //check is the query excuted or no and data added or no
         if($res==true){
            $_SESSION['add'] = "<div class='success'> category add successful</div>";
            header('location:'.SITEURL.'admin/manage-category.php');

         }
         else{
            $_SESSION['add'] = "<div class='error'> category add faild</div>";
            header('location:'.SITEURL.'admin/add-category.php');

         }




        }
        
        
        
        
        
        
        
        
        
        ?>
        </div>
</div>




<?php include('partials/footer.php')?>
