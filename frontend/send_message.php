<?php 
require('connection.php');
require('function.php');

$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$comment=mysqli_real_escape_string($conn,$_POST['message']);
$added_on=date('Y-m-d h:l:s');
mysqli_query($conn,"insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
 echo "Thank You";
 ?>