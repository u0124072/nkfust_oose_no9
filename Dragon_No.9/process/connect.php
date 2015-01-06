<?php session_start();
if($_SESSION['ID']==null){ //還未登入
	if($_POST['id']){ //如果id有值
		include("Dragon_No.9.inc.php");
		$id = $_POST['id'];
		$pw = $_POST['pw'];
		//搜尋資料庫資料
		$sql = "SELECT * FROM `student` where `ID` = '$id'";
		$result = mysql_query($sql);
		$student = mysql_fetch_array($result);//找出ID相符的學生
		$sql = "SELECT * FROM `adminer` where `ID` = '$id'";
		$result = mysql_query($sql);
		$adminer = mysql_fetch_array($result);//找出ID相符的管理員

		if($adminer[ID]==$id && $adminer[password]==$pw){//如果帳密符合管理員
			$_SESSION['ID'] = $id;//記錄ID
			$_SESSION['name']=$adminer['name'];//記錄name
		    switch ($adminer['rank']) {//判斷身分
	    	case "adminer"://是系統管理員
				$_SESSION['competence']="adminer";//記錄身分
				echo "<script language='JavaScript'>window.alert('".$_SESSION['name']."，您好！');</script>";
				echo "<script language='JavaScript'>window.location.replace('../adminerPage.php');</script>";//導向系統管理員頁面
	        	break;
	      	case "clerk"://是圖書館員
				$_SESSION['competence']="clerk";//記錄身分
				echo "<script language='JavaScript'>window.alert('".$_SESSION['name']."，您好！');</script>";
				echo "<script language='JavaScript'>window.location.replace('../clerkPage.php');</script>";//導向圖書館員頁面
	        	break;
		    }
		}else if($id!=null && $pw!=null && $student[ID]==$id && $student[password]==$pw ){//如果帳密不為空且符合學生
			$_SESSION['ID'] = $id;//記錄ID
			$_SESSION['name']=$student['name'];//記錄name
			$_SESSION['competence']="student";//記錄身分
			echo "<script language='JavaScript'>window.alert('".$_SESSION['name']."，您好！');</script>";
			echo "<script language='JavaScript'>window.location.replace('../studentPage.php');</script>";//導向使用者頁面
		}else{
			echo "<script language='JavaScript'>window.alert('登入失敗！');</script>";
			echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
		}
	}else{
		echo "<script language='JavaScript'>window.alert('登入失敗！');</script>";
		echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
	}
}else{
	echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}
?>

