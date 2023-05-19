<?php
session_start();
require_once "../connect.php";

    if(isset($_POST['login'])){
        $username = $_POST["name"];
        $password = hash("sha256" ,$_POST["password"]);
        $user_check = "select user_name, user_password from users where user_name = '$username' && user_password = '$password'";
        $result = mysqli_query($con, $user_check);
        $num = mysqli_num_rows($result);// thực hiện câu truy vấn đăng nhập với user
        
        if($num == 1){
            $_SESSION["user_name"] = $username;
            header("location: ../index.php");
        }
        else{
            $message = "Username or password is wrong! Please check again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>

<html>
    <head>
        <!--
        <link rel="stylesheet " href="../asset/css/user_login.css">
        -->
    </head>
    <body>

        <form action="sign_in.php" method = "POST">
            <h3 class="heading">Thành viên đăng nhập</h3>
            <div class="form-group">
                <label for="fullname" class="form-label">User Name</label>
                <input id="fullname" type="text" name="name" placeholder="VD: KimLong" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" placeholder="Nhập mật khẩu" name="password"  class="form-control">
                <span class="form-message"></span>
            </div>
                <button class="btn" name="login">Đăng Nhập</button>
        </form>
    </body>
</html>