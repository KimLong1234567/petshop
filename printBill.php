<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></linkrel>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></linkrel>


    <?php
        include './header.php';
        include './connect.php';
        if(isset($_COOKIE['userId'])){
            $userId = $_COOKIE['userId'];
            $sql = "(SELECT * FROM orders AS o, users AS u WHERE o.user_id = '$userId' AND u.user_id = '$userId') ORDER BY o.stt_order DESC";
            // echo $sql; exit;
            $rse = mysqli_query($con, $sql);
            $rs = mysqli_fetch_assoc($rse);
        }
    ?>
</head>
    <style>
      #body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        #h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        #p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      .checkmark {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div id="body">
        <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
          <i class="checkmark">✓</i>
        </div>
          <h1 id="h1">Thanh toán thành công</h1> 
          <p id="p">Chúng tôi đã nhận được đơn hàng của <?php echo $rs['user_name']  ?><br/> Mã đơn hàng của là <?php echo $rs['order_id'] ?></p>
          <a href="./index.php" style="margin-bottom: 20px; text-decoration: none;">
              <button type="button" class="btn btn-outline-success" style="margin: auto;"><h3 style="color: green;">Về trang chủ</h3></button>
          </a>
        </div>
      </div>
    </body>
    <?php 
      include './footer.php';
    ?>
</html>