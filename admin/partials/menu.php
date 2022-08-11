<?php include ('../config/constants.php');?>
<?php include('login-check.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Coffe Website - Home Page</title>
</head>
<body>
    
    <!--   Menu Section -->
    <div class="menu text-center">
        <div class="warpper">
        <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-drink.php">Drinks</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="users.php">users</a></li>
                <li><a>welcom : <?php echo $_SESSION['user'];?></a></li>


            </ul>
        </div>
    </div>