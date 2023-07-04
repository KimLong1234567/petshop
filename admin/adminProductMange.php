<?php
    include '../connect.php';

    $sql_show_prd = "SELECT * FROM pet_product ORDER BY stt DESC";
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
                    <li><a class="text-danger" href="manage_pet.php">Quản lý thú cưng</a></li>
                    <li><a class="text-danger" href="adminProductMange.php">Quản lý sản phẩm</a></li>
                    <li><a class="text-danger" href="manage_customer.php">Quản lý người dùng</a></li>
                    <li><a class="text-danger" href="logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </nav>
    </section>
        <h1 class="h1">QUẢN LÝ SẢN PHẨM</h1>
            <div style="padding-left: 20px;">
                <h3 class="menu"><center>DANH SÁCH SẢN PHẨM</center></h3>
            </div>
            <div style="padding-left: 110px; margin-bottom: 30px;">
                <a href="addProducts.php"><button type="button" class="btn btn-outline-info">Thêm sản phẩm mới</button></a>
            </div>
        <fieldset>
        <div class="container">
            <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;" >
                            <th class="table-success" scope="col"  >STT</th>
                            <th class="table-success" scope="col">Mã sản phẩm</th>
                            <th class="table-success" scope="col">Tên sản phẩm</th>
                            <th class="table-success" scope="col">Chi tiết sản phẩn</th>
                            <th class="table-success" scope="col">Giá sản phẩm</th>
                            <th class="table-success" scope="col">Xuất Xứ</th>
                            <th class="table-success" scope="col">Hình ảnh</th>
                            <th class="table-success" scope="col">Số lượng</th>
                            <th class="table-success" scope="col">Sửa</th>
                            <th class="table-success" scope="col">Xoá</th>
                        </tr>
                    <?php
                        $i = 1;
                            while($row = mysqli_fetch_assoc($query_show_prd)){ ?>
                                    <tr style="text-align: center;">
                                        <td scope="row"><?php echo $i++; ?></td>
                                        <td><?php echo $row['pet_prod_id'] ?></td>
                                        <td><?php echo $row['pet_prod_name'] ?></td>
                                        <td><?php echo $row['pet_prod_detail']?></td>
                                        <td><?php echo number_format($row['pet_prod_price'], 0, ',', '.')?></td>
                                        <td><?php echo $row['pet_prod_origin'] ?></td>
                                        <td><img src="../asset/img/<?php echo $row['pet_prod_image']?>"> </td>
                                        <td><?php echo $row['pet_prod_quantity'] ?></td>
                                        <td><a href="update_product.php ?id=<?php echo $row['pet_prod_id'] ?>"><button
                                                type="button" class="btn btn-sm btn-primary btn-create">Sửa
                                                sản phẩm</button></a></td>
                                        <td><a href="delete_product.php ?id=<?php echo $row['pet_prod_id'] ?>"><button
                                                type="button" class="btn btn-sm btn-danger btn-create">Xoá
                                                sản phẩm</button></a></td>
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