<?php
include 'config.php';
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=mysqli_real_escape_string($conn,$_GET['type']);
    if($type=='status'){
        $operation=mysqli_real_escape_string($conn,$_GET['operation']);
        $id=mysqli_real_escape_string($conn,$_GET['id']);
        if($operation=='active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_status_sql="update product set status='$status' where id='$id' ";
        mysqli_query($conn,$update_status_sql);
    }
    if($type=='delete'){
        $id=mysqli_real_escape_string($conn,$_GET['id']);
        $delete_sql="delete from product  where id='$id' ";
        mysqli_query($conn,$delete_sql);
    }
}
$sql = "select product.*,categories.categories from product,categories where product.categories_id=categories.id order by id desc";
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
        <h4 class="box-title">Products</h4>
       <h4 class="box"> <a href="manage_product.php">Add Product</a></h4>
    </div>
    <div class="tab">
        <table class="tables">
            <thead>
                <tr>
                    <th class=" serial">#</th>
                    <th>ID</th>
                    <th>Categories</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>MRP</th>
                    <th>Price</th>
                    <th>Qty</th>

                    <th></th>
</tr>
</thead>
<tbody>
    <?php 
    $i=1;
    while($row=mysqli_fetch_assoc($res)) {?>    
<tr>
    <td class="serial"><?php echo $i ?> </td>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['categories']?></td>
    <td><?php echo $row['name']?></td>
    <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
    <td><?php echo $row['mrp']?></td>
    <td><?php echo $row['price']?></td>
    <td><?php echo $row['quanty']?></td>
    <td><?php 
    if($row['status']==1)
    {
        echo  "<span class ='spanbtn'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;" ;
    }else{
        echo  "<span class ='spabtn'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;" ;
    }
    echo  "<span class = 'sbtn'>&nbsp;<a href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;" ;
    echo  "<span class ='spbtn'><a href='?type=delete&id=".$row['id']."'>Delete</a></span" ;
    ?>
</td>
</tr>
<?php  }?> 
</tbody></table>
    </div>
</body>
</html>
<?php
require('footer.php');
?>
