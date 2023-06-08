<?php 
session_start();
require_once "../connect.php";
        if ($con->connect_error) {
            die('Cannot Connection!');
        }
        
        if (isset($_POST['submit'])) { // kiểm tra nếu người dùng đã submit thì đưa thông tin order lên db để admin quản lý

            $fullname = $_POST["f-name"];
            $address = $_POST["l-name"];
            $phone = $_POST["phone"];

            // $s = " insert into order_prod (order_prod_name, order_address , order_phone, order_time) values ('$fullname', '$address', '$phone', CURRENT_TIMESTAMP());";
            

            
        
        $product = (isset($_SESSION['add_cart']))? $_SESSION['add_cart'] : [];
        // echo $s.'<br>';
        mysqli_begin_transaction($con);   
        $result = mysqli_query($con, $s);
        $od_id = mysqli_insert_id($con);
        foreach($product as $key => $value):
        
            $name = $value['pet_prod_name'];
            $price = $value['pet_prod_price'];
            $img = $value['pet_prod_image'];
            

        //  $p = "insert into order_detail(order_id, prod_name, prod_price, prod_image) values ( $od_id,'$name', '$price', '$img')";
         $result = mysqli_query($con, $p) ; 

        // echo $p.'<br>';

        endforeach;
        mysqli_commit($con); 
        print_r($_SESSION['add_cart']);

       echo "<script>alert('$user! Your order is successful. Thanks for your purchase with us! ');location.href='../index.php'</script>";
        
    }
    ?>