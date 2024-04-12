<?php
require('top.php');
require('config.php');
$uid=$_SESSION['USER_ID'];

$res=mysqli_query($conn,"SELECT product.name,product.image,product.price,product.mrp , wishlist.id
FROM product, wishlist where wishlist.product_id= product.id and wishlist.user_id='$uid'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wishlist</title>
    <link rel="stylesheet" href="css_folder_for_frent/cart.css?v=<?=$version?>">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="javascript/index.js"></script>   
</head>
<body> <section id="content-main">
<div class="inner_product">
        <img src="image/fashion-choice.jpeg" alt="">
    </div>
    <div class="table">
    <table>
        <thead>
            <tr>
                <th class="product-thumbnail">Products</th>
                <th class="product-name">Name of product</th>
                <th class="product-remove">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
           while($row=mysqli_fetch_assoc($res)){

            ?>
            <tr>
                <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH .$row['image'] ?>" ></a></td>
                <td class="product-name"><a href="#"><?php echo $row['name']  ?></a>
            <ul class="pro-price">
                <li class="old-price"><?php echo $row['mrp']  ?></li>
                <li><?php echo $price ?></li>
            </ul></td>
            <td class="product-price"><span class="amount"><?php echo $row['price']  ?> </span></td>
           
            <td class="product-remove">
                <a href="wishlist.php?wishlist_id=<?php echo $row['id']?>"></a></td>
            </tr>
           <?php  } ?>
        </tbody>
</table>
</div>
    <div class="checkout-btn"><button><a href="index.php">Continue shopping</a></button></div> </div>
    <div class="checkout-btn"><button><a href="checkout.php">Checkout</a></button></div>
    </section>
</body>
</html>
<?php 
require('footer.php');
?>
