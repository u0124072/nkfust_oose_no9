<?php session_start();
if($_SESSION['competence']!="student"){//非學生
  echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{
  if(isset($_POST['chkbx'])){//有核取
    include("Dragon_No.9.inc.php");
    $a=$_POST['chkbx'];
    for ($i=0;$i<count($a);$i++) {//多個核取跑迴圈
  	  $sql = "DELETE FROM `borrowdetail` WHERE `borrowNo` = ".$a[$i].";";
  	  //刪除相符的預借編號
      mysql_query($sql);
    }
    echo "<script language='JavaScript'>window.location.replace('../management.php')</script>";//回管理頁面
  }else{
    echo "<script language='JavaScript'>window.alert('未選取！');</script>";
    echo "<script language='JavaScript'>window.location.replace('../management.php')</script>";//回管理頁面
  }
}
?>