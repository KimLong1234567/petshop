<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.php';
    include 'connect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></linkrel>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./asset/css/index.css">
</head>
<body>
<div class="container-fluid border">
        <div
            id="carousel-example-generic"
            class="carousel slide"
            data-interval="5000"
            data-ride="carousel"
        >
             <!-- Indicators -->
            <ul class="carousel-indicators">
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="0"
                    class="active"
                ></li>
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="1"
                    class="active"
                ></li>
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="2"
                    class="active"
                ></li>
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="3"
                    class="active"
                ></li>
            </ul>
             <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid"
                        alt="First slide"
                        src="./asset/img/715682.png"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="img-fluid"
                        alt="Second slide"
                        src="./asset/img/644423.jpg"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="img-fluid"
                        alt="Third slide"
                        src="./asset/img/721601.png"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="img-fluid"
                        alt="Four slide"
                        src="./asset/img/901699.jpg"
                    />
                </div>
            </div>
            <!-- Controls -->
            <a
                class="carousel-control-prev"
                href="#carousel-example-generic"
                data-slide="prev"
                role="button"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
            </a>
            <a
                class="carousel-control-next"
                href="#carousel-example-generic"
                data-slide="next"
                role="button"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
            </a>
        </div>
    <hr/>
    <h2 class="mt3 row justify-content-center">ALL PRODUCT</h2> 
    <span><a href="./book_pet_date.php">Đăng ký lịch hẹn</a></span> 
    <span><a href="./view_book_pet.php">Quản lý lịch hẹn</a></span> 
    <div class="container-xs">
        <div class="row justify-content-center">
            <div class="col-2 text-primary" align="center">
                All Category
                </br>
                <div>
                    <form action="./index.php" method="GET">
                        <input type="hidden" name="search" value="dog"/>
                        <button type="submit"><a>DOG</a</button>
                    </form>
                </div>
                <div>
                    <form action="./index.php" method="GET">
                        <input type="hidden" name="search" value="cat"/>
                        <button type="submit"><a>CAT</a</button>
                    </form>
                </div>
                <div>
                    <form action="./index.php" method="GET">
                        <input type="hidden" name="search" value="other"/>
                        <button type="submit"><a>Other</a</button>
                    </form>
                </div>
            </div>
            <div class="col-10 ">
                <div class="row">
                    <?php
                        require "product.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
    include 'footer.php'
?>
</html>