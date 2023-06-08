<?php 
    include "connect.php";

    $sql = "SELECT * FROM pet_product";
    $rs = $con->query($sql);
        foreach($rs as $row){ 
            $r = $row['pet_prod_id'];
            ?>
<html>
<div class="col-3 border border-info">
    <div class="">
        <form action="./user/add_cart.php?&id=<?php echo $r?>" method="POST" class="">
            <div class="d-flex justify-content-center">
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
            <button type="submit" class="btn btn-info" name="add">ADD TO CART</button>
        </form>
    </div>
</div>
</html>
<?php
        }
?>