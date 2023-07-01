<?php
session_start();
require_once "../connect.php";

    if(isset($_POST['submit'])){
        $username = $_POST["name"];
        $password = hash("sha256" ,$_POST["password"]);
        $user_check = "SELECT user_id, user_name, user_password,user_phone from users where user_name = '$username' AND user_password = '$password'";
        $result = $con->query($user_check);
        // $result = mysqli_query($con, $user_check);
        $num = mysqli_num_rows($result);// thực hiện câu truy vấn đăng nhập với user
        foreach($result as $r){
            $sdt =$r['user_phone'];
            $id_kh =$r['user_id'];
            $name =$r['user_name'];
        }
        if($num == 1){
            $_SESSION["user_name"] = $username;
            setcookie("userId", $id_kh, time() + 86400, "/");
            setcookie("userName", $name, time() + 86400, "/");
            setcookie("userPhone", $sdt, time() + 86400, "/");
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
        
        <link rel="stylesheet " href="../asset/css/user_login.css">
    
    </head>
    <body>
        <form action="sign_in.php" method = "POST" class="form" style="margin:auto" id="form-1">
            <h3 class="heading">User Sign In</h3>
            <div class="spacer"></div>
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
                <button class="form-submit" name="submit">Đăng Nhập</button>
        </form>
        <script src="../js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập username'),
                Validator.minLength('#password',6),
            ]
        });
    </script>
    </body>
</html>