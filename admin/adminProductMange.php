<?php
    include '../connect.php';

    $sql_show_prd = "SELECT * FROM pet_product";
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
                    <li><a href="">Manage Pet</a></li>
                    <li><a href="adminProductMange.php">Manage Products</a></li>
                    <li><a href="">Manage Users</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>
    </section>
        <h1 class="h1">PRODUCT MANAGEMENT</h1>
            <div class="">
                <h3 class="menu">List of product</h3>
            </div>
            <div class="col col-xs-5 text-right">
                <a href="addProducts.php"><button type="button" class="add">Add new product</button></a>
            </div>
        <fieldset>
        <div class="container">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="table-success" scope="col">STT</th>
                            <th class="table-success" scope="col">Name</th>
                            <th class="table-success" scope="col">Code</th>
                            <th class="table-success" scope="col">Detail</th>
                            <th class="table-success" scope="col">Price</th>
                            <th class="table-success" scope="col">Origin</th>
                            <th class="table-success" scope="col">Image</th>
                            <th class="table-success" scope="col">Quantity</th>
                            <th class="table-success" scope="col">Delete</th>
                        </tr>
                    <?php
                        $i = 1;
                            while($row = mysqli_fetch_assoc($query_show_prd)){ ?>
                                    <tr>
                                        <td scope="row"><?php echo $i++; ?></td>
                                        <td><?php echo $row['pet_prod_name'] ?></td>
                                        <td><?php echo $row['pet_prod_id'] ?></td>
                                        <td><?php echo $row['pet_prod_detail']?></td>
                                        <td><?php echo $row['pet_prod_price']?></td>
                                        <td><?php echo $row['pet_prod_origin'] ?></td>
                                        <td><img src="../asset/img/<?php echo $row['pet_prod_image']?>"> </td>
                                        <td><?php echo $row['pet_prod_quantity'] ?></td>
                                        <td><a href="delete_product.php ?id=<?php echo $row['pet_prod_id'] ?>"><button
                                                type="button" class="btn btn-sm btn-primary btn-create">Delete
                                                product</button></a></td>
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