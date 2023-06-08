<?php 
    require "../connect.php"; // Kết nối database          
    function generate_random_character() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $shuffled_characters = str_shuffle($characters);
        $random_characters = substr($shuffled_characters, 0, 10);
        return $random_characters;
    }
    // Sử dụng hàm để sinh một ký tự ngẫu nhiên
    $random_char = generate_random_character();
    // echo $random_char;
    session_start();
        if (isset($_POST['add'])) {
            if (isset($_GET['id'])) { // kiểm tra id sản phẩm được add
                $id = $_GET['id'];
                $quantity = $_POST['quantity']; // Số lượng sản phẩm do người dùng nhập
                
                $sql = "SELECT * FROM pet_product WHERE pet_prod_id = '$id'";
                // echo $query; exit;  
                $rs = $con->query($sql);
                $soluong = (count($rs->fetch_assoc()));
                // $rs = mysqli_query($con, $query);
                if ($rs) { // Kiểm tra xem truy vấn có thành công không
                    if($soluong > 0){
                        if ($rs -> num_rows > 0) {                
                            $sql = "SELECT * FROM pet_product";
                            $rs = $con->query($sql);
                                foreach($rs as $row){ 
                                    $pet_prod_id = ($row['pet_prod_id']);
                                    $pet_prod_price = ($row['pet_prod_price']);
                            }

                                    $total= $quantity*$pet_prod_price;
                                    $userId = $_COOKIE['userId'];
                                        // select trong order để kiểm tra 
                                        // var_dump($pet_prod_id,$pet_prod_price,$quantity,$total);
                                        $sql_order = "SELECT * FROM orders where pet_prod_id='$id' AND user_id='$userId'";
                                        $rs_order = $con->query($sql_order);
                                        foreach($rs_order as $r ){
                                            $i = ($r['pet_prod_id']);
                                            $sl_daco = ($r['order_numberOfItem']);
                                        }
                                                if($i == '' ){
                                                    $sql_insert= "INSERT INTO orders (order_id, order_date, order_total, order_numberOfItem, user_id, status, pet_prod_id) 
                                                    VALUES ('$random_char',CURRENT_TIMESTAMP(),'$total','$quantity','$userId','','$id')";
                                                    $insert = $con->query($sql_insert);
                                                    echo "<script>alert('This product added success!  with $quantity ');location.href='../view_cart.php'</script>";
                                                }
                                                else {
                                                    $newItem = $sl_daco + $quantity;
                                                    $sql_update = "UPDATE orders SET order_numberOfItem = '$newItem' WHERE pet_prod_id='$id' AND user_id='$userId'";
                                                    $update = $con->query($sql_update);
                                                    echo "<script>alert('This product was add with $quantity ');location.href='../view_cart.php'</script>";
                                                }

                                
                                    
                            //
                                // Tiếp tục xử lý dữ liệu
                                // kiểm tra nếu pet_prod_id = với pet_prod_id trong orders thì cộng thêm số lượng`
                                // if(isset($_SESSION['add_cart'][$id])){
                                //     echo "<script>alert(' You have added this product in your cart, please check it! ');location.href='../index.php'</script>";
                                // }
                                 // kiểm tra nếu SP đã được thêm thì không được thêm nữa


                                // ngược lại nếu chưa có trong order thì add sản phẩm vào
                                // else {
                                //     echo 'da vao';

                                //     if (isset($_SESSION['add_cart'][$id]['pet_prod_quantity'])) {
                                //         // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng theo số lần người dùng nhập
                                //         $_SESSION['add_cart'][$id]['pet_prod_quantity'] += $quantity;
                                //         var_dump($_SESSION['add_cart']); exit;
                                //     // echo "<script>alert('You have add this product to your cart');location.href='../view_cart.php'</script>";
                                //     } else {
                                //         // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm vào giỏ hàng với số lượng là quantity
                                //         $_SESSION['add_cart'][$id] = $item;
                                //         $_SESSION['add_cart'][$id]['pet_prod_quantity'] = $quantity;
                                //         echo "<script>alert('This product added success!  with $quantity ');location.href='../view_cart.php'</script>";
                                //     }
                                // }
                            
                        } else {
                            echo "<script>alert('Can't find the product, Please contact us');location.href='../index.php'</script>";
                            // Không tìm thấy dữ liệu, xử lý theo yêu cầu của bạn
                        }
                    // echo "<script>alert(' Lỗi! ');location.href='../view_cart.php'</script>";
                    }
                    } else {
                        echo "<script>alert('Lỗi kết nối');location.href='../index.php'</script>";
                        // Xử lý lỗi truy vấn không thành công
                    }
                }
        
            //echo "<script>alert(' This product added success! ');location.href='../index.php'</script>";
            }