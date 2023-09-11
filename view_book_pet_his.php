<?php
include './connect.php';

$userId = $_COOKIE['userId'];
$sql_show_prd = "SELECT * FROM pet as p, pet_category as c WHERE p.pet_category_id = c.pet_category_id AND p.user_id = '$userId' AND p.pet_status = '3'";
// echo $sql_show_prd; exit;
$query_show_prd = mysqli_query($con, $sql_show_prd);
if ($userId != '') {
} else {
    echo "<script>alert('You not login yet');location.href='./user/sign_in.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User | Book list</title>
</head>

<body>
    <h3 style="padding: 20px 0 0 30px;"><button><a href="./index.php">VỀ TRANG CHỦ</a></button></h3>
    <h3 style="padding: 20px 0 0 30px;"><button><a href="./">LICH SU</a></button></h3>
    <section class="header">
    </section>
    <h1 class="h1"> QUẢN LÝ LỊCH HẸN</h1>
    <div class="">
        <h3 class="menu">
            <center>DOANH SÁCH LỊCH HẸN</center>
        </h3>
    </div>
    <fieldset>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-success" scope="col">STT</th>
                        <th class="table-success" scope="col">Tên thú cưng</th>
                        <th class="table-success" scope="col">Mô tả</th>
                        <th class="table-success" scope="col">Loài</th>
                        <th class="table-success" scope="col">Hình ảnh</th>
                        <th class="table-success" scope="col">Ngày đặt lịch</th>
                        <th class="table-success" scope="col">Ngày chăm sóc</th>
                        <th class="table-success" scope="col">Tình trạng</th>
                        <th class="table-success" scope="col">Chi tiết chăm sóc</th>
                        <th class="table-success" scope="col">Chi Phí</th>
                        <!-- <th class="table-success" scope="col">Xoá</th> -->
                    </tr>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query_show_prd)) { ?>
                    <tr>
                        <td scope="row"><?php echo $i++; ?></td>
                        <td><?php echo $row['pet_name'] ?></td>
                        <td><?php echo $row['pet_description'] ?></td>
                        <td><?php echo $row['pet_category_name'] ?></td>
                        <td><img src="./asset/img/<?php echo $row['pet_img'] ?>"> </td>
                        <td><?php echo $row['pet_date'] ?></td>
                        <td>
                            <?php
                                if ($row['pet_service_date'] == NULL) {
                                    echo "Đang xử lý";
                                } else {
                                    echo $row['pet_service_date'];
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                if ($row['pet_status'] == 1) {
                                    echo "Đã xong";
                                } else {
                                    echo "Đang xử lý";
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                if ($row['pet_service_detail'] == NULL) {
                                    echo "Đang xử lý";
                                } else {
                                    echo $row['pet_service_detail'];
                                }
                                ?>
                        </td>
                        <td>
                            <?php
                                if ($row['pet_service_fee'] == NULL) {
                                    echo 0;
                                } else {
                                    echo $row['pet_service_fee'];
                                }
                                ?>
                        </td>
                        <!-- <td><a href="./delete_book_pet.php ?id=<?php echo $row['pet_id'] ?>"><button type="button" class="btn btn-sm btn-danger btn-create">Xoa
                                    </button></a></td> -->
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