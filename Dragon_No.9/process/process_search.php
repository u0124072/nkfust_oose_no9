<style type="text/css">
	.desk{
		height: 25px;
		width: 25px;
		background-color: rgb(255,255,255);
		margin: 5px;
		padding: 5px;
		display:inline;
	}
	.desk_br{background-color: #FFFF99;}
	.desk_br span{color:red; font;font-weight: bold;}
	.desk_r{border: 2px outset red;}
	.desk_g{border: 2px outset green;}

</style>
<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{
	include("Dragon_No.9.inc.php");
	switch ($_POST['choose']) {
		case "date"://日期變動 改變時段
			if($_POST['select_date']!=null){ //如果不為空
				$sql = "SELECT * FROM time";//搜尋所有時段
				$result = mysql_query($sql);
				$str.="<option value=''>請選擇</option>";
				while($time = mysql_fetch_array($result)){
					$str.="<option value=".$time[timeID].">".$time[time]."</option>";//迴圈跑完所有時段選單並存至字串
				}
				echo $str;//回傳自船
			}else{
				$str.="<option value=''>請先選擇日期</option>";
				echo $str;//回傳自船
			}
			break;
		case "time"://時段變動 改變座位表
			if($_POST['select_time']!=null){//如果時段不為空
				function decide_R($deskID) {//判斷傳來的座位編號是否已被預借
					//$sql = "SELECT `deskID` FROM `desk` where exists (select * from `borrowdetail` where `deskID`=deskNO and `timeNo`='$select_time' and `date`='$select_date')";
					//找到該日期、該時段所有已被借走的座位編號
					$sql ="SELECT `deskNo`,`check` FROM borrowdetail WHERE `timeNo`='".$_POST['select_time']."' and `date`='".$_POST['select_date']."'";
					$result = mysql_query($sql);
					$r="false"; //判斷重複(預設未重複)
					while($desk_n = mysql_fetch_array($result)){
						if($deskID==$desk_n[deskNo]){//如果傳來的座位編號 與已被借走的座位編號相符
							$r=true; //判斷重複(有重複)
							if($desk_n[check]=="ok"){
								$r="true_OK";
							}else{
								$r="true_not";
							}
						}
					}
					switch ($r) {
						case 'true_OK':
							return "<div class='desk desk_r desk_br'><span>".$deskID."</span></div>"; //回傳 並套用樣式且呈現紅框
							break;
						case 'true_not':
							return "<div class='desk desk_r'>".$deskID."</div>"; //回傳 並套用樣式且呈現紅框
							break;
						default:
							return "<div class='desk desk_g'>".$deskID."</div>"; //回傳 並套用樣式且呈現綠框
							break;
					}
				}
				$sql = "SELECT * FROM desk order by deskID asc";//找出所有座位
				$result = mysql_query($sql);
				$i=0;//記錄跑到第幾個座位
				while($desk = mysql_fetch_array($result)){//跑迴圈
					if($i!=0 && $i%10==0) {//非第一行的第十個換行兩次
						$str.="<br/><br/>";
					}else if($i==0 &&$i%10==0){//第一行的第十個換行一次
						$str.="<br/>";
					}
					$i++;//座位++
					$str.=decide_R($desk[deskID]);//判斷座位是否重複並取得結果存入字串
				}
				echo $str;//回傳字串
			}
			break;
		default:
			echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
			break;
	}
}
?>
