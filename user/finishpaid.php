<?php 
require_once "../connect.php";
    $userId = $_COOKIE['userId'];

    if(isset($_POST['submit'])){
        if(isset($_POST["f-name"]) && isset($_POST['l-address']) && isset($_POST['phone']) && isset($_POST['email'])){
            $name = $_POST['f-name'];
            $address = $_POST['l-address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $sql_upUser = "UPDATE users SET user_name = '$name', user_phone = '$phone', user_email = '$email' WHERE user_id = '$userId'";
            // echo $sql_upUser;
            $sql_update = "UPDATE orders SET Status = '1' WHERE user_id = '$userId'";
            // echo $sql_update; exit;
            $up = $con->query($sql_upUser);
            $que = $con->query($sql_update);
            $rs = mysqli_fetch_assoc($que);
            // SELECT * FROM orders AS o, users AS u WHERE o.user_id = '3' AND u.user_id = '3' AND o.pet_prod_id = '123';
            echo "<script>location.href='../printBill.php'</script>";
        }
        else{
            echo "<script>alert('Vui lòng điền đủ thông tin') location.href='./checkout.php'</script>";
        }
    }
    else {
        echo "<script>alert('some thing wrong');location.href='./checkout.php'</script>";
    }
?>

