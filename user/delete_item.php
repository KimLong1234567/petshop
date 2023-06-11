<?php
    require "../connect.php";
    if(isset($_COOKIE['userId']) && isset($_POST['delete'])){
        if(isset($_GET['id'])){
            $userId = $_COOKIE['userId'];
            $id = $_GET['id'];
            $sql = "DELETE FROM orders WHERE user_id = '$userId' AND pet_prod_id = '$id'";
            $que = $con->query($sql);       
        }
    }else{
        echo "<script>alert('Co loi');location.href='../view_cart.php'</script>";
    }
    echo "<script>alert('Delete succesfully');location.href='../view_cart.php'</script>";
    header("location: ../view_cart.php");
?>