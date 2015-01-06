<?php
	session_start();
	include("Dragon_No.9.inc.php");
	if(isset($_POST['chkD']) or $_POST['add_d_Type']!=NULL){
		if($_POST['submit']=="書桌修改"){
			$deskID=$_POST['chkD'];
			for ($i=0;$i<count($deskID);$i++) {
				$deskType_Temp="deskType".$deskID[$i];
				$deskDist_Temp="deskDist".$deskID[$i];
				$deskDist=$_POST[$deskDist_Temp];
				$deskType=$_POST[$deskType_Temp];
		 		$sql="UPDATE `desk` SET
					`deskID` = '".$deskID[$i]."',
					`deskType` = '".$deskType."',
					`deskDist` = '".$deskDist."'
					WHERE `deskID` = '".$deskID[$i]."';";
				echo $deskID[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="編號:".$deskID[$i]." 修改成功！\\n";
		 		}else{
					$str.="編號:".$deskID[$i]." 修改失敗！\\n";
				}
			}
		}else if($_POST['submit']=="書桌刪除"){
			$deskID=$_POST['chkD'];
			for ($i=0;$i<count($deskID);$i++) {
				$sql = "DELETE FROM `desk` WHERE `deskID` = '".$deskID[$i]."';";
				echo $deskID[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="編號:".$deskID[$i]." 刪除成功！\\n";
		 		}else{
					$str.="編號:".$deskID[$i]." 刪除失敗！\\n";
				}
			}
		}else if($_POST['submit']=="書桌新增"){
			$Type=$_POST['add_d_Type'];
			$Dist=$_POST['add_d_Dist'];
			foreach($Type as $i=> $add_Type) {
				if($add_Type!=null && $Dist[$i]!=null){
				 	$sql = "INSERT INTO `desk` (`deskType`, `deskDist`) VALUES ('".$Type[$i]."', '".$Dist[$i]."');";
					echo $i."：".$sql."<br>";
					if(mysql_query($sql)){
						$str.="<".$i."> 修改成功！\\n";
			 		}else{
						$str.="<".$i."> 修改失敗！\\n";
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
		echo "<script language='JavaScript'>window.location.replace('../adminerPage.php?tab=1');</script>";//回前頁
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
