<?php session_start();
if($_SESSION['competence']!="adminer"){//非系統管理員
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{ ?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>讀書空間預借系統-系統管理員頁面</title>
		<!--基本樣式-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<!--網頁頁籤_abgne_tab-->
		<link rel="stylesheet" type="text/css" href="css/abgne-block.css">
		<script type="text/javascript" src="js/abgne-block.js"></script>
		<script type="text/javascript" src="js/jquery.jget.js"></script>
		<!--燈箱效果_fancybox-->
		<!-- Add fancyBox main JS and CSS files -->
		<link rel="stylesheet" type="text/css" href="css/fancybox/fancybox.css">
		<script type="text/javascript" src="js/fancybox/fancybox.js"></script>
		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="js/fancybox/mousewheel-3.0.6.pack.js"></script>
	    <!--日曆-->
	    <script src="js/JSCal2-1.7/jscal2.js"></script>
	    <script src="js/JSCal2-1.7/lang/b5.js"></script>
	    <link rel="stylesheet" type="text/css" href="css/JSCal2-1.7/jscal2.css" />
	    <link rel="stylesheet" type="text/css" href="css/JSCal2-1.7/border-radius.css" />
	    <link id="skin-gold" title="Gold" type="text/css" rel="stylesheet" href="css/JSCal2-1.7/gold/gold.css" />
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox({
				prevEffect	: 'none',
				nextEffect	: 'none',
			  });
			});
		</script>
		<!--捲軸至底-->
		<script type="text/javascript">
			$(function(){
				$('#s_add').click(function(){$('#s_overf').scrollTop(9999999);});
				$('#d_add').click(function(){$('#d_overf').scrollTop(9999999);});
				$('#t_add').click(function(){$('#t_overf').scrollTop(9999999);});
				$('#b_add').click(function(){$('#b_overf').scrollTop(9999999);});
			});
		</script>
		<!--卷軸呈現-->
		<style type="text/css">
			.overf{
				overflow:scroll;overflow-x:visible;	margin:0 auto;width:700px;height:300px;
			}
		</style>
	</head>
	<body>
	<div class="container">
		<?php
		include("process/Dragon_No.9.inc.php");
		//搜尋資料庫找出名字並顯示
		$sql = "SELECT `name` FROM `adminer` WHERE `ID` = '".$_SESSION['ID']."';";
		$result = mysql_query($sql);
		$adminer = mysql_fetch_array($result);
		?>
		<div style="text-align:left; padding:10px;">
			<span>管理員：<?php echo $adminer[name];?></span></div>
		<div style="text-align:right; padding-right:40px;">
	        <input type="button" value="登出" onclick="if(confirm('確定登出?'))
	          return window.location.replace('process/logout.php') ;else return false;">
		</div>
		<!--進入頁籤區塊 載入各種資料表-->
		<div id="abgne-block-20120327">
			<ul class="tabs">
				<li><span>學生</span></li>
				<li><span>書桌</span></li>
				<li><span>時段</span></li>
				<li><span>預借明細</span></li>
			</ul>
			<div class="tab_container">
				<ul class="tab_content">
					<!--student資料表-->
					<li><?php include("process/adminerPage_s.php"); ?></li>
					<!--desk資料表-->
					<li><?php include("process/adminerPage_d.php"); ?></li>
					<!--time資料表-->
					<li><?php include("process/adminerPage_t.php"); ?></li>
					<!--borrowdetail資料表-->
					<li><?php include("process/adminerPage_b.php"); ?></li>
				</ul>
			</div>  <!-- end .tab_container -->
		</div> <!-- end .abgne-block-20120327 -->
	</div> <!-- end .container -->
	</body>
	</html>
<?php } ?>
