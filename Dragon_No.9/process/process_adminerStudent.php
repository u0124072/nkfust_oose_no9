<?php
	session_start();
	include("Dragon_No.9.inc.php");
	if(isset($_POST['chkS']) or $_POST['add_s_ID']!=NULL){
		if($_POST['submit']=="學生修改"){
			$ID=$_POST['chkS'];
			for ($i=0;$i<count($ID);$i++) {
				$name_Temp="name".$ID[$i];
				$password_Temp="password".$ID[$i];
				$name=$_POST[$name_Temp];
				$password=$_POST[$password_Temp];
				$sql="UPDATE `student` SET `ID`='".$ID[$i]."',`name`='".$name."',`password`='".$password."' WHERE `ID`='".$ID[$i]."';";
				echo $ID[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="學號:".$ID[$i]." 修改成功！\\n";
		 		}else{
					$str.="學號:".$ID[$i]." 修改失敗！\\n";
				}
			}
		}else if($_POST['submit']=="學生刪除"){
			$ID=$_POST['chkS'];
			for ($i=0;$i<count($ID);$i++) {
				$sql = "DELETE FROM `student` WHERE `ID`='".$ID[$i]."';";
				echo $ID[$i]."：".$sql."<br>";
				if(mysql_query($sql)){
					$str.="學號:".$ID[$i]." 刪除成功！\\n";
				}else{
					$str.="學號:".$ID[$i]." 刪除失敗！\\n";
				}
			}
		}else if($_POST['submit']=="學生新增"){
			$ID=$_POST['add_s_ID'];
			$name=$_POST['add_s_name'];
			$PW=$_POST['add_s_PW'];
			foreach($ID as $i=> $add_ID) {
				if($add_ID!=null){
				 	$sql = "INSERT INTO `student` (`ID`,`name`,`password`) VALUES ('".$add_ID."','".$name[$i]."','".$PW[$i]."');";
				 	echo $ID[$i]."：".$sql."<br>";
					if(mysql_query($sql)){
						$str.="<".$i.">學號:".$ID[$i]." 新增成功！\\n";
					}else{
						$str.="<".$i.">學號:".$ID[$i]." 新增失敗！\\n";
					}
				}else{
					$str.="<".$i.">學號不得為空 新增失敗！\\n";
				}
			}
		}else{
			echo "<script language='JavaScript'>window.alert('?');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";
		}
		echo "<script language='JavaScript'>window.alert('".$str."');</script>";
		echo "<script language='JavaScript'>window.location.replace('../adminerPage.php?tab=0');</script>";//回前頁
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
