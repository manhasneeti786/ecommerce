<?php
require('connection.php');
require('function.php');
$msg='';
 if(isset($_POST['submit'])){
     $username = mysqli_real_escape_string($conn,$_POST['username']);
     $password = mysqli_real_escape_string($conn,$_POST['password']);
     $sql ="SELECT * FROM admin WHERE username='$username' and password='$password' ";
     $result_query = mysqli_query($conn,$sql);
    
      $count = mysqli_num_rows($result_query);
 
    if($count>0){
             $_SESSION['ADMIN_LOGIN']='yes';
         $_SESSION['ADMIN_USERNAME']=$username;
         header('location:categories.php');
         die();
   }else{
     $msg="Please enter correct login details";       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css_folder/style.css">
</head>
<body>
    <div class="login">
        
        <form method="post">
            <h2 class="box">Login</h2>
    <label class="label">Username</label><br>
    <div class="input-box">
    <input type="text" name="username" placeholder="Enter Username"  class="user" required><br>
</div>
    <label  class="label">Password</label><br>
    <div class="input-box">
    <input type="password" name="password" placeholder="Password" class="pass" required><br>
</div>
    <button type="submit" name="submit" class="submit"> Sign in</button>
        </form>
<div class="field_error">
<?php
    echo $msg ;?>
</div>
    </div>
     
    
</body>
</html>
