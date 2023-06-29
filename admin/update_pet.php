<?php
    //ket noi csdl
    include '../connect.php';

    //lay ma pet 
    $code = $_GET['id'];
    //lay thong tin lien quan den pet
    $sql_show_prd = "SELECT * FROM pet WHERE pet_id = '$code' ";
    
    // echo $sql_show_prd; exit;
    // thuc thi cau lenh sql
    $result = mysqli_query($con,$sql_show_prd);
    //in ra form
    $r = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])){
        $pet_id = $_POST["pet_id"];
        $pet_service_detail = $_POST["pet_service_detail"];
        $pet_service_fee = $_POST["pet_service_fee"];
    
        //viet cau lenh edit
        $sql_edit = "UPDATE pet SET 
        pet_service_date = CURRENT_TIMESTAMP(), 
        pet_service_detail = '$pet_service_detail', 
        pet_service_fee = '$pet_service_fee',
        pet_status = '1'
        WHERE pet_id = '$pet_id'";
        // echo $sql_edit;exit;


        //thuc thi cau lenh
        mysqli_query($con, $sql_edit);
        header('location:manage_pet.php');
    }
?>

<html>
    <p>Chi tiết chăm sóc</p>
    <table>
    <form method="POST" action="update_pet.php" enctype="multipart/form-data">
        <tr>
            <td>Pet id</td>
            <td><input type="text" name="pet_id" value="<?php echo $r['pet_id']; ?>" readonly="true"></td>
        </tr>

        <tr>
            <td>Pet service detail</td>
            <td><input type="text" name="pet_service_detail" value="<?php echo $r['pet_service_detail']; ?>"></td>
        </tr>
        <tr>
            <td>Thành Tiền</td>
            <td><input type="text" name="pet_service_fee" value="<?php echo $r['pet_service_fee']; ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="UPDATE"></td>
        </tr>
    </form>
    </table>
</html>