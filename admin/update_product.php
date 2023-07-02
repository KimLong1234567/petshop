<?php
    //ket noi csdl
    include '../connect.php';

    //lay ma san pham 
    $code = $_GET['id'];
    //lay thong tin lien quan den san pham
    $sql_show_prd = "SELECT * FROM pet_product WHERE pet_prod_id = '$code' ";
    
    // thuc thi cau lenh sql
    $result = mysqli_query($con,$sql_show_prd);
    //in ra form
    $r = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])){
        $pet_prod_id = $_POST["pet_prod_id"];
        $pet_prod_name = $_POST["pet_prod_name"];
        $pet_prod_detail = $_POST["pet_prod_detail"];
        $pet_prod_price = $_POST["pet_prod_price"];
        $pet_prod_origin = $_POST["pet_prod_origin"];
        $pet_prod_img = $_FILES["pet_prod_img"]['name'];
        $duoi = explode('.', $pet_prod_img); // tách chuỗi khi gặp dấu .
        $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
        $path_image = $pet_prod_img;
        $pet_prod_img_tmp = $_FILES["pet_prod_img"]['tmp_name'];
        $pet_prod_quantity = $_POST["pet_prod_quantity"];
        
        if(!empty($pet_prod_img)){
            // echo 'đã vào' .$pet_prod_img; exit;
            //viet cau lenh edit
            $sql_edit = "UPDATE pet_product SET 
            pet_prod_name = '$pet_prod_name', 
            pet_prod_detail = '$pet_prod_detail', 
            pet_prod_quantity = '$pet_prod_quantity', 
            pet_prod_origin = '$pet_prod_origin', 
            pet_prod_image = '$pet_prod_img', 
            pet_prod_price = '$pet_prod_price'
            WHERE pet_prod_id = '$pet_prod_id' ";
            // echo $sql_edit; exit;
        }
        else{
            // echo "chưa có img";exit;
            $sql_edit = "UPDATE pet_product SET 
            pet_prod_name = '$pet_prod_name', 
            pet_prod_detail = '$pet_prod_detail', 
            pet_prod_quantity = '$pet_prod_quantity', 
            pet_prod_origin = '$pet_prod_origin',  
            pet_prod_price = '$pet_prod_price'
            WHERE pet_prod_id = '$pet_prod_id' ";
            // echo $sql_edit; exit;
        }
        //thuc thi cau lenh
        mysqli_query($con, $sql_edit);
        move_uploaded_file($pet_prod_img_tmp, '../asset/img/' . $path_image);
        header('location:adminProductMange.php');
    }
?>

<html>
    <head>
        <link rel="stylesheet " href="../asset/css/user_login.css">
    </head>
<body>
   
<div class="main">
    <form method="POST" action="update_product.php" enctype="multipart/form-data" class="form" id="form-1" style="margin: 30px auto 30px auto;">
        <h3 class="heading">Sửa sản phẩm</h3>
        <div class="spacer"></div>

        <div class="form-group">
            <label for="product_id" class="form-label">Mã sản phẩm</label>
            <input id="product_id" type="text" placeholder="Nhập mã sản phẩm" name="pet_prod_id" class="form-control" value="<?php echo $r['pet_prod_id']; ?>" readonly="true">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input id="product_name" type="text" placeholder="Nhập tên sản phẩm" name="pet_prod_name" class="form-control" value="<?php echo $r['pet_prod_name']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="product_detail" class="form-label">Chi tiết sản phẩm</label>
            <textarea id="product_detail" type="text" placeholder="Nhập chi tiết sản phẩm" name="pet_prod_detail" class="form-control"><?php echo $r['pet_prod_detail']; ?></textarea>
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="number" class="form-label">Số lượng sản phẩm</label>
            <input id="number" type="number" placeholder="Nhập số lượng sản phẩm" name="pet_prod_quantity" class="form-control" value="<?php echo $r['pet_prod_quantity']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="origin" class="form-label">Xuất xứ</label>
            <input id="origin" type="text" placeholder="Nhập xuất xứ" name="pet_prod_origin" class="form-control" value="<?php echo $r['pet_prod_origin']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Hình ảnh</label>
            <input id="image" type="file" placeholder="" name="pet_prod_img" accept="image/*" class="form-control" value="<?php echo $r['pet_prod_image']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input id="price" type="number" placeholder="Nhập giá sản phẩm" name="pet_prod_price" class="form-control" value="<?php echo $r['pet_prod_price']; ?>">
            <span class="form-message"></span>
        </div>

        <button class="form-submit" name="submit">Sửa sản phẩm</button>
    </form>
</div>

<script src="../js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#prodcut_id', 'Vui lòng nhập mã sản phẩm'),
                Validator.isRequired('#product_name', 'Vui lòng nhập tên sản phẩm'),
                Validator.isRequired('#product_detail', 'Vui lòng nhập chi tiết sản phẩm'),
                Validator.isRequired('#origin', 'Vui lòng nhập xuất xứ'),
                Validator.isRequired('#number_item', 'Vui lòng nhập số lượng'),
                // Validator.isRequired('#image', 'Vui lòng nhập hình ảnh'),
                Validator.isRequired('#price', 'Vui lòng nhập giá tiền'),
            ]
        });
    </script>
</body>
</html>