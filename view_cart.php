<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop | Cart</title>
    <link rel="stylesheet" href="./asset/css/view_cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></linkrel>

</head>

<body>
    <?php
        require "./connect.php";
        include "./header.php";
        $userId = $_COOKIE['userId'];
        if($userId != ""){
            $sql =  "SELECT o.order_total, o.order_numberOfItem, p.pet_prod_name, p.pet_prod_origin, p.pet_prod_image, 
            p.pet_prod_price, p.pet_prod_quantity, p.pet_prod_id, o.Status
            FROM orders AS o, pet_product AS p WHERE o.Status = 0 and o.pet_prod_id = p.pet_prod_id AND o.user_id = '$userId'";
            $que = $con->query($sql);
            $i=1;
            $r = mysqli_fetch_assoc($que);
            if($r['Status'] !== '0'){
                echo "<script>alert('Your cart is empty');location.href='./index.php'</script>";
            }
        }
        else{
            echo "<script>alert('You not login yet');location.href='./user/sign_in.php'</script>";
        }
    ?>

    <h1><center> CART</center></h1>
    <!-- cart_iTem -->
    <div class="container border">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Products Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    
                    <th scope="col">Subtotal</th>
                    <th scope="col">Total</th>
                    <th></th>
                </tr>
            
                <tr>
                <?php foreach($que as $key => $value): 
                    $id = $value['pet_prod_id'];
                    ?>
                    <td scope="row"><?php echo $i++; ?></td>
                    <td>
                        <img src="./asset/img/<?php echo $value['pet_prod_image'] ?>"/>
                 
                    </td>
                    <td>
                        <div class="">
                            <p><?php echo $value['pet_prod_name'] ?></p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p><?php echo $value['order_numberOfItem']?></p>
                        </div>
                    </td>
                    <td><small><?php echo $value['pet_prod_price']?> X <?php echo $value['order_numberOfItem'] ?> </small> <br></td>
                    <td><?php  echo $value['order_total']; ?></td>
                    <td>
                        <form action="./user/delete_item.php?id=<?php echo $id?>" method="POST" class="">
                            <button type="submit" class="btn btn-info" name="delete">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php
                     
                endforeach  ?>
            </thead>
            
        </table>
       
        <div class="container">
            <table class="d-flex justify-content-end" >
                <tr>
                    <td>Total:</td>
                    <td>
                        <div >
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
                        </div>
                    </td>
            </table>
        </div>
        <br>
        <a href="./user/checkout.php"><h3 style="text-align: right; color:red">PAYMENTS</h3></a>
    </div>

</body>

</html>