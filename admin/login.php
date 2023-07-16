<?php
    session_start();
    require_once "../connect.php";

    // if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //     $admin_name = $_POST['admin_name'];
    //     $password = $_POST['admin_password'];

    //     function authenticateUser($admin_name, $password) {
            
    //     }

    //     // Kiểm tra thông tin đăng nhập của người dùng
    //     if (authenticateUser($admin_name, $password)) {
    //     // Lưu thông tin đăng nhập vào phiên làm việc
    //         $_SESSION['loggedin'] = true;
    //         $_SESSION['admin_name'] = $admin_name;
    //     }else{
    //         // Xử lý lỗi đăng nhập

    //     }
    // }
   
    if(isset($_POST['login_admin'])){
        // echo 'đã vào'; exit;
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];
        $admin_check = "SELECT admin_name, admin_password FROM admin WHERE admin_name = '$admin_name' && admin_password = '$admin_password'";
        $admin_result = mysqli_query($con, $admin_check);
        $admin_num = mysqli_num_rows($admin_result);

        foreach($admin_result as $r){
            $id_kh =$r['stt_admin'];
        }
        if($admin_num == 1){
            $_SESSION["admin_name"] = $admin_name;
            setcookie("stt_admin", $id_kh, time() + 86400, "/");
            header("location: ./adminProductMange.php");
        }
        else{
            $message = "Admin name or password is wrong! Please check again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet " href="../asset/css/user_login.css">
    </head>
    <body>
    <form action="login.php" method = "POST" class="form" id="form-1" style="margin-top: 30px;">
            <h3 class="heading">ADMIN đăng nhập</h3>
            <div class="spacer"></div>
            <div class="form-group">
                <label for="fullname" class="form-label">ADMIN Name</label>
                <input id="fullname" type="text" name="admin_name" placeholder="VD: KimLong" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" placeholder="Nhập mật khẩu" name="admin_password"  class="form-control">
                <span class="form-message"></span>
            </div>
                <button class="form-submit" name="login_admin">Đăng Nhập</button>
        </form>
        <script src="../js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập ADMIN name'),
                Validator.minLength('#password',6),
            ]
        });
    </script>
    </body>
</html>