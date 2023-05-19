<?php
    session_start();
    require_once "../connect.php";
   
    if(isset($_POST['login_admin'])){
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];
        $admin_check = "select admin_name from admin where admin_name = '$admin_name' && admin_password = '$admin_password'";
        $admin_result = mysqli_query($con, $admin_check);
        $admin_num = mysqli_num_rows($admin_result);

        if($admin_num == 1){
            $_SESSION["admin_name"] = $admin_name;
            header("location: adminProductMange.php");
        }
        else{
            $message = "Admin name or password is wrong! Please check again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

?>

<html>
    <body>
    <form action="login.php" method = "POST">
            <h3 class="heading">Admin login</h3>
            <div class="form-group">
                <label for="fullname" class="form-label">Admin Name</label>
                <input id="fullname" type="text" name="admin_name" placeholder="VD: KimLong" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" placeholder="Nhập mật khẩu" name="admin_password"  class="form-control">
                <span class="form-message"></span>
            </div>
                <button class="btn" name="login_admin">Đăng Nhập</button>
    </body>
</html>