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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/index.css">
</head>

<body>
    <?php
        require "./connect.php";
        $userId = $_COOKIE['userId'];
        if($userId != ""){
            $sql =  "SELECT o.order_total, o.order_numberOfItem, p.pet_prod_name, p.pet_prod_origin, p.pet_prod_image, 
            p.pet_prod_price, p.pet_prod_quantity, p.pet_prod_id, o.Status
            FROM orders AS o, pet_product AS p WHERE o.Status = 1 and o.pet_prod_id = p.pet_prod_id AND o.user_id = '$userId'";
            $que = $con->query($sql);
            $i=1;
            $r = mysqli_fetch_assoc($que);
        }
        else{
            echo "<script>alert('You not login yet');location.href='./user/sign_in.php'</script>";
        }
    ?>
    <div class="header" id="myHeader">
        <?php
           include 'header.php';
        ?>
    </div>
    <h1><center>LỊCH SỬ GIỎ HÀNG</center></h1>
    <!-- cart_iTem -->
    <div class="container border" style="margin-bottom: 30px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình ảnh sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    
                    <th scope="col">Số lượng sản phẩm</th>
                    <th scope="col">Tổng cộng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Xoá sản phẩm</th>
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
                    <td><small><?php echo $format = number_format($value['pet_prod_price'], 0, ',', '.') ?> X <?php echo $value['order_numberOfItem'] ?> </small> <br></td>
                    <td><?php  echo $for = number_format($value['order_total'], 0, ',','.')  ?></td>
                    <td>
                        <?php 
                            if($value['Status'] == 1){
                                echo "Đã thanh toán";
                                }
                            else{
                                echo "Chưa thanh toán";
                            }
                        ?>
                    </td>
                    <td>
                        <form action="./user/delete_item.php?id=<?php echo $id?>" method="POST" class="">
                            <button type="submit" class="btn btn-info" name="delete"><i class="far fa-trash-alt"></i></button>
                            <!-- sửa thành icon -->
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
                    <td>Tổng:</td>
                    <td>
                        <div >
                        <?php
                            function total_price($que){
                                $total = 0;
                                foreach($que as $key => $value){
                                    $total += $value['order_total'];
                                }
                                $formattedNum = number_format($total, 0, ',', '.');
                                return $formattedNum;
                            };
                            echo total_price($que) .' VND';
                        ?>
                        </div>
                    </td>
            </table>
        </div>
        <br>
    </div>
<script>
    window.onscroll = function() {myFunction()};
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
    </script>
</body>

</html>