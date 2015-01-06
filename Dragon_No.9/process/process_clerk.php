<?php session_start();
if($_SESSION['competence']!="clerk"){//非學生
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{
	include("Dragon_No.9.inc.php");
	switch ($_POST['choose']) {
		case "date"://日期變動 改變時段
			if($_POST['select_date']!=null){ //如果不為空
				$sql = "SELECT * FROM time";//搜尋所有時段
				$result = mysql_query($sql);
				while($time = mysql_fetch_array($result)){
					$str.="<option value=".$time[timeID].">".$time[time]."</option>";//迴圈跑完所有時段選單並存至字串
				}
				echo $str;//回傳自船
			}
			break;
		case "time"://時段變動 改變座位表
			if($_POST['select_time']!=null){//如果時段不為空
				function decide_R($deskID) {//判斷傳來的座位編號是否已被預借
					//$sql = "SELECT `deskID` FROM `desk` where exists (select * from `borrowdetail` where `deskID`=deskNO and `timeNo`='$select_time' and `date`='$select_date')";
					//找到該日期、該時段所有已被借走的座位編號
					$sql ="SELECT * FROM borrowdetail WHERE `timeNo`='".$_POST['select_time']."' and `date`='".$_POST['select_date']."'";
					$result = mysql_query($sql);
					$r="false"; //判斷重複(預設未重複)
					while($desk_n = mysql_fetch_array($result)){
						if($deskID==$desk_n[deskNo]){//如果傳來的座位編號 與已被借走的座位編號相符
							$r=true; //判斷重複(有重複)
							if($desk_n[check]=="ok"){
								$r="true_OK";
								$qq.="<div class='desk desk_r desk_br' onclick='ChangeToTable_L(\"".$desk_n['borrowNo']."\",\"Lent\");'>";
								$qq.="<span>".$deskID."</span></div>"; //回傳 並套用樣式且呈現紅框
								return $qq;
								break+2;
							}else{
								$r="true_not";
								$qq.="<div class='desk desk_r' onclick='ChangeToTable_L(\"".$desk_n['borrowNo']."\",\"Lent\");'>";
								$qq.="<span>".$deskID."</span></div>"; //回傳 並套用樣式且呈現紅框
								return $qq;
								break+2;
							}
						}
					}
						switch ($r) {
						case 'true_OK':
							break;
						case 'true_not':
							break;
						default:
							$qq.="<div class='desk desk_g' onclick='ChangeToTable_E(\"".$deskID."\",\"".$_POST['select_time']."\",\"".$_POST['select_date']."\",\"Empty\");'>";
							$qq.="<span>".$deskID."</span></div>"; //回傳 並套用樣式且呈現綠框
							return $qq;
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
		case "table"://點選 變更表單
			switch ($_POST['select_status']) {
				case 'Lent':
					$sql ="SELECT * FROM borrowdetail WHERE `borrowNo`='".$_POST['select_no']."' ";
					$result = mysql_query($sql);
					$borrow = mysql_fetch_array($result);
	                $str.="<frame>";
	          		$str.="<table id='s_table' align='center' border='1'>";
	          		$str.="<tr><td><label>編號：<input type='text' id='t_no' name='t_no' value='".$borrow['borrowNo']."' readonly></label></td></tr>";
	              	$str.="<tr><td><label>學號：<input type='text' id='t_id' name='t_id' value='".$borrow['studentID']."'></label></td></tr>";
	            	$str.="<tr><td><label>日期：<input type='text' id='t_date' name='t_date' value='".$borrow['date']."'></label></td></tr>";
					$str.="<tr><td><label>時段：<input type='text' id='t_time' name='t_time' value='".$borrow['timeNo']."'></label></td></tr>";
					$str.="<tr><td><label>座位：<input type='text' id='t_desk' name='t_desk' value='".$borrow['deskNo']."'></label></td></tr>";
	              	$str.="<tr><td><label>確認：";
	              	if($borrow['check']=="ok"){
		              	$str.="<input type='radio' id='t_check' name='t_check' value='ok' checked/>ok";
		              	$str.="<input type='radio' id='t_check' name='t_check' value='not' />not</label></td></tr>";
	              	}else{
	              		$str.="<input type='radio' id='t_check' name='t_check' value='ok' />ok";
	              		$str.="<input type='radio' id='t_check' name='t_check' value='not' checked/>not</label></td></tr>";
	              	}
	              	$str.="<tr><td align='center'>
	              			<input type='button' value='修改' onclick='c_MDS(\"Modification\")'/>
	              			<input type='button' value='刪除' onclick='c_MDS(\"Delete\")'/></tr>";
	          		$str.="</table></frame>";
					echo $str;//回傳字串
					break;
				case 'Empty':
	                $str.="<frame>";
	          		$str.="<table id='s_table' align='center' border='1'>";
	              	$str.="<tr><td><label>學號：<input type='text' id='t_id' name='t_id' ></label></td></tr>";
	            	$str.="<tr><td><label>日期：<input type='text' id='t_date' name='t_date' value='".$_POST['select_date']."' readonly></label></td></tr>";
					$str.="<tr><td><label>時段：<input type='text' id='t_time' name='t_time' value='".$_POST['select_time']."' readonly></label></td></tr>";
					$str.="<tr><td><label>座位：<input type='text' id='t_desk' name='t_desk' value='".$_POST['select_no']."' readonly></label></td></tr>";
	              	$str.="<tr><td align='center'><input type='button' value='送出' onclick='c_MDS(\"Send\")'/></tr>";
	          		$str.="</table></frame>";
					echo $str;//回傳字串
					break;
			}
			break;
		case "MDS"://點選 變更表單
			switch ($_POST['s_status']) {
				case 'Send':
					$sql ="INSERT INTO `borrowdetail` (`studentID`, `deskNo`, `timeNo`, `date`)VALUES ('".$_POST['s_id']."', '".$_POST['s_desk']."', '".$_POST['s_time']."', '".$_POST['s_date']."' );";
					$result = mysql_query($sql);
					if($result){
						echo "預借成功!";//回傳字串
					}else{
						echo "預借失敗!";//回傳字串
					}
					break;
				case 'Modification':
					$sql ="UPDATE `borrowdetail` SET
							`studentID` = '".$_POST['s_id']."',
							`deskNo` = '".$_POST['s_desk']."',
							`timeNo` = '".$_POST['s_time']."',
							`date` = '".$_POST['s_date']."',
							`check` = '".$_POST['s_check']."'
							WHERE `borrowNo` = '".$_POST['s_no']."' ;";
					$result = mysql_query($sql);
					if($result){
						echo "修改成功!";//回傳字串
					}else{
						echo "修改失敗!";//回傳字串
					}
					break;
				case 'Delete':
					$sql ="DELETE FROM `borrowdetail`
							WHERE `borrowNo` = '".$_POST['s_no']."';";
					$result = mysql_query($sql);
					if($result){
						echo "刪除成功!";//回傳字串
					}else{
						echo "刪除失敗!";//回傳字串
					}
					break;
			}
			break;
		default:
			echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
			break;
	}
}
?>
