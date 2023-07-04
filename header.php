<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></linkrel>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./asset/css/header.css">
</head>

<body>
<div class="container-fluid">
        <div class="row"> 
            <div class="col-sm-3 ">
                <h1><a href="index.php"><img src="./asset/img/logo.jpg"/></a></h1>
            </div>
            <div class="col-sm-4 d-flex align-items-center justify-content-center">
                <div class="contai">
                    <form method="GET" action="./index.php" id="fomea">
                        <input type="text" placeholder="Tìm kiếm" id='search' name="search">
                        <button type="submit" id="submit"><i class="fa fa-search" aria-hidden="true"></i></button> 
                    </form>
                </div> 
            </div>
            <div class="col-lg-5 d-flex align-items-center justify-content-end">
                <div class="d-flex">  
                    <a class="p-2 bg-primary text-light border border-info rounded-left rounded-right " href="./index.php" style="margin-right: 10px;">Trang chủ</a>
                    <a class="p-2 bg-primary text-light border border-info rounded-left rounded-right" href="./user/sign_up.php" style="margin-right: 10px;">Đăng ký</a>
                    <a class="p-2 bg-primary text-light border border-info rounded-left rounded-right" href="./user/sign_in.php" style="margin-right: 10px;">Đăng nhập</a>
                    <!-- <a class="p-2 bg-primary text-light border border-info" href="./admin/login.php">ADMIN</a> -->
                    <a class="p-2 bg-primary text-light border border-info rounded-left rounded-right" href="./view_cart.php" style="margin-right: 10px;">Giỏ hàng</a>
                    <a class="p-2 bg-primary text-light border border-info rounded-left rounded-right" href="" style="margin-right: 10px;">Liên Hệ</a>
                    <a class="p-2 bg-primary text-light border border-info rounded-left rounded-right" href="./user/logout.php" style="margin-right: 10px;">Đăng xuất</a>
                </div>
            </div>
        </div>
</div>
</body>

</html>