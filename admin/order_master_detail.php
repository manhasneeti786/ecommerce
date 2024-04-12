<?php
include 'config.php';
require('top.php');
$order_id=mysqli_real_escape_string($conn,$_GET['id']);
if(isset($_POST['update_order_status'])){
    $update_order_status=$_POST['update_order_status'];
    mysqli_query($conn,"update `order` set order_status='$update_order_status' where id='$order_id';");
}
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
        <h4 class="box-title">Order Details</h4>
    </div>
    <div class="tab">
        <table class="tables">
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
              
              $sql="SELECT DISTINCT(order_details.id), order_details.*, product.name, product.image,
               `order`.address, `order`.city, `order`.pincode FROM 
              order_details , product , `order` WHERE 
              order_details.order_id = '$order_id'  AND order_details.product_id=product.id";
                $res= mysqli_query($conn,$sql);
                $total_price=0;
                while($row=mysqli_fetch_assoc($res)){
                    $address=$row['address'];
                    $city=$row['city'];
                    $pincode=$row['pincode'];
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
        <div id="address_details">
            <strong>Address</strong>
            <?php echo $address ?>, <?php echo $city ?>, <?php echo $pincode ?><br><br>
            <strong>Order Status</strong>
            <?php
            $order_status_arr=mysqli_fetch_assoc(mysqli_query($conn,"select order_status.name from order_status, `order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
            echo $order_status_arr['name'];
            ?>
            <div>
                <form  method="post">
                <select name="update_order_status" class="labels">
                    <option>Select Status</option>
                        <?php
                        $res=mysqli_query($conn,"select * from order_status ");
                        while($row=mysqli_fetch_assoc($res)){
                              if($row['id']==$categories_id){
                            echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                        }else{
                             echo "<option value=".$row['id'].">".$row['name']."</option>";
                          }
    
                            }
                        ?>
                </select>
                    <input type="submit" class="form-control">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require('footer.php');
?>
