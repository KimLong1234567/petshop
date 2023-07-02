<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/checkout.css">
    <title>Checkout</title>
</head>

<body>
    <?php

        require "../connect.php";
        $userId = $_COOKIE['userId'];
        $sql = "SELECT * FROM users WHERE user_id = '$userId'";
        $sql_cart =  "SELECT o.order_total, o.order_numberOfItem, p.pet_prod_name, p.pet_prod_origin, p.pet_prod_image, 
        p.pet_prod_price, p.pet_prod_quantity, p.pet_prod_id
        FROM orders AS o, pet_product AS p WHERE o.pet_prod_id = p.pet_prod_id AND o.user_id = '$userId'";
        $que = $con->query($sql_cart);

        $res = $con->query($sql);
        $r = mysqli_fetch_assoc($res);
        // var_dump($res);
       
    ?>
    <div class="container">
        <div class="content">
            <h1>Check out</h1>
                <form action="finishpaid.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Personal information :</legend>
                        <label>Your full name* : </label>
                        <input type="text" name="f-name" value="<?php echo $r['user_name']; ?>">

                        <label>Your address *: </label>
                        <input type="text" name="l-address" value="<?php echo $r['user_address']; ?>">

                        <label>Your phone* : </label>
                        <input type="text" name="phone" value="<?php echo $r['user_phone'];?>">

                        <label>Your email* : </label>
                        <input type="text" name="email" value="<?php echo $r['user_email'];?>">
                        <br>
                        Total Price:
                        <?php
                            function total_price($que){
                                $total = 0;
                                foreach($que as $key => $value){
                                    $total += $value['order_total'];
                                }
                                return $total;
                            };
                            echo total_price($que);
                        ?>
                        
                        <br>
                        <input type="submit" name="submit" value="Submit your information form">
                        
                    </fieldset>
                </form>
        </div>
    </div>

</body>

</html>