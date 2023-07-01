<?php 
    include "./connect.php";
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($actual_link ==  'http://localhost/petshop/index.php' || $actual_link == 'http://localhost/petshop/'){
        $value = '';
    }
    else{
        $value = $_GET['search'];
        if($value == 'other'){
            $value = 'other';
        }else{
            $value = $_GET['search'];
        }
    }

    // if($actual_link !=  'http://localhost/petshop/index.php' || $actual_link != 'http://localhost/petshop/'){
    //     // var_dump($actual_link);
    //     $value = $_GET['search'];
    //     if($value == 'other'){
    //         $value = 'other';
    //     }else{
    //         $value = $_GET['search'];
    //     }
    // }else{
    //     $value = '';
    // }

    switch($value){
        case 'other':
            $sql = "SELECT * FROM pet_product WHERE pet_prod_name NOT LIKE '%dog%' AND pet_prod_name NOT LIKE '%cat%'";
            break;
        default:
            $sql = "SELECT * FROM pet_product where pet_prod_name like '%$value%'";
            break;
    }
        // $sql = "SELECT * FROM pet_product where pet_prod_name like '%$value%'";
    

    $rs = $con->query($sql);
        foreach($rs as $row){ 
            $r = $row['pet_prod_id'];
            ?>
<html>

<div class="col-3 border border-info" style="margin: 0 30px 30px 0;">
    <div class="">
        <form action="./user/add_cart.php?&id=<?php echo $r?>" method="POST">
            <div class="d-flex justify-content-center" style="padding: 10px;">
                <img src="./asset/img/<?php echo $row['pet_prod_image']?>" alt="bug">
            </div> 
            <h4 class="text-danger d-flex justify-content-center"> <?php echo $row['pet_prod_name'] ?><a href="detail_product.php"></a></h4>
            <div class="text-danger">
                <span class=""> <?php echo ''.$row['pet_prod_price'].' VND'?></span>
            </div>
            <div>
                <input type="number" name="quantity" min="1" value="1" max="<?php echo $row['pet_prod_quantity']?>">
            </div>
            <div class="text-danger d-flex justify-content-end">
                <span class=""><?php echo $row['pet_prod_origin'] ?></span>
            </div>
            <div style="padding-bottom: 20px;">
                <button type="submit" class="btn btn-info" name="add" >ADD TO CART</button>
            </div>
        </form>
    </div>
</div>
</html>
<?php
        }
?>