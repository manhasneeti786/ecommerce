<?php
require('top.php');
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
                <th class="product-remove">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($_SESSION['cart'] as $key=>$val){
                $productarr=get_product($conn,$key);
                $pname=$productarr[0]['name'];
                $mrp=$productarr[0]['mrp'];
                $price=$productarr[0]['price'];
                $image=$productarr[0]['image'];
                $qty=$val['qty'];
                
            ?>
            <tr>
                <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH .$image ?>" ></a></td>
                <td class="product-name"><a href="#"><?php echo $pname ?></a>
            <ul class="pro-price">
                <li class="old-price"><?php echo $mrp ?></li>
                <li><?php echo $price ?></li>
            </ul></td>
            <td class="product-price"><span class="amount"><?php echo $price ?> </span></td>
            <td class="product-quantity"><input type="number" id="<?php echo $key ?>qty" value="<?php echo $qty?> "/> <br/>
            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','update')">update</a></td>
            <td class="subtotal"><?php echo $qty*$price ?></td>
            <td class="product-remove">
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><!--<i class="icon-trash icons">-->Remove</a></td>
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
