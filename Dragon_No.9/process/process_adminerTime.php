<?php
	session_start();
	include("Dragon_No.9.inc.php");
	if(isset($_POST['chkT']) or $_POST['add_t_ID']!=NULL){
		if($_POST['submit']=="時段修改"){
			$timeID=$_POST['chkT'];
			for ($i=0;$i<count($timeID);$i++) {
				$time_Temp="time".$timeID[$i];
				$time_start_Temp="time_start".$timeID[$i];
				$time_end_Temp="time_end".$timeID[$i];
				$time=$_POST[$time_Temp];
				$time_start=$_POST[$time_start_Temp];
				$time_end=$_POST[$time_end_Temp];

				$sql="UPDATE `time` SET
					`timeID` = '".$timeID[$i]."',
					`time` = '".$time."',
					`time_start` = '".$time_start."',
					`time_end` = '".$time_end."'
					WHERE `timeID` = '".$timeID[$i]."';";
				echo $timeID[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="編號:".$timeID[$i]." 修改成功！\\n";
				}else{
					$str.="編號:".$timeID[$i]." 修改失敗！\\n";
				}
			}
		}else if($_POST['submit']=="時段刪除"){
			$timeID=$_POST['chkT'];
			for ($i=0;$i<count($timeID);$i++) {
				$sql = "DELETE FROM `time` WHERE `timeID` = '".$timeID[$i]."';";
				echo $timeID[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="編號:".$timeID[$i]." 刪除成功！\\n";
				}else{
					$str.="編號:".$timeID[$i]." 刪除失敗！\\n";
				}
			}
		}else if($_POST['submit']=="時段新增"){
			$ID=$_POST['add_t_ID'];
			$time=$_POST['add_t_time'];
			$start=$_POST['add_t_start'];
			$end=$_POST['add_t_end'];
			foreach($ID as $i=> $add_ID) {
				if($add_ID!=null){
				 	$sql = "INSERT INTO `time` (`timeID`,`time`,`time_start`,`time_end`) VALUES ('".$add_ID."','".$time[$i]."','".$start[$i]."','".$end[$i]."');";
					echo $ID[$i]."：".$sql."<br>";
					if(mysql_query($sql)){
						$str.="<".$i.">編號:".$timeID[$i]." 新增成功！\\n";
					}else{
						$str.="<".$i.">編號:".$timeID[$i]." 新增失敗！\\n";
					}
				}else{
					$str.="<".$i.">編號不得為空 新增失敗！\\n";
				}
			}
		}else{
			echo "<script language='JavaScript'>window.alert('?');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";
		}
		echo "<script language='JavaScript'>window.alert('".$str."');</script>";
		echo "<script language='JavaScript'>window.location.replace('../adminerPage.php?tab=2');</script>";//回前頁
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
