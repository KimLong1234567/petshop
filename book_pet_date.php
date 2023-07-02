<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/checkout.css">
    <title>Book date care</title>
</head>

<body>
    <?php
        // include "./header.php";
        require "./connect.php";
        function generate_random_character() {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $shuffled_characters = str_shuffle($characters);
            $random_characters = substr($shuffled_characters, 0, 10);
            return $random_characters;
        }
        // Sử dụng hàm để sinh một ký tự ngẫu nhiên
        $random_char = generate_random_character();

        $userId = $_COOKIE['userId'];
        if($userId != ''){
            $sql = "SELECT * FROM users WHERE user_id = '$userId'";
            $sqlSelect = "SELECT * FROM pet_category";
            $rs = $con->query($sqlSelect);
        
            $res = $con->query($sql);
            $r = mysqli_fetch_assoc($res);
            // var_dump($res);

            if (isset($_POST['submit'])){
                $username = $_POST['f-name'];
                $address = $_POST['l-address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $pet_name = $_POST['pet_name'];
                $pet_category_id = $_POST['category'];
                $pet_description = $_POST['pet_description'];
                $pet_img = $_FILES['pet_img']['name'];
                $duoi = explode('.', $pet_img); // tách chuỗi khi gặp dấu .
                $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
                $path_image = $pet_img;
                $pet_img_tmp = $_FILES["pet_img"]['tmp_name'];
                // echo $pet_category_id;
                // var_dump($_FILES["pet_img"]['name']);
                
                if(isset($pet_name) && isset($pet_description) && isset($pet_img) && isset($username) && isset($address) && isset($phone) && isset($email)){
                    $sqlUpUser = "UPDATE users SET user_name = '$username', user_phone = '$phone', user_email = '$email' WHERE user_id = '$userId'";
                    $sqlInerst = "INSERT INTO pet (pet_id, pet_name, pet_description, pet_category_id, pet_img, user_id, pet_date, pet_status) 
                    VALUES ('$random_char', '$pet_name', '$pet_description', '$pet_category_id', '$pet_img','$userId', CURRENT_TIMESTAMP(),'')";
                    // echo $sqlInerst; exit;
                    // $sqlCopy = "INSERT INTO service (service_name, user_id, pet_id)
                    // SELECT pet_description, user_id, pet_id FROM pet";
                    // echo $sqlCopy; exit;

                    mysqli_query($con, $sqlUpUser);
                    mysqli_query($con, $sqlInerst);
                    // mysqli_query($con,$sqlCopy);
                    move_uploaded_file($pet_img_tmp, './asset/img/' . $path_image);
                    $message = "Đã đăng ký lịch!";
                    echo "<script type='text/javascript'>alert('$message'); location.href='./view_book_pet.php'</script>";
                }
                else{
                    $message = "Vui lòng điền đủ thông tin!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
        else{
            echo "<script>alert('You not login yet');location.href='./user/sign_in.php'</script>";
        }
    ?>
    <div class="container">
        <div class="content">
            <h1>Đặt Lịch Hẹn Chăm Sóc Thú Cưng</h1>
                <form action="book_pet_date.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Thông tin cá nhân :</legend>
                        <label>Tên đầy đủ* : </label>
                        <input type="text" name="f-name" value="<?php echo $r['user_name']; ?>">

                        <label>Địa chỉ *: </label>
                        <input type="text" name="l-address" value="<?php echo $r['user_address']; ?>">

                        <label>Số điện thoại* : </label>
                        <input type="text" name="phone" value="<?php echo $r['user_phone'];?>">

                        <label>Email* : </label>
                        <input type="text" name="email" value="<?php echo $r['user_email'];?>">

                        <label>Tên thú cưng*: </label>
                        <input type="text" name="pet_name">

                        <label>Vấn đề gặp phải* : </label>
                        <input type="text" name="pet_description" >

                        <label>Loài thú cưng* : </label>
                            
                        <select name="category">
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

                        <label>HÌnh ảnh thú cưng* : </label>
                        <input type="file" name="pet_img" accept="image/*">
                    
                        <input type="submit" name="submit" value="Submit your information form">
                        
                    </fieldset>
                </form>
        </div>
    </div>

</body>
<?php
    // include "./footer.php";
?>
</html>