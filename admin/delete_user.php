<?php 
    session_start();
    $id = $_GET['id'];
    require "../connect.php";
    if(isset($id)){
        $check_user = "delete from users where user_id = '$id'";
        //echo $check_user; exit;
        $res = mysqli_query($con, $check_user);
        echo "<script type='text/javascript'>alert('This user was deleted!'); location.href='mange_customer.php'</script>";
    }
    else {
        echo "<script type='text/javascript'>alert('This user was not exist in store!');</script>";
    }
?>