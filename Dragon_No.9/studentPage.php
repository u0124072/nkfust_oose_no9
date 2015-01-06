<?php session_start();
if($_SESSION['competence']!="student"){//非學生
  echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{ ?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>讀書空間預借系統-學生頁面</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  </head>
  <body>
  <div class="container">
    <div class="content">
      <img src="images/background/banner.png" width="600" height="250" border="0" >
      <div style="margin:0 auto; width:250px; height:80px">
        <p style="text-align:left; font-weight:bold;font-size:20px;padding-left:50px">
        <span>學號：<?php echo $_SESSION['ID'] ?></span><br>
        <span>姓名：<?php echo $_SESSION['name'] ?></span></p>
        <hr>
        <input type="button" value="預借頁面" onclick="window.location.href='reservation.php'">
        <input type="button" value="管理頁面" onclick="window.location.href='management.php'">
        <input type="button" value="查詢頁面" onclick="window.location.href='searchDesk.php'">
        <br><br>
        <input type="button" value="登出" onclick="if(confirm('確定登出?'))
          return window.location.replace('process/logout.php') ;else return false;">
      </div>
    </div> <!-- end .content -->
  </div> <!-- end .container -->
  </body>
  </html>
<?php } ?>


