<?php
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logonew.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="../asset/css/admin.css">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <title>T-shop | ADMIN</title>
</head>

<body>
    <section class="header">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="">Manage Pet</a></li>
                    <li><a href="adminProductMange.php">Mange product</a></li>
                    <li><a href="#">Manage customer</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <div class="container">
        <div class="row">
            <h1 class="text-center">CUSTOMER MANAGEMENT</h1>
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">List of Customer</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <fliedshet>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Customer's</th>
                                    <th>Phone</th>
                                    <th>Adress</th>
                                    <th>Email</th>
                                    <th>Detail</th>
                                    <th>Delete</th>
                                </tr>
                            </fliedshet>
                            <tbody>
                                <?php
                                $user = "SELECT * from users";
                                //$rs = mysqli_query($con, $user_ord);
                                $rs = $con->query($user);
                                    if ($rs -> num_rows > 0) {
                                        while($row = $rs->fetch_assoc()) {
                                            echo '
                                <tr>
                                    <td>'.$row['user_id'].'</td>
                                    <td>'.$row['user_name'].'</td>
                                    <td>'.$row['user_phone'].'</td>
                                    <td>'.$row['user_address'].'</td>
                                    <td>'.$row['user_email'].'</td>
                                    <td><a href="detail_order.php?id='.$row['user_id'].'">view</a></td>
                                    <td><a href="delete_user.php?id='.$row['user_id'].'">Delete</td>                        
                                </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>