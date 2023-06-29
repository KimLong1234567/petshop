<?php 
    
    $id = $_GET['id'];
    require "./connect.php";
    if(isset($id)){
        $check_book = "DELETE FROM pet WHERE pet_id = '$id'";
        // echo $check_book; exit;
        
        mysqli_query($con, $check_book);
        echo "<script type='text/javascript'>alert('Đã xoá lịch hẹn!'); location.href='./view_book_pet.php'</script>";
    }
    else {
        echo "<script type='text/javascript'>alert('Không tìm thấy lịch');location.href='./index.php'</script>";
    }
?>