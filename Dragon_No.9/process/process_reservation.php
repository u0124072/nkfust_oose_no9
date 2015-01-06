<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{
	include("Dragon_No.9.inc.php");
	switch ($_POST['choose']) {
		case "date"://更新日期
			$limit=mktime(15,00,0,date("m"),date("d"),date("Y"));//下午三點
			$now=mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));//現在時間
			$str.= '<option value="" >請選擇</option>';
			if($now>=$limit){//現在時間>下午三點 則無法今日無法再預借
				for($i=1;$i<=3;$i++){//顯示明、後、大後三天
				$str.= '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
			}else{
				for($i=0;$i<=2;$i++){//顯示今、明、後三天
				$str.= '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
			}
			echo $str;
			break;
		case "time"://更新時段
			if($_POST['select_date']!=null){//如果日期不為空
				$date= $_POST['select_date'];//記錄選擇日期
				$sql = "SELECT * FROM time";//找出所有時段
				$result = mysql_query($sql);
				$str.= "<option value=''>請選擇</option>";
				while($time = mysql_fetch_array($result)){//跑迴圈
					if($date==date('Y-m-d')){//如果是選擇日期今天
						$now= date('H:i:s');//記錄現在時間
						$b=$time[time_start];//記錄時段開始時間
						if ($now<$b){//如果現在時間<時段開始時間 則顯示下拉選項
							$str.="<option value=".$time[timeID].">".$time[time]."</option>";
						}
					}else{//不是今天
						$str.="<option value=".$time[timeID].">".$time[time]."</option>";//顯示全部時段
					}
				}
				echo $str;//回傳字串
			}else{
				echo "<option value=''>請先選擇日期</option>";
			}
			break;
		case "desk"://更新座位
			if($_POST['select_time']!=null){//如果時段不為空
				function decide_R($deskID) {//判斷座位是否已預借
					//$sq3 = "SELECT `deskID` FROM `desk` where exists (select * from `borrowdetail` where `deskID`=deskNO and `timeNo`='$select_time' and `date`='$select_date')";
					$sql = "SELECT `deskNo` FROM `borrowdetail` where `timeNo`='".$_POST['select_time']."' and `date`='".$_POST['select_date']."'";
					$result = mysql_query($sql);
					$i=0;
					while($desk_n = mysql_fetch_array($result)){
						if($deskID==$desk_n[deskNo]){
							$i=1;
						}
					}
				  	if($i==1){//如果重複則不顯示
				  		//return "<option disabled>".$deskID."</option>";
					}else{
						return "<option value=".$deskID.">".$deskID."</option>";
					}
				}
				$sql="SELECT distinct `deskDist` FROM `desk`";
				$result = mysql_query($sql);
				$str.="<option value=''>請選擇</option>";
				while($deskDist = mysql_fetch_array($result)){
					$str.="<optgroup label=".$deskDist[deskDist].">";
					$sq2 = "SELECT `deskID` FROM `desk` where `deskDist`='$deskDist[deskDist]'";
					$result2 = mysql_query($sq2);
					while($desk = mysql_fetch_array($result2)){
						$str.=decide_R($desk[deskID]);
					}
					$str.="</optgroup>";
				}
				echo $str;
			}else{
				echo "<option value=''>請先選擇時段</option>";
			}
			break;
		default://非更新日期時段座位 則進入預借
			if( $_POST["select_date"] !=null && $_POST["select_time"] !=null && $_POST["select_desk"] !=null ){//三者都不為空
				$ID=$_SESSION['ID'];
				$deskNo=$_POST["select_desk"];
				$timeNo=$_POST["select_time"];
				$date=$_POST["select_date"];
				$sql = "SELECT * FROM `borrowDetail` WHERE `deskNo` = '$deskNo' AND `timeNo` = '$timeNo' AND `date` = '$date'";
				$result = mysql_query($sql);
				$sn_index=mysql_num_rows($result);
				if($sn_index > 0){
					echo "<script language='JavaScript'>window.alert('已被預借！');</script>";
				}else{
					$sql ="SELECT * FROM `borrowDetail` WHERE `studentID`='$ID' AND `timeNo` = '$timeNo' AND `date`='$date'";
					$result = mysql_query($sql);
					$sn_index=mysql_num_rows($result);
					if($sn_index ==0){
						$sql = "INSERT INTO `borrowDetail` (`studentID`,`deskNo`,`timeNo`,`date`) VALUES ('$ID','$deskNo','$timeNo','$date')";
						$result = mysql_query($sql);
						echo "<script language='JavaScript'>window.alert('預借成功！');</script>";
						echo "<script language='JavaScript'>window.location.replace('../reservation.php');</script>";//回前頁
					}else{
						echo "<script language='JavaScript'>window.alert('同時段不得預借兩個位置');</script>";
						echo "<script language='JavaScript'>window.location.replace('../reservation.php');</script>";//回前頁
					}
				}
			}else{
				echo "<script language='JavaScript'>window.alert('請選擇完整');</script>";
				echo "<script language='JavaScript'>window.location.replace('../reservation.php');</script>";//回前頁
			}
			break;
	}

}
?>