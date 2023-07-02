<?php
    include '../connect.php';

    $sql_show_prd = "SELECT * FROM pet AS p, users AS u, pet_category AS c 
    WHERE p.user_id = u.user_id AND c.pet_category_id = p.pet_category_id";
    // echo $sql_show_prd; exit;
    $query_show_prd = mysqli_query($con,$sql_show_prd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Petshop | ADMIN</title>
</head>
<body>
<section class="header">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a class="text-danger" href="manage_pet.php">Manage Pet</a></li>
                    <li><a class="text-danger" href="adminProductMange.php">Manage Products</a></li>
                    <li><a class="text-danger" href="manage_customer.php">Manage Users</a></li>
                    <li><a class="text-danger" href="logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>
    </section>
        <h1 class="h1">PET MANAGEMENT</h1>
            <div class="">
                <h3 class="menu"><center> List of pet</center></h3>
            </div>
        <fieldset>
        <div class="container">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="table-success" scope="col">STT</th>
                            <th class="table-success" scope="col">Tên người dùng</th>
                            <th class="table-success" scope="col">Tên thú cưng</th>
                            <th class="table-success" scope="col">Loài</th>
                            <th class="table-success" scope="col">Ngày đặt lịch</th>
                            <th class="table-success" scope="col">Hình ảnh thú cưng</th>
                            <th class="table-success" scope="col">Ngày chăm sóc</th>
                            <th class="table-success" scope="col">Trạng Thái</th>
                            <th class="table-success" scope="col">Dịch vụ</th>
                            <th class="table-success" scope="col">Chi phí</th>
                            <th class="table-success" scope="col">Xử lý</th>
                            
                        </tr>
                    <?php
                        $i = 1;
                            while($row = mysqli_fetch_assoc($query_show_prd)){ ?>
                                    <tr>
                                        <td scope="row"><?php echo $i++; ?></td>
                                        <td><?php echo $row['user_name'] ?></td>
                                        <td><?php echo $row['pet_name'] ?></td>
                                        <td><?php echo $row['pet_category_name']?></td>
                                        <td><?php echo $row['pet_date']?></td>
                                        <td><img src="../asset/img/<?php echo $row['pet_img']?>"> </td>
                                        <td>
                                            <?php 
                                                if ($row['pet_service_date'] == NULL){
                                                    echo "Đang cập nhật";
                                                }
                                                else{
                                                    echo $row['pet_service_date'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($row['pet_status'] == 1){
                                                    echo "Đã xử lý";
                                                }
                                                else{
                                                    echo "Đang xử lý";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($row['pet_service_detail'] == NULL){
                                                    echo "Đang chờ xử lý";
                                                }
                                                else{
                                                    echo $row['pet_service_detail'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($row['pet_service_fee'] == NULL){
                                                    echo "0";
                                                }
                                                else{
                                                    echo $row['pet_service_fee'];
                                                }
                                            ?>
                                        </td>
                                        <td><a href="update_pet.php ?id=<?php echo $row['pet_id'] ?>"><button
                                                type="button" class="btn btn-sm btn-primary btn-create">Xử lý</button></a></td>
                                        <!-- <td><a href="delete_pet.php ?id=<?php echo $row['pet_id'] ?>"><button
                                                type="button" class="btn btn-sm btn-danger btn-create">Delete</button></a></td> -->
                                    </tr>
                                    <?php
                        }
                    ?>
                    </thead>
                </table>
        </div>   
        </fieldset>     
</body> 
</html>