<?php
require('connection.php');
require('function.php');

$pid= mysqli_real_escape_string($conn,$_POST['pid']);
$type= mysqli_real_escape_string($conn,$_POST['type']);
if(isset($_SESSION['USER_LOGIN'])){
    $uid=$_SESSION['USER_ID'];
    if(mysqli_num_rows(mysqli_query($conn, "select * wishlist where user_id='$uid' and product_id='$pid'"))>0){

    }else{
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($conn,"INSERT INTO wishlist(user_id, product_id, added_on) VALUES ('$uid','$pid','$added_on')");
    echo $total_record=mysqli_num_rows(mysqli_query($conn, "select * wishlist where user_id='$uid'"));
    }
}else{
    echo "not_login";
}
?>
