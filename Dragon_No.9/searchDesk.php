<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{ ?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>讀書空間預借系統-查詢頁面</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#select_date').change(ChangeToTime);//下拉日期變動 改變時段
				$('#select_time').change(ChangeToDesk);//下拉時段變動 改變座位表
			});
			function ChangeToTime(){//改變時段
				$.ajax({
					url:"process/process_search.php",
					type:"POST",
					data:{select_date: $('#select_date').val(),choose:"date"},//傳送所選擇日期並告知日期變動
					success: function(data){
						$('#select_time').empty();//時段清空
						$('#show_desk').empty();//座位表清空
						$('#select_time').append(data);//增加回傳的時段
					}
				});
			};
			function ChangeToDesk(){//改變座位表
				$.ajax({
					url:"process/process_search.php",
					type:"POST",
					data:{select_date: $('#select_date').val(),select_time: $('#select_time').val(),choose:"time"},//傳送所選擇日期與時段並告知時段變動
					success: function(data){
						$('#show_desk').empty();//座位表清空
						$('#show_desk').append(data);//增加回傳的座位表
					}
				});
			};
		</script>
	</head>
	<body>
	<div class="container">
		<div class="content">
			<img src="images/background/banner.png" width="600" height="250" border="0" >
			<div style="margin:10 auto 0 auto;text-align:left;width:250px; height:50px;">
				<span style="padding-left:50px">日期：</span>
				<select id="select_date" name="select_date"><!--下拉日期-->
				<?php
					$limit=mktime(15,00,0,date("m"),date("d"),date("Y"));//晚上六點
					$now=mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));//現在時間
					echo '<option value="" >請選擇</option>';
					if($now>=$limit){//現在時間>晚上六點
						for($i=0;$i<=3;$i++){//呈現四天(今、明、後、再加一天)
							echo '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
					}else{
						for($i=0;$i<=2;$i++){//呈現三天(今、明、後)
							echo '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
					}
				?>
				</select><br>
				<span style="padding-left:50px">時段：</span>
				<select id="select_time" name="select_time"><!--下拉時段-->
					<option value="">請先選擇日期</option>
				</select><br>
			</div>
			<div style="margin:0 auto;text-align:center ;width:450px;">
				<div id="show_desk"></div><br><!--顯示座位表-->
				<input type="button" value="回首頁" onclick="window.location.replace('studentPage.php');">
			</div>
		</div> <!-- end .content -->
	</div> <!-- end .container -->
	</body>
	</html>
<?php } ?>
