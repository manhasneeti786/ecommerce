<?php require('top.php');
$order_id=mysqli_real_escape_string($conn,$_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myorder_detail</title>
    <link rel="stylesheet" href="css_folder_for_frent/cart.css?v=<?=$version?>">
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="javascript/index.js"></script>    
<body>
<div class="inner_product">
        <img src="image/fashion-choice.jpeg" alt="">
    </div>
    <div class="wishlist-table">
        <table>
            <thead>
                <tr>
                    <th class="product-thumbnail">
                    product name
                    </th> <th class="product-thumbnail">
                    product image
                    </th>
                    <th class="product-name">Quantity</th>
                    <th class="product-price">price</th>
                    <th class="product-price">total price</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $uid=$_SESSION['USER_ID'];
              
              $sql="SELECT DISTINCT(order_details.id), order_details.*, product.name, product.image FROM 
              order_details , product , order WHERE 
              order_details.order_id = '$order_id' AND order.user_id = '$uid' AND order_details.product_id=product.id";
                $res= mysqli_query($conn,$sql);
                $total_price=0;
                while($row=mysqli_fetch_assoc($res)){
                    $total_price=$total_price+($row['qty']* $row['price']);
                ?>
                <tr>
                   
                    <td class="product-name1"><?php echo $row['name'] ?>
                </td>
                    <td class="product-name1"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>"></td>
                    <td class="product-name1"><?php echo $row['qty'] ?></td>
                    <td class="product-name1"><?php echo $row['price'] ?></td>
                    <td class="product-name1"><?php echo $row['qty']* $row['price'] ?></td>
                </tr>
                <?php
                 }
                 ?>
                <tr>
                   
                   
                   <td colspan="3"></td>
                   <td class="product-name1">total price</td>
                   <td class="product-name1"><?php echo $total_price ?></td>
               </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>
<?php 
require('footer.php');
?>
