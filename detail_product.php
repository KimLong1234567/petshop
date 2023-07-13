<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </linkrel>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./asset/css/detail_prod.css">
    <link rel="stylesheet" href="./asset/css/index.css">
</head>

<body>
    <?php
        include "./connect.php";
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$sql = "SELECT * FROM pet_product AS p, pet_category AS pc WHERE p.pet_prod_id = '$id' AND p.pet_category_id = pc.pet_category_id";
			// echo $sql; exit;
			$rs = $con->query($sql);
			$r = mysqli_fetch_assoc($rs);
			$pet_id = $r['pet_prod_id'];
			// echo $pet_id; exit;
		}
    ?>
    <div class="header" id="myHeader">
        <?php
		include 'header.php';
	?>
    </div>
    <div class="content">
        <h1 class="mt3 row justify-content-center" style="color: red;">Chi tiết sản phẩm</h1>
        <section id="services" class="services section-bg">
            <div class="container-fluid">
                <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="image-container"
                            style="background-image: url('./asset/img/<?php echo $r['pet_prod_image'];?>');">
                            <!-- <img src="./asset/img/<?php echo $r['pet_prod_image'];?>" alt="bug"> -->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="_product-detail-content">
                            <p class="_p-name"><?php echo $r['pet_prod_name'];?> </p>
                            <div class="_p-price-box">
                                <div class="p-list">
                                    <span
                                        class="price"><?php echo number_format($r['pet_prod_price'], 0,',','.') .' VND' ?></span>
                                </div>
                                <form action="./user/add_cart.php?&id=<?php echo $pet_id?>" method="POST">
                                    <div class="_p-add-cart">
                                        <div class="_p-qty">
                                            <span>Thêm số lượng</span>
                                            <input type="number" name="quantity" min="1" value="1"
                                                max="<?php echo $r['pet_prod_quantity']?>">
                                        </div>
                                    </div>
                                    <div class="_p-features">
                                        <span> Chi tiết sản phẩm: </span>
                                        <p><?php echo $r['pet_prod_detail']?></p>
                                    </div>

                                    <ul class="spe_ul"></ul>
                                    <div class="_p-qty-and-cart">
                                        <div class="_p-add-cart">
                                            <button class="btn-theme btn btn-success" name="add" tabindex="0">
                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div>
            <h2 style="margin-left: 30px;">Có thể bạn quan tâm:</h2>
            <div class="row">
                <?php
			  include "./connect.php";
			  	$cate = $r['pet_category_id'];
					$sql_cate = "SELECT * FROM pet_product AS p, pet_category AS pc WHERE p.pet_category_id = pc.pet_category_id AND p.pet_category_id = '$cate'";
							//   echo $sql; exit;
							  $rse = $con->query($sql_cate);
							  foreach($rse as $row){
								$r = $row['pet_prod_id'];
							  // echo $pet_id; exit;
						
						?>
                <div class="col-2 border border-info" style="margin: 0 30px 30px 30px; ">
                    <div class="">
                        <form id="cartForm-<?php echo $r; ?>" action="./user/add_cart.php?&id=<?php echo $r?>"
                            method="POST">
                            <div class="d-flex justify-content-center" style="padding: 10px;">
                                <a href="detail_product.php ?id=<?php echo $r?>">
                                    <img src="./asset/img/<?php echo $row['pet_prod_image']?>" alt="bug">
                                </a>
                            </div>
                            <a href="detail_product.php ?id=<?php echo $r?>" style="text-decoration: none;">
                                <h4 class="text-danger d-flex justify-content-center">
                                    <?php echo $row['pet_prod_name'] ?></h4>
                            </a>
                            <div class="text-danger">
                                <span class="">
                                    <?php echo number_format($row['pet_prod_price'], 0, ',', '.').' VND'?></span>
                            </div>
                            <div>
                                <input type="number" name="quantity" min="1" value="1"
                                    max="<?php echo $row['pet_prod_quantity']?>">
                            </div>
                            <div class="text-danger d-flex justify-content-end">
                                <span class=""><?php echo $row['pet_prod_origin'] ?></span>
                            </div>
                            <div style="padding-bottom: 20px;">
                                <button type="submit" class="btn btn-info justify-content-end justify-content-end"
                                    name="add">ADD TO CART</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
        			}
				?>
            </div>
            <script>
            window.onscroll = function() {
                myFunction()
            };
            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }
            </script>
</body>
<?php
    include "./footer.php";
?>

</html>