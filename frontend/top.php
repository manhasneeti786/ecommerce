<?php
 require('connection.php');
 require('function.php');
 require('config.php');
 require('add_to_cart.php');
 $cat_res=mysqli_query($conn,"select * from categories where status=1");
 $cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
$cat_arr[]=$row;
}
$obj= new add_to_cart();
$totalproduct=$obj->totalproduct();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce-ShopEasy.in </title>
    <link rel="stylesheet" href="css_folder_for_frent/homestyle.css?v=<?=$version?>">
    <script src="https://kit.fontawesome.com/2b3f24cffe.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <div class="navbar">
        <ul class="logo">
            <li>ShopEasy.in</li>
        </ul>
        <div>
            <ul class="icons">
                <li><a href="index.php">Home</a></li>
                <?php
                foreach($cat_arr as $list){
                    ?><li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                    <?php
                }
                ?>
     
       <li class="contact-btn"><a href="contact.php">Contact</a></li>
       <?php if(isset($_SESSION['email'])){
        echo ' <li><a href="logout.php">Logout</a></li><a class="myorder" href="myorder.php">My Order</a>';
       }else{
        echo '<li><a href="login.php">Login</a></li>';
       }?>
      <!-- <div class="serch">
                           
                <input type="text" name="str" id="inbtn" placeholder="ShopEasy.in"><button class="btn">Search <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>

            </div> -->
            </ul>
            </div> <div  class="add_cart">
       <a href="cart.php" >Mycart<i class="fa-solid fa-cart-shopping"></i></a></div>
      <div class="add_cart"> <a href="cart.php"><span class="htc_qua"><?php echo $totalproduct ?></span></a></div>
   <div class="wish">
    <?php    
    if(isset($_SESSION['USER_LOGIN'])){

   
    ?>
      <!-- <a href="wishlist.php"> <i class="fa-regular fa-heart"></i></a>
      <a href="wishlist.php"><span class="htc_wish"><?php
    //    echo $wishlist_count 
      ?></span></a> -->
      <?php }
      ?>
    </div>
    </div>
    </header>
</body>
</html>
