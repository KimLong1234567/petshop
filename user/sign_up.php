<?php
    include '../connect.php';
    if(isset($_POST["submit"])){
        $username = $_POST["name"];
        $password = hash("sha256" ,$_POST["password"]);
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $que = "select user_phone from users where user_name = '$username'";
        $result = mysqli_query($con, $que);//sử dụng hàm mysqli_query() để thực thi truy vấn SQL trên kết nối cơ sở dữ liệu $con. Kết quả trả về từ truy vấn này được gán cho biến $result.

        $num = mysqli_num_rows($result);// sử dụng hàm mysqli_num_rows() để đếm số hàng trả về từ kết quả truy vấn $result. Số hàng này là số lượng người dùng có số điện thoại tương ứng với $phone.
    
        // num = 1 tìm thấy một tài khoản hoặc số điện thoại đã tồn tại trong cơ sở dữ liệu
        if ($num == 1){
            $message = "This account or phone number already exist, Please check it again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
            $sql = "insert into users (user_name, user_password, user_phone, user_address) values ('$username', '$password', '$phone', '$address')";
            mysqli_query($con, $sql);
            $ms = "Registration Successful";
            echo "<script>alert('$ms');location.href='../index.php'</script>";
        }
    }

?>

<html>
    <body>
        <p>Đăng ký</p>
        <form action="sign_up.php" method="POST">
            Name:
            <input type="text" name="name"/>
            Password:
            <input type="password" name="password"/>
            Phone:
            <input type="number" name="phone"/>
            Address:
            <input type="text" name="address"/>
            <button class="btn" name="submit">Đăng ký</button>
        </form>
    </body>
</html>