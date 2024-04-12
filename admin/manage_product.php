<?php
require('top.php');
include 'config.php';
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$quanty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = '';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $image_required='';
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $res = mysqli_query($conn,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
       $row = mysqli_fetch_assoc($res);
       $categories_id = $row['categories_id'];
       $name = $row['name'];
       $mrp = $row['mrp'];
       $price = $row['price'];
       $quanty = $row['quanty'];
       $short_descri = $row['short_desc'];
       $description = $row['description'];
       $meta_title = $row['meta_title'];
       $meta_desc = $row['meta_desc'];
       $meta_keyword = $row['meta_keyword'];
    }else{
    header('location:product.php');
    die();
    }
}

if(isset($_POST['submit'])){
    
    $categories_id = mysqli_real_escape_string($conn,$_POST['categories_id']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $mrp = mysqli_real_escape_string($conn,$_POST['mrp']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $quanty = mysqli_real_escape_string($conn,$_POST['quanty']);
    $short_descri = mysqli_real_escape_string($conn,$_POST['short_desc']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $meta_title = mysqli_real_escape_string($conn,$_POST['meta_title']);
    $meta_desc = mysqli_real_escape_string($conn,$_POST['meta_desc']);
    $meta_keyword = mysqli_real_escape_string($conn,$_POST['meta_keyword']);


    $res = mysqli_query($conn,"select * from product where name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getdata=mysqli_fetch_assoc($res);
            if($id==$getdata['id']){

            }else{
                 $msg="Product already exist"; 
            }
        }else{
            $msg="Product already exist";
        }
    }
    // if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' || $_FILES['image']['type']!='image/jpg' ||  $_FILES['image']['type']!='image/jpeg')){
    //     $msg="please select only png,jpg and jpeg image format";
    // }


    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
                 $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../product/'.$image);
        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',quanty='$quanty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
            }else{
                $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',quanty='$quanty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
  }
      else{
        $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../product/'.$image);
      mysqli_query($conn,"insert into product(categories_id,name,mrp,price,quanty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$quanty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
      }
      header('location:product.php');
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
    <h3 class="high">Product Form</h3>
    <form method="post" enctype="multipart/form-data">
        <label for="categories">Categories</label><br>
<select name="categories_id" class="labels">
<option>Select category</option>
<?php
$res=mysqli_query($conn,"select id,categories from categories order by categories asc");
while($row=mysqli_fetch_assoc($res)){
    if($row['id']==$categories_id){
        echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
    }else{
        echo "<option value=".$row['id'].">".$row['categories']."</option>";
    }
    
}
?>
</select>
        <label for="categories">Product name</label><br>
        <input type="text" name="name" placeholder="Enter product name" required value = "<?php echo $name ?>"><br>
        
        <label for="categories">MRP</label><br>
        <input type="text" name="mrp" placeholder="Enter product mrp" required value = "<?php echo $mrp ?>"><br>
        <label for="categories">Price</label><br>
        <input type="text" name="price" placeholder="Enter product price" required value = "<?php echo $price ?>"><br>
        <label for="categories">Quantity</label><br>
        <input type="text" name="quanty" placeholder="Enter product quanty" required value = "<?php echo $quanty ?>"><br>
        
        <label for="categories">Image</label><br>
        <input type="file" name="image" <?php echo $image_required ?>><br>
        
        <label for="categories">Short Description</label><br>
        <textarea id="txt" name="short_descri" placeholder="Enter product short description" required><?php echo $short_desc ?></textarea><br>
        <label for="categories">Description</label><br>
        <textarea id="txt" name="description" placeholder="Enter product description" required><?php echo $description ?></textarea><br>

        <label for="categories">Meta Title</label><br>
        <textarea id="txt" name="meta_title" placeholder="Enter product meta title"><?php echo $meta_title ?></textarea><br>
        <label for="categories">Meta Description</label><br>
        <textarea id="txt" name="meta_desc" placeholder="Enter product meta_description"><?php echo $meta_desc ?></textarea><br>
        <label for="categories">Meta Keyword</label><br>
        <textarea id="txt" name="meta_keyword" placeholder="Enter product meta_keyword"><?php echo $meta_keyword ?></textarea><br>
        <button type="submit" name="submit">Submit</button>
        <div class="field_error">
<?php
    echo $msg ;?>
</div>
    </form>
    <footer>
    <div class="footers">
            Copyright <?php echo date('Y') ?> Admin ShopEasy.in
        </div>
    </footer>
</body>
</html>
