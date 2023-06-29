<?php
    include './connect.php';
    
    $userId = $_COOKIE['userId'];
    $sql_show_prd = "SELECT * FROM pet as p, pet_category as c WHERE p.pet_category_id = c.pet_category_id AND p.user_id = '$userId'";
    // echo $sql_show_prd; exit;
    $query_show_prd = mysqli_query($con,$sql_show_prd);
    if($userId != ''){

    }
    else{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User | Book list</title>
</head>
<body>
<h3><button><a href="./index.php">Back to main page </a></button></h3>
<section class="header">
    </section>
        <h1 class="h1">BOOK PET MANAGEMENT</h1>
            <div class="">
                <h3 class="menu">List of Book</h3>
            </div>
        <fieldset>
        <div class="container">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="table-success" scope="col">STT</th>
                            <th class="table-success" scope="col">Name Pet</th>
                            <th class="table-success" scope="col">Description</th>
                            <th class="table-success" scope="col">Loài</th>
                            <th class="table-success" scope="col">Image</th>
                            <th class="table-success" scope="col">Ngày đặt lịch</th>
                            <th class="table-success" scope="col">Trạng thái</th>
                            <th class="table-success" scope="col">Chi tiết phục vụ</th>
                            <th class="table-success" scope="col">Chi Phí</th>
                        </tr>
                    <?php
                        $i = 1;
                            while($row = mysqli_fetch_assoc($query_show_prd)){ ?>
                                    <tr>
                                        <td scope="row"><?php echo $i++; ?></td>
                                        <td><?php echo $row['pet_name'] ?></td>
                                        <td><?php echo $row['pet_description'] ?></td>
                                        <td><?php echo $row['pet_category_name']?></td>
                                        <td><img src="./asset/img/<?php echo $row['pet_img']?>"> </td>
                                        <td><?php echo $row['pet_date']?></td>
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
                                                    echo "Đang chờ xử lý";
                                                }
                                                else{
                                                    echo $row['pet_service_fee'];
                                                }
                                            ?>
                                        </td>
                                        <!-- <td><a href="./delete_book_pet.php ?id=<?php echo $row['pet_id'] ?>"><button
                                                type="button" class="btn btn-sm btn-danger btn-create">Delete
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