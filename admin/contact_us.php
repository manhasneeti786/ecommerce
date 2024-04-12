<?php
include 'config.php';
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=mysqli_real_escape_string($conn,$_GET['type']);
    if($type=='delete'){
        $id=mysqli_real_escape_string($conn,$_GET['id']);
        $delete_sql="delete from contact_us  where id='$id' ";
        mysqli_query($conn,$delete_sql);
    }
}
$sql = "SELECT * FROM contact_us ORDER By id desc" ;
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
        <h4 class="box-title">Contact Us</h4>
    </div>
    <div class="tab">
        <table class="tables">
            <thead>
                <tr>
                    <th class=" serial">#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Query</th>
                    <th>Date</th>
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
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['mobile']?></td>
    <td><?php echo $row['comment']?></td>
    <td><?php echo $row['added_on']?></td>
    <td>
        <?php 
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
