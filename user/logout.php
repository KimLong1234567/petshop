<?php  
    if(isset($_COOKIE['userId'])){
        setcookie("userId", "", time() - 86400, "/");
        setcookie("userName", "", time() - 86400, "/");
        setcookie("userPhone", "", time() - 86400, "/");
    }
echo "<script>alert('You already logout');location.href='../index.php'</script>";
?>