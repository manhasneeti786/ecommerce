<?php
function get_product($conn, $product_id='', $limit=''){
    $sql="select * from product where status=1";

    if ($product_id != ''){
        $sql .= " AND id = $product_id ";
    }
    $limit = 4;
    if($limit != '')
    {
        $sql." LIMIT $limit";
    }
    $res=mysqli_query($conn,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}


function get_cat($conn, $limit='', $cat_id = '', $product_id = ''){
    $sql = "SELECT * FROM product WHERE status = 1";

    if ($cat_id != ''){
        $sql .= " AND categories_id = $cat_id ";
    }

    if ($product_id != ''){
        $sql .= " AND id = $product_id ";
    }
    $sql.= "order by id desc";
    if($limit != ''){
        $sql.= "limit $limit"; 
    }

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    } else {
        echo "query failed" . mysqli_error($conn);
        return null;
}
}

?>
