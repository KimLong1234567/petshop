<?php
include("../connect.php");

if (isset($_POST["submit"])) {
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
            $sql = "insert into pet_product (pet_prod_id, pet_prod_name, pet_prod_detail, pet_prod_price, pet_prod_origin, pet_prod_image, pet_prod_quantity)  
            values ('$pet_prod_id', '$pet_prod_name', '$pet_prod_detail', '$pet_prod_price', '$pet_prod_origin', '$pet_prod_img', '$pet_prod_quatity' )";
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
<p>Add product</p>
<table>
    <form method="POST" action="addProducts.php" enctype="multipart/form-data">
        <tr>
            <td>Product id</td>
            <td><input type="text" name="pet_prod_id"></td>
        </tr>

        <tr>
            <td>Product name</td>
            <td><input type="text" name="pet_prod_name"></td>
        </tr>
        <tr>
            <td>Product detail</td>
            <td><input type="text" name="pet_prod_detail"></td>
        </tr>
        <tr>
            <td>Product Quantity</td>
            <td><input type="text" name="pet_prod_quatity"></td>
        </tr>
        <tr>
            <td>Origin</td>
            <td><input type="text" name="pet_prod_origin"></td>

        </tr>
        <tr>
            <td>Picture</td>
            <td>
                <input type="file" id="pet_prod_img" name="pet_prod_img" accept="image/*">
            </td>

        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="pet_prod_price"></td>

        </tr>
        <tr>

            <td><input type="submit" name="submit" value="Add product"></td>
        </tr>
    </form>
</table>