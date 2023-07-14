<html>
    <head>
        <link rel="stylesheet" href="./asset/css/contact.css">
    </head>
    <body>
    <?php 
        include './connect.php';
        if(isset($_POST['submit'])){
            if(isset($_POST['message']) && isset($_POST['email'])){
                $mess = $_POST['message'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sql = "INSERT INTO contact (stt, mess, name, email, ngay_gui) VALUES ('','$mess', '$name', '$email', CURRENT_TIMESTAMP())";
                $rs = mysqli_query($con, $sql);
                echo "<script>location.href='./index.php'</script>";
            }
        }
    ?>
    <form action="./contact.php" method="post">
        <small>Nhập tin nhắn (tùy chọn) và nhấp vào nút "Gửi"</small>
        <div class="wrapper centered">
        <article class="letter">
            <div class="side">
            <h1>Liên Hệ</h1>
            <p>
                <textarea placeholder="Ý kiến" name="message"></textarea>
            </p>
            </div>
            <div class="side">
            <p>
                <input name="name" type="text" placeholder="Tên bạn" >
            </p>
            <p>
                <input name="email" type="email" placeholder="Email" >
            </p>
            <p>
                <button id="sendLetter" name="submit" >Gửi</button>
            </p>
            </div>
    </form>
        </article>
        <div class="envelope front"></div>
        <div class="envelope back"></div>
        </div>
        <p class="result-message centered">Cảm ơn ý kiến đóng góp</p>
    </body>
    <script src="./asset/js/contact.js"></script>
</html>