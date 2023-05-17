<?php
session_start();
require_once "connect.php";

?>

<html>
    <body>
        <p>đã có tài khoản:</p>
            <form action="login.php">
                Name: 
                <input type="text" name="name"/>
                <input type="password" name="password"/>
            </form>
    </body>
</html>