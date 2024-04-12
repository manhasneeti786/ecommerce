<?php
require('connection.php');
require('function.php');
require('add_to_cart.php');

$pid= mysqli_real_escape_string($conn,$_POST['pid']);

$qty= mysqli_real_escape_string($conn,$_POST['qty']);
$type= mysqli_real_escape_string($conn,$_POST['type']);
$obj= new add_to_cart();
if($type=='add'){
    $obj->addproduct($pid,$qty);
}
if($type=='remove'){
    $obj->removeproduct($pid);

}if($type=='update'){
    $obj->updateproduct($pid,$qty);

}
echo $obj->totalproduct();
?>