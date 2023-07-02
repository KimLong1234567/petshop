<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logonew.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <title>Detail order</title>
    <style>
        img{
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-body">
                        <h3><button><a href="manage_customer.php">Back to </a></button></h3>
                        <table class="table table-striped table-bordered table-list">
                            <center><?php 
                                require "../connect.php";
                                $id=$_GET['id'];
                                $sql= "SELECT o.order_total, o.order_numberOfItem, p.pet_prod_name, p.pet_prod_image, o.order_date,
                                p.pet_prod_price, p.pet_prod_id, o.Status, u.user_name
                                FROM orders AS o, pet_product AS p, users AS u WHERE o.pet_prod_id = p.pet_prod_id AND o.user_id = '$id' AND u.user_id = '$id'";
                                // echo $sql; exit;
                                $rs = $con->query($sql);
                                $row = $rs->fetch_assoc();
                                echo '<h2>'.$row['user_name'].'</h2>';
                            ?></center>
                            <fliedshet>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Tình trạng</th>
                                </tr>
                            </fliedshet>
                            <tbody>
                            <tr>
                                <?php foreach($rs as $key => $value): 
                                    ?>
                                    <td scope="row"><?php echo $value['pet_prod_name'];?></td>
                                    <td><?php echo $value['pet_prod_price'];?></td>
                                    <td>
                                        <img src="../asset/img/<?php echo $value['pet_prod_image'];?>"/>
                                    </td>
                                    <td>
                                        <p><?php echo $value['order_date'];?></p>
                                    </td>
                                    <td>
                                        <div>
                                            <p><?php echo $value['order_numberOfItem']?></p>
                                        </div>
                                    </td>
                                    <td><?php echo $value['order_total'];?></td>
                                    <td>
                                        <?php if($value['Status'] == 1){
                                            echo "Đã thanh toán";
                                        } else{
                                            echo "Chưa thanh toán";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                endforeach  ?>
                            </tbody>
                        </table>
                        Tổng:
                        <?php
                            function total_price($que){
                                $total = 0;
                                foreach($que as $key => $value){
                                    $total += $value['order_total'];
                                }
                                return $total;
                            };
                            echo total_price($rs);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

