<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></linkrel>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./asset/css/header.css">
</head>

<body>
<div class="container-fluid border">
        <div class="row"> 
            <div class="col-sm ">
                <h1><a href="index.php"><img src="./asset/img/logo.jpg"/></a></h1>
            </div>
            <div class="col-sm ">
                <form method="GET" action="search.php" class="">
                    <input type="text" class="" placeholder="Enter to search for products">
                </form>
            </div>
            <div class="col-lg 5 d-flex align-items-center justify-content-end ">
                <div class="d-flex">  
                    <a class="p-2 bg-primary text-light border border-info rounded-left" href="./index.php">Trang chủ</a>
                    <a class="p-2 bg-primary text-light border border-info" href="./user/sign_up.php">Đăng Ký</a>
                    <a class="p-2 bg-primary text-light border border-info" href="./user/sign_in.php">Đăng nhập</a>
                    <a class="p-2 bg-primary text-light border border-info" href="./admin/login.php">ADMIN</a>
                    <a class="p-2 bg-primary text-light border border-info" href="./view_cart.php">Cart</a>
                    <a class="p-2 bg-primary text-light border border-info" href="">Liên hệ</a>
                    <a class="p-2 bg-primary text-light border border-info rounded-right" href="./user/logout.php">Log out</a>
                </div>
            </div>
        </div>
</div>
</body>

</html>