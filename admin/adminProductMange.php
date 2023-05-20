<?php
    include '../connect.php';
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
                    <li><a href="adminProductMange.php">Manage product</a></li>
                    <li><a href="">Manage customer</a></li>
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
                <a href=""><button type="button" class="">Add new product</button></a>
            </div>
        <fieldset>
        <div class="container">
            <table class="table table-success table-striped">
		        <thead>
			    <tr>
				    <th>Name</th>
				    <th>Code</th>
				    <th>Detail</th>
				    <th>Price</th>
				    <th>Origin</th>
                    <th>Image</th>
                    <th>Quantity</th>
			    </tr>
		        </thead>
	        </table>
        </div>   
        </fieldset>     
</body> 
</html>