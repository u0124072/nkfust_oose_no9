<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{ ?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>讀書空間預借系統-預借管理</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	</head>
	<body>
	<div class="container">
		<div class="content">
			 <img src="images/background/manage.png" width="600" height="250" border="0" >
			<form name="form1" method="post" action="process/process_management.php">
				<div style="margin:-20px auto 10 auto;text-align:center;width:400px;">
					<table align="center" border="2">
						<thead align="center">
							<td width="33"></td>
							<td width="40">座位</td>
							<td width="113">時段</td>
							<td width="104">日期</td>
						</thead>
						<?php	include("process/management_show.php");	?>
					</table>
				</div>
				<div style="margin:0 auto;text-align:center ;width:450px;">
					<input type="submit" value="取消預借" onclick="if(confirm('確定刪除?')) return submit();else return false;">
					<input type="reset" value="清除選擇">
					<input type="button" value="回首頁" onclick="window.location.replace('studentPage.php');">
					<br>
				</div>
			</form>
		</div>
	</div> <!-- end .container -->
	</body>
	</html>
<?php } ?>
