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
    <div class="container">
        <form action="finishpaid.php" method="POST">
            <div class="content">
                <h1>Check out</h1>
                <form action="" method="post">
                    <fieldset>
                        <legend>Personal information :</legend>


                        <label>Your full name* : </label>
                        <input type="text" name="f-name" required>

                        <label>Your address *: </label>
                        <input type="text" name="l-name" required>

                        <label>Your phone* : </label>
                        <input type="text" name="phone" required>
                        <br>
                        Total Price:
                        <?php session_start(); $ord = (isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : []; ?>
                        <?php   
                require_once "total_price.php";
                $tong = total_price($ord)    ;
                echo $tong?>
                        <br>
                        <input type="submit" name="submit" value="Submit your information form">
                        <a href="checkout.php">
                            <input type="reset" value="reset">

                        </a>
                    </fieldset>



</body>

</html>