<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{ ?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>讀書空間預借系統-預借頁面</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<script>
			$(document).ready(function(){
				ChangeToDate();//載入頁面就重整一次日期
				$('#select_date').change(ChangeToTime);//選擇日期 改變時段
				$('#select_time').change(ChangeToDesk);//選擇時段 改變座位
			});
			function ChangeToDate(){//重整日期
				$.ajax({
					url: "process/process_reservation.php",
					type: "POST",
					data: {select_date: $('#select_date').val(),choose:"date"},//傳送data 並告知欲更新data
					success: function(data){
						$('#select_date').empty();//日期清空
						$('#select_time').empty();//時段清空
						$('#select_desk').empty();//座位清空
						$('#select_date').append(data);//更新日期
						$('#select_time').append("<option value=''>請先選擇日期</option>");
						$('#select_desk').append("<option value=''>請先選擇時段</option>")
					}
				});
			};
			function ChangeToTime(){//改變時段
				$.ajax({
					url: "process/process_reservation.php",
					type: "POST",
					data: {select_date: $('#select_date').val(),choose:"time"},//傳送data 並告知欲更新time
					success: function(data){
						$('#select_time').empty();//時段清空
						$('#select_desk').empty();//座位清空
						$('#select_time').append(data);//更新時段
						$('#select_desk').append("<option value=''>請先選擇時段</option>")
					}
				});
			};
			function ChangeToDesk(){//改變座位
				$.ajax({
					url: "process/process_reservation.php",
					type: "POST",
					data: {select_date: $('#select_date').val(),select_time: $('#select_time').val(),choose:"desk"},//傳送data、time 並告知欲更新座位
					success: function(data){
						$('#select_desk').empty();//座位清空
						$('#select_desk').append(data);//更新座位
					}
				});
			};
		</script>
	</head>
	<body>
	<div class="container">
		<div class="content">
			<img src="images/background/banner.png" width="600" height="250" border="0" >
			<form name="form1" action="process/process_reservation.php" method="post">
				<div style="margin:10 auto 0 auto;text-align:left;width:250px; height:100px;">
					<span style="padding-left:50px">日期：</span>
					<select id="select_date" name="select_date"></select><br><!--下拉日期-->
					<span style="padding-left:50px">時段：</span>
					<select id="select_time" name="select_time"></select><br><!--下拉時段-->
					<span style="padding-left:50px">座位：</span>
					<select id="select_desk" name="select_desk"></select><br><!--下拉座位-->
					<br><br>
				</div>
				<div style="margin:0 auto;text-align:center ;width:450px;">
					<input type="submit" value="預借申請">
					<input type="button" value="全部清除" onclick="ChangeToDate();"><!--重整日期-->
					<input type="button" value="回首頁" onclick="window.location.replace('studentPage.php');">
				</div>
			</form>
		</div>
	</div> <!-- end .container -->
	</body>
	</html>
<?php } ?>