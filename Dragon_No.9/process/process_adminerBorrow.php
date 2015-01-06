<?php
	session_start();
	include("Dragon_No.9.inc.php");
	if(isset($_POST['chkB']) or $_POST['add_b_studentID']!=NULL){
		if($_POST['submit']=="預借修改"){
			$borrowNo=$_POST['chkB'];
			for ($i=0;$i<count($borrowNo);$i++) {
				$studentID_Temp="studentID".$borrowNo[$i];
				$studentID=$_POST[$studentID_Temp];
				$deskNo_Temp="deskNo".$borrowNo[$i];
				$deskNo=$_POST[$deskNo_Temp];
				$timeNo_Temp="timeNo".$borrowNo[$i];
				$timeNo=$_POST[$timeNo_Temp];
				$date_Temp="date".$borrowNo[$i];
				$date=$_POST[$date_Temp];
				$datea_Temp="datea".$borrowNo[$i];
				$datea=$_POST[$datea_Temp];
				$check_Temp="check".$borrowNo[$i];
				$check=$_POST[$check_Temp];

				$sql="UPDATE `borrowdetail` SET
						`borrowNo` = '".$borrowNo[$i]."',
						`studentID` = '".$studentID."',
						`deskNo` = '".$deskNo."',
						`timeNo` = '".$timeNo."',
						`date` = '".$date."',
						`datea` = '".$datea."',
						`check` = '".$check."'
						WHERE `borrowNo` = '".$borrowNo[$i]."';";
				echo $borrowNo[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="編號:".$borrowNo[$i]." 修改成功！\\n";
				}else{
					$str.="編號:".$borrowNo[$i]." 修改失敗！\\n";
				}
			}
		}else if($_POST['submit']=="預借刪除"){
			$borrowNo=$_POST['chkB'];
			for ($i=0;$i<count($borrowNo);$i++) {
				$sql = "DELETE FROM `borrowdetail`
						WHERE `borrowNo` = '".$borrowNo[$i]."';";
				echo $borrowNo[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="編號:".$borrowNo[$i]." 刪除成功！\\n";
				}else{
					$str.="編號:".$borrowNo[$i]." 刪除失敗！\\n";
				}
			}
		}else if($_POST['submit']=="預借新增"){
			$studentID=$_POST['add_b_studentID'];
			$deskNo=$_POST['add_b_deskNo'];
			$timeNo=$_POST['add_b_timeNo'];
			$date=$_POST['add_b_date'];
			foreach($studentID as $i=> $add_ID) {
				echo $studentID[$i]."<br>";
				if($add_ID!=null && $deskNo!=null && $timeNo!=null && $date!=null){
				 	$sql = "INSERT INTO `borrowdetail` (`studentID`, `deskNo`, `timeNo`, `date`) VALUES ('".$add_ID."','".$deskNo[$i]."','".$timeNo[$i]."','".$date[$i]."');";
					echo $add_ID[$i]."：".$sql."<br>";
					if(mysql_query($sql)){
						$str.="<".$i.">編號:".$borrowNo[$i]." 新增成功！\\n";
					}else{
						$str.="<".$i.">編號:".$borrowNo[$i]." 新增失敗！\\n";
					}
				}else{
					$str.="<".$i.">欄位不得為空！ 新增失敗！\\n";
				}
			}
		}else{
			echo "<script language='JavaScript'>window.alert('?');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";
		}
		echo "<script language='JavaScript'>window.alert('".$str."');</script>";
		echo "<script language='JavaScript'>window.location.replace('../adminerPage.php?tab=3');</script>";//回前頁
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
