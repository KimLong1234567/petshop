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
            $_SESSION["account_name"] = $username;
            header("location: ../index.php");
        }
        else{
            $message = "Username or password is wrong! Please check again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>

<html>
    <body>
        <p>Đăng nhập</p>
            <form action="sign_in.php" method = "POST">
                Name: 
                <input type="text" name="name"/>
                Password:
                <input type="password" name="password"/>
                <button class="btn" name="login">Đăng Nhập</button>
            </form>
    </body>
</html>