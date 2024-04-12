<?php
include 'config.php';
require('top.php');

$sql= "SELECT * FROM users ORDER By id desc" ;
$res = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="css_folder/styles.css?v=<?=$version?>">
</head>
<body>
    <div class="category">
        <h4 class="box-title">Order Master</h4>
    </div>
    <div class="tab">
        <table class="tables">
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
      
              $sql="SELECT `order`.*, order_status.name AS order_status_str FROM
               `order` , order_status WHERE
                order_status.id = `order`.order_status";
                $res= mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td class="add"><a href="order_master_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
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
