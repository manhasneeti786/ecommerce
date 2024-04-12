<?php require('top.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myorder</title>
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
                        Order ID
                    </th>
                    <th class="product-name"><span>Orrder Date</span></th>
                    <th class="product-price"><span>ADDRESS</span></th>
                    <th class="product-stock"><span>Payment type</span></th>
                    <th class="product-order"><span>Payment status</span></th>
                    <th class="product-status"><span>Order status</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid=$_SESSION['USER_ID'];
              $sql="SELECT  `order`.*, order_status.name AS order_status_str FROM
                `order` , order_status WHERE
                `order`.user_id = '$uid' AND order_status.id =  `order`.order_status";
                $res= mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td class="add"><a href="myorder_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                    <td class="product-name1"><?php echo $row['added_on'] ?>
                </td>
                    <td class="product-name1">
                     ADDRESS:  &nbsp; <?php echo $row['address'] ?><br>
                       CITY: &nbsp;<?php echo $row['city'] ?><br>
                       PINCODE: &nbsp;<?php echo $row['pincode'] ?>
                </td>
                    <td class="product-name1"><?php echo $row['payment_type'] ?></td>
                    <td class="product-name1"><?php echo $row['payment_status'] ?></td>
                    <td class="product-name1"><?php echo $row['order_status_str'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
<?php 
require('footer.php');
?>
