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

        //thuc thi cau lenh
        mysqli_query($con, $sql_edit);
        move_uploaded_file($pet_prod_img_tmp, '../asset/img/' . $path_image);
        header('location:adminProductMange.php');
    }
?>

<html>
    <p>UPDATE sản phẩm</p>
    <table>
    <form method="POST" action="update_product.php" enctype="multipart/form-data">
        <tr>
            <td>Product id</td>
            <td><input type="text" name="pet_prod_id" value="<?php echo $r['pet_prod_id']; ?>" readonly="true"></td>
        </tr>

        <tr>
            <td>Product name</td>
            <td><input type="text" name="pet_prod_name" value="<?php echo $r['pet_prod_name']; ?>"></td>
        </tr>
        <tr>
            <td>Product detail</td>
            <td><input type="text" name="pet_prod_detail" value="<?php echo $r['pet_prod_detail']; ?>"></td>
        </tr>
        <tr>
            <td>Product Quantity</td>
            <td><input type="text" name="pet_prod_quantity" value="<?php echo $r['pet_prod_quantity']; ?>"></td>
        </tr>
        <tr>
            <td>Origin</td>
            <td><input type="text" name="pet_prod_origin" value="<?php echo $r['pet_prod_origin']; ?>"></td>

        </tr>
        <tr>
            <td>Picture</td>
            <td>
                <input type="file" id="pet_prod_img" name="pet_prod_img" accept="image/*" value="<?php echo $r['pet_prod_image']; ?>">
            </td>

        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="pet_prod_price" value="<?php echo $r['pet_prod_price']; ?>"></td>

        </tr>
        <tr>
            <td><input type="submit" name="submit" value="UPDATE"></td>
        </tr>
    </form>
    </table>
</html>