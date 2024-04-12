<?php require('top.php');
require('config.php');
// if(null==($_SESSION['cart'] || count($_SESSION['cart'])==0)){
    ?> 
    <!-- <script> 
    window.location.href='index.php';
    </script> -->
    <?php     
    //  }
     $cart_total=0;

if(isset($_POST['submit'])){
$address=mysqli_real_escape_string($conn,$_POST['address']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
$payment_type=mysqli_real_escape_string($conn,$_POST['payment_type']);
$user_id=$_SESSION['USER_ID'];
foreach($_SESSION['cart'] as $key=>$val){
    $productarr=get_product($conn,$key);
     $price=$productarr[0]['price'];
     $qty=$val['qty'];
     $cart_total=$cart_total+($price*$qty);
     
}
$total_price=$cart_total;
$payment_status='pending';
if($payment_type=='cod'){
$payment_status='success';}
$order_status='1';
$added_on=date('Y-m-d h:i:s');

mysqli_query($conn,"INSERT INTO `order`(user_id, address, city, pincode, payment_type, total_price, payment_status, order_status, added_on) VALUES ('$user_id','$address','$city','$pincode','$payment_type','$total_price','$payment_status','$order_status','$added_on')");

$order_id=mysqli_insert_id($conn);
foreach($_SESSION['cart'] as $key=>$val){
    $productarr=get_product($conn,$key);
     $price=$productarr[0]['price'];
     $qty=$val['qty'];
     mysqli_query($conn,"INSERT INTO order_details( order_id, product_id, qty, price) VALUES ('$order_id','$key','$qty','$price')");


}
// unset($_SESSION['cart']);
?> 
   <script> 
   window.location.href='thank_you.php';
   </script>
   <?php
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css_folder_for_frent/cart.css?v=<?=$version?>">
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="javascript/index.js"></script>    
<body>
<div class="inner_product">
        <img src="image/fashion-choice.jpeg" alt="">
    </div>
    <?php 
   
    if(!isset($_SESSION['USER_LOGIN'])){
       ?>
    
    <div class="login2">
        Login 
    </div>
    <div class="reg">Register</div>

    <section id="section">
    <div class="login-form">
        <form method="post">
            <label for="">Username</label><br>
            <input type="text" name="login_email" id="login_email" placeholder="Enter your name" required><br><br>
            <span class="field_error" id="login_email_error"></span><br>
            <label for="">Password</label><br>
            <input type="password" name="login_password" id="login_password" placeholder="Enter your password" required><br>
            <span class="field_error" id="login_password_error"></span><br>
            <button type="button" class="btn4" onclick="user_login()">Login</button>
            <div class="form-output login_msg">
    <p class="form-message field_error"></p>
</div>
        
    </div>
    <div class="login-form2">
      
            <label for="">Username</label><br>
            <input type="text" name="name" id="name" placeholder="Enter your name" required><br><br>
            <span class="field_error" id="name_error"></span><br>
            <label for="" class="email">Email</label><br>
            <input type="text" name="email" id="email" placeholder="Enter your email" required><br><br>
            <span class="field_error" id="email_error"></span><br>
            <label for="">Mobile</label><br>
            <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile" required><br><br>
            <span class="field_error" id="mobile_error"></span><br>
            <label for="">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Enter your password" required><br>
            <span class="field_error" id="password_error"></span><br>
            <button type="button" class="btn4" onclick="user_register()">Login</button>
            <div class="form-input register_msg">
    <p class="form-message field_error"></p>
</div>
        </form></div>
<?php } ?>
    <div class="your-order">
        <h5>Your Order:</h5>    
        <div class="order-details-item">
        <?php
       
        $cart_total=0;
            foreach($_SESSION['cart'] as $key=>$val){
                $productarr=get_product($conn,$key);
                $pname=$productarr[0]['name'];
                $mrp=$productarr[0]['mrp'];
                $price=$productarr[0]['price'];
                $image=$productarr[0]['image'];
                $qty=$val['qty'];
                $cart_total=$cart_total+($price*$qty);
            ?>    </div>
            <div class="single-item">
                <div class="single-item-thumb">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH .$image ?>" />
                </div>
                <div class="single-item-content">
                    <a href="#"><?php echo $pname ?></a><br>
                    <span class="price-s"><?php echo $price*$qty ?></span>
            </div>
                <div class="single-item-remove">
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><!--<i class="icon-trash icons">-->Remove</a>
                </div>    
            </div>
            <?php } ?>
        </div>
                <div class="order-details-count-total">
                    <h5>ORDER TOTAL:</h5><br>
                    <span class="price"><?php echo $cart_total ?></span>
                </div>
            <!-- </div> -->
    </div></section>
    <div class="address">
       <span>ADDRESS INFORMATION</span>
    </div>
    <form method="post">
        <div class="row">
            <input type="text" name="address" placeholder="street address" required>
        </div>
        <div class="row2">
            <input type="text" name="city" placeholder="city/state" required>
        </div>
        <div class="row3">
            <input type="text"  name="pincode" placeholder="post code/pin-code" required>
        </div>
     <div class="payment">
      <span>  PAYMENT INFORMATION</span>

    </div>
    <div class="accordion-body">
        <div class="payment-info">
            <div class="single-method">
             <h5> COD </h5>
               <input type="radio" name="payment_type" value="cod" class="radio" required>
            </div>
            <div class="single-method">
                <input type="submit" name="submit" class="sub">
            </div>
        </div>
    </div></form>
</body>
</html>
<?php
require('footer.php');
