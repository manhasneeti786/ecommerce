<?php
require('top.php');
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-page</title>
    <link rel="stylesheet" href="css_folder_for_frent/homestyle.css?v=<?=$version?>">
</head>
<body>
  
  <div class="container">
<div class="content">
         <img src="image/shopping1.jpeg" alt="shopping">
        <div class="box">
          <ul>
            <li>Super value deals</li>
            <li>On all products</li>
            <li id="shop-logo">Shop now</li>
          </ul>
        </div>
      </div>
      </div>
      <div class="cont"><h2>Features</h2></div>
      <section id="feature">
        
        <div class="boxs">
          <img src="image/free.jpeg" alt="free shipping">
          
        </div>
        <div class="boxs-2">
          <img src="image/available.jpeg" alt="24/7 available">
          
        </div>
        <div class="boxs-3">
          <img src="image/save.jpeg" alt="save money">
          
        </div>
      </section>
      <div class="design">
        <h4>New Arivals</h4></div>
       <section id="main-pro-container">
      <?php
      $limit = 4;
      $get_product = get_product($conn,'');
      foreach($get_product as $list){

      
      echo"<div class='container-pro'>
            <div class='prot'>
                <a href='product.php?id=". $list["id"]."'>
                    <img src='".PRODUCT_IMAGE_SITE_PATH.$list["image"]."' alt='त्रौज़र्स'>
                </a>
                <span class='boxing'> <a href='#'>". $list["name"]."</a></span>
                    <span class='boxing2'><b>MRP:". $list["mrp"]."</b></span>        
                   <span><b>PRICE:". $list["price"]."</b></span>        
        </div>  
        </div>
        ";}?>
      </section>
      <?php
require('footer.php');
?>
</body>
</html>

