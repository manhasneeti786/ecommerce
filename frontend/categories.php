<?php require('top.php');
require('config.php');
$cat_id = mysqli_real_escape_string($conn, $_GET['id']);
$get_cat = get_cat($conn,'', $cat_id,'');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="css_folder_for_frent/categories.css?v=<?=$version?>">
</head>
<body>
    <div class="main_products">
        <div class="inner_product">
            <img src="image/fashion-choice.jpeg" alt="">
        </div>
        <div class="inner-content">
            <!-- # men wear -->
        </div>
    </div>

    <?php
    if ($get_cat !== null) {
    ?>
    <section id="men-section">
        <?php
        foreach($get_cat as $list){
        ?>
        <div class="pro-container">
            <div class="prot">
                <a href="product.php?id=<?php echo $list['id']?>">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="त्रौज़र्स">
                </a>
        </div>
            <div class="inner-under">
                <span> <a href="#"><?php echo $list['name']?></a></span>
                <div class="mai">
                    <span><b>MRP:<?php echo $list['mrp']?></b></span>        
                   &nbsp;&nbsp;<span><b>PRICE:<?php echo $list['price']?></b></span>        
        </div>
            </div>
        </div><?php }?>
    </section>
    <?php
    } else {
        echo "data not found";
    }
    ?>
</body>
</html>
<?php
require('footer.php');
?>
