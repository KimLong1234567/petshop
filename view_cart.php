<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css ">
    <!-- <link rel="stylesheet " href="./asset/css/base.css"> -->
    <!-- <link rel="stylesheet " href="./asset/css/main.css"> -->
    <!-- <link rel="stylesheet " href="./asset/css/cart-page.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link rel="stylesheet" href="./asset/css/footer.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- <script defer src="./asset/font/fontawesome-free-5.15.3-web/js/all.js"></script> -->
</head>

<body>
    <?php
    session_start();
        require 'header.php';
        
        if(!isset($_SESSION['add_cart']) || $_SESSION['add_cart'] == []){
            echo "<script>alert('Your cart is empty');location.href='./index.php'</script>"; 
        }            
        else {
            // Lưu biến $_SESSION['cart'] vào $cart 
            $cart = $_SESSION['add_cart']; 
        }
        $cart = (isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : []; 
        // var_dump($_SESSION['add_cart']);exit;            
    ?>


    <!-- cart_iTem -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Products</th>
                <th> </th>
                <th>Subtotal</th>
            </tr>
            <tr>
            <?php foreach($cart as $key => $value): ?>
                <td>
                    <div class="cart-info">
                        <img src="./asset/img/<?php echo $value['pet_prod_image'] ?>">
                        <div class="cart_color">
                            <p><?php echo $value['pet_prod_name'] ?></p>
                        </div>
                        <div>
                            <p><?php echo $value['pet_prod_quantity']?></p>
                        </div>
                    </div>
                </td>
                <td><a href="./user/delete_item.php?id=<?php echo $value['pet_prod_id']?>">Remove</a></td>
                <td><small><?php echo $value['pet_prod_price']?></small><br></td>
            </tr>
            <?php endforeach ?>

            
        
            
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Total</td>
                    <td> 
                    <?php
                        require_once "./user/total_price.php";
                        //echo total_price($cart);
                    ?>

                    </td>
            </table>
        </div>
        <br>
    <a href="./user/checkout.php"><h3 style="text-align: right; color:red">Check out</h3></a>
    </div>

</body>

</html>