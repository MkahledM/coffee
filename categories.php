

<?php include('config/constants.php');?>
<?php include('admin/partials/register_check.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo-coffe.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="Drinks.php">Drinks</a>
                    </li>
                    <li>
                        <a href="order.php">orders</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="../admin/logout.php">logout</a>
                    </li>
                    <li>
                        <a>welcom <?php echo $_SESSION['user2'];?> </a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore coffe</h2>

            <a href="category-drinks.html">
            <div class="box-3 float-container">
                <img src="images/menu-2.png"  class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png"  class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <!-- <a href="#">
            <div class="box-3 float-container">
                <img src="../images/menu-2.png" lass="img-responsive img-curve">

                <h3 class="float-text text-white">Coffe</h3>
            </div>
            </a> -->

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png" class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png"  class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png"  class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>
            <!-- <a href="#">
            <div class="box-3 float-container">
                <img src="../images/.menu-2.png" class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a> -->

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png"  class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png" class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png"  class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/menu-2.png" class="img-responsive img-curve">

                <h3 class="float-text text-white">coffe</h3>
            </div>
            </a>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>