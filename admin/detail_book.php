<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logonew.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <title>Detail Pet</title>
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
                                $sql= "SELECT * FROM pet AS p, users AS u, pet_category AS c 
                                WHERE u.user_id = '$id' AND p.user_id = '$id' AND c.pet_category_id = p.pet_category_id";
                                // echo $sql; exit;
                                $rs = $con->query($sql);
                                $row = $rs->fetch_assoc();
                                echo '<h2>'.$row['user_name'].'</h2>';
                            ?></center>
                            <fliedshet>
                                <tr>
                                    <th class="table-success" scope="col">STT</th>
                                    <th class="table-success" scope="col">Name Pet</th>
                                    <th class="table-success" scope="col">Description</th>
                                    <th class="table-success" scope="col">Type</th>
                                    <th class="table-success" scope="col">Image</th>
                                    <th class="table-success" scope="col">Date Book</th>
                                    <th class="table-success" scope="col">Status</th>
                                    <th class="table-success" scope="col">Fee</th>
                                </tr>
                            </fliedshet>
                            <tbody>
                            <tr>
                                <?php $i = 1; foreach($rs as $key => $value): 
                                // var_dump($rs);
                                    ?>
                                    <td scope="row"><?php echo $i++; ?></td>
                                    <td><?php echo $value['pet_name'];?></td>
                                    <td><?php echo $value['pet_description'];?></td>
                                    <td><?php echo $value['pet_category_name'];?></td>
                                    <td>
                                        <img src="../asset/img/<?php echo $value['pet_img'];?>"/>
                                    </td>
                                    <td>
                                        <p><?php echo $value['pet_date'];?></p>
                                    </td>
                                    <td>
                                        <?php 
                                            if($row['pet_status'] == 1){
                                                echo "Đã khám";
                                            }
                                            else{
                                                echo "Chưa khám";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                            <?php 
                                                if($row['pet_service_fee'] == NULL){
                                                    echo "Đang chờ xử lý";
                                                }
                                                else{
                                                    echo $row['pet_service_fee'];
                                                }
                                            ?>
                                        </td>
                            </tr>
                                <?php
                                endforeach  ?>
                            </tbody>
                        </table>
                        Total:
                        <?php
                            function total_price($que){
                                $total = 0;
                                foreach($que as $key => $value){
                                    $total += $value['pet_service_fee'];
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

