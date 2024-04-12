<?php
require('top.php');
require('config.php');
$product_id = mysqli_real_escape_string($conn,$_GET['id']);
$get_product = get_product($conn, $product_id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css_folder_for_frent/categories.css?v=<?=$version?>">
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="javascript/index.js"></script> 
<body>
<div class="main_products">
    <div class="inner_product">
        <img src="image/fashion-choice.jpeg" alt="">
    </div>
  </div>
  <section id="content-main">
    <div class="main-pro">
        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH .$get_product['0']['image'] ?>" alt="asaa"></div>
    <div class="product-name">
        <h2><?php echo $get_product['0']['name'] ?></h2>
    
    <ul class="mrp">
        <li class="mrp2"> <b>MRP:&nbsp;<?php echo $get_product['0']['mrp'] ?></b></li>
    <li class="mrp3"> <b>Price:&nbsp;<?php echo $get_product['0']['price'] ?></b></li>
</ul>
<p class="pro-info"><?php echo $get_product['0']['short_desc'] ?></p>
    <div class="sin-des">
        <p><span>Availability:</span><br><br><b class="bold">In Stock</b></p>
    
    <div class="sin-desc">
        <p><span>Qty:</span>
    <select id="qty">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>

    </select>
    </p>
    
    <div class="sin-description">
        <p><span>Categories:</span></p><br>
        <ul class="men">
            <li><a href="#">men</a></li>
        </ul>
   
    <div class="add"> <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</a></div>
    </div></div></div></div>
  </section>
  <div class="description">
    <span class="descr">Description:</span>
  <p class="pro-infom"><?php echo $get_product['0']['description'] ?></p>
</div></div>
      
</body>
</html>
<?php
require('footer.php');
?>
