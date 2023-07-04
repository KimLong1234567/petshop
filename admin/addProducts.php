<?php
include("../connect.php");

$sqlSelect = "SELECT * FROM pet_category";
$rs = $con->query($sqlSelect);

if (isset($_POST["submit"])) {
    $pet_prod_id = $_POST["pet_prod_id"];
    $pet_prod_name = $_POST["pet_prod_name"];
    $pet_prod_detail = $_POST["pet_prod_detail"];
    $pet_prod_price = $_POST["pet_prod_price"];
    $pet_prod_origin = $_POST["pet_prod_origin"];
    $pet_category_id = $_POST["pet_category_id"];
    $pet_prod_img = $_FILES["pet_prod_img"]['name'];
    $duoi = explode('.', $pet_prod_img); // tách chuỗi khi gặp dấu .
    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
    $path_image = $pet_prod_img;
    $pet_prod_img_tmp = $_FILES["pet_prod_img"]['tmp_name'];
    $pet_prod_quatity = $_POST["pet_prod_quatity"];

    if (isset($_POST['pet_prod_id']) && isset($_POST['pet_prod_name']) && isset($_POST['pet_prod_detail']) && isset($_POST['pet_prod_quatity']) && isset($_POST['pet_prod_origin']) && isset($_POST['pet_prod_price']) && isset($_FILES['pet_prod_img'])) {
        $query = "SELECT pet_prod_id FROM pet_product WHERE pet_prod_id = '$pet_prod_id'";
        $result = mysqli_query($con, $query); //sử dụng hàm mysqli_query() để thực thi truy vấn SQL trên kết nối cơ sở dữ liệu $con. Kết quả trả về từ truy vấn này được gán cho biến $result.

        $numb = mysqli_num_rows($result); // sử dụng hàm mysqli_num_rows() để đếm số hàng trả về từ kết quả truy vấn $result. Số hàng này là số sản phẩm đã thêm

        // num = 1 tìm thấy một sản phẩm hoặc một id đã tồn tại trong cơ sở dữ liệu
        if ($numb == 1) {
            $message = "This product already exist, Please check it again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $sql = "INSERT INTO pet_product (pet_prod_id, pet_prod_name, pet_prod_detail, pet_prod_price, pet_prod_origin, pet_prod_image, pet_prod_quantity, pet_category_id, ngay_sua_doi)  
            VALUES ('$pet_prod_id', '$pet_prod_name', '$pet_prod_detail', '$pet_prod_price', '$pet_prod_origin', '$pet_prod_img', '$pet_prod_quatity','$pet_category_id',CURRENT_TIMESTAMP())";
            mysqli_query($con, $sql);
            move_uploaded_file($pet_prod_img_tmp, '../asset/img/' . $path_image);
            header('location:adminProductMange.php');
        }
    } else {
        $mq = "Vui lòng nhập đầy đủ thông tin";
        echo "<script type='text/javascript'>alert('$mq');</script>";
    }
}
?>
<html>
    <head>
        <link rel="stylesheet " href="../asset/css/user_login.css">
    </head>
<body>
    

<div class="main">
    <form method="POST" action="addProducts.php" enctype="multipart/form-data" class="form" id="form-1" style="margin: 30px auto 30px auto;">
        <h3 class="heading">Thêm sản phẩm</h3>
        <div class="spacer"></div>
    

        <div class="form-group">
            <label for="product_id" class="form-label">Mã sản phẩm</label>
            <input id="prodcut_id" type="text" placeholder="Nhập mã sản phẩm" name="pet_prod_id" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input id="product_name" type="text" placeholder="Nhập tên sản phẩm" name="pet_prod_name" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="product_detail" class="form-label">Chi tiết sản phẩm</label>
            <textarea id="product_detail" type="text" placeholder="Nhập chi tiết sản phẩm" name="pet_prod_detail" style="height: 50px" class="form-control"></textarea>
            <span class="form-message"></span>
        </div> 
          
        <div class="form-group">
            <label for="number_item" class="form-label">Số lượng sản phẩm nhập kho</label>
            <input id="number_item" type="number" placeholder="Nhập số lượng" name="pet_prod_quatity" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="origin" class="form-label">Xuất xứ</label>
            <input id="origin" type="text" placeholder="Nhập xuất xứ" name="pet_prod_origin" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="origin" class="form-label" >Loại sản phẩm</label>
            <select name="pet_category_id" id="type" class="form-control">
                <?php
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                <option value="<?php echo $row['pet_category_id']; ?>">
                                <?php echo $row['pet_category_name']; ?>
                </option>
                <?php 
                    }
                ?>
            </select>
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
            <input id="image" type="file" name="pet_prod_img" class="form-control" accept="image/*">
            <span class="form-message"></span>
        </div>

        
        <div class="form-group">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input id="price" type="number" placeholder="Nhập giá sản phẩm" name="pet_prod_price" class="form-control">
            <span class="form-message"></span>
        </div>
        <button class="form-submit" name="submit">Thêm sản phẩm</button>

        
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