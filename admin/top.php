<?php 
require('connection.php');
include 'config.php';
require('function.php');
 if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] !=''){

 }else{
    header('location:login.php');
    die();
 }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="css_folder/styles.css?v=<?=$version?>">
</head>
<body>
    <nav>
        <div class="side"><div class="image">
            <img src="img/admin.jpeg" alt=""> <h1>ADMIN </h1></div>
           
            <ul class="list">
                <li><a href="">Menu:</a></li>
            <li><a href="categories.php">Categories Master</a></li>
            <li><a href="product.php">Product Master</a></li>
            <li><a href="order_master.php">Order Master</a></li>
            <li><a href="users.php">User Master</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </div>
    </nav>
   <ul class="welcome">
    <li><a href="#">Welcome Admin</a>
    <ul class="dropdown">
        <li><a href="logout.php">Logout</a></li>
    </ul>
</li>
</ul>
  
</body>
</html>
