<?php
require('top.php');
include 'config.php';
$categories = '';
$msg = '';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $res = mysqli_query($conn,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
       $row = mysqli_fetch_assoc($res);
       $categories = $row['categories'];
    }else{
    header('location:categories.php');
    die();
    }
}

if(isset($_POST['submit'])){
    
    $categories = mysqli_real_escape_string($conn,$_POST['categories']);

    $res = mysqli_query($conn,"select * from categories where categories='$categories'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getdata=mysqli_fetch_assoc($res);
            if($id==$getdata['id']){

            }else{
                 $msg="Categories already exist"; 
            }
        }else{
            $msg="Categories already exist";
        }
    }
    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($conn, "update categories set categories='$categories' where id='$id'");
  }
      else{
      mysqli_query($conn,"insert into categories(categories,status) values('$categories','')");
      }
      header('location:categories.php');
      die();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_categories</title>
    <link rel="stylesheet" href="css_folder/styles.css?v=<?=$version?>">
</head>
<body>
    <h3 class="high">Categories Form</h3>
    <form method="post">
        <label for="categories">Categories</label><br>
        <input type="text" name="categories" placeholder="Enter categories name" required value = "<?php echo $categories ?>"><br>
        <button type="submit" name="submit">Submit</button>
        <div class="field_error">
<?php
    echo $msg ;?>
</div>
    </form>
    <footer>
    <div class="footers">
            Copyright <?php echo date('Y') ?> Admin ShopEasy
        </div>
    </footer>
</body>
</html>
