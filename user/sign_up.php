<?php
    include '../connect.php';
    if(isset($_POST["submit"])){
        $username = $_POST["name"];
        $password = hash("sha256" ,$_POST["password"]);
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $que = "select user_phone from users where user_phone = '$phone'";
        $result = mysqli_query($con, $que);

        $num = mysqli_num_rows($result);
    
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
        <form action="login.php" method="POST">
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