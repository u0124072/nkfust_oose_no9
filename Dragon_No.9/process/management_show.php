<?php session_start();
if($_SESSION['competence']!="student"){//非學生
  echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{
  include("Dragon_No.9.inc.php");
  $id=$_SESSION['ID']; //取得使用者ID存入變數
  $today=date('Y-m-d'); //取得今日日期
  $sql = "SELECT * FROM `borrowdetail` WHERE `studentID` = '$id' AND `date` >='$today'  AND `check` = 'not' ORDER BY `date`, `timeNo`;";//找出日期>=今日且與使用者ID相符的預借明細
  $result = mysql_query($sql);
  $sn_index=mysql_num_rows($result);
  for($index=0;$index<$sn_index;$index++){
    $arr[$index]=mysql_fetch_array($result);//存入二維陣列
  };
  for ($index=0;$index<$sn_index;$index++){
    //將預借明細的時段代號 轉成時段
    $sql ="SELECT * FROM `time` WHERE `timeID` =(SELECT `timeNo` FROM `borrowdetail` WHERE `borrowNo`=".$arr[$index]['borrowNo']." AND `studentID` = '$id')";
    $result =mysql_query($sql);
    $time =mysql_fetch_array($result);
    $now =date('H:i:s');//取得現在時間
    if ($today==$arr[$index]['date'] && $now>$time[time_end]){//如果同天 現在時間大於時段 則鎖定核取方塊並轉成紅字
      echo "<tr align='center' style='color:red;'><td><input type=checkbox name=chkbx[] disabled></td>";
    }else{ //否則就正常印出
      echo "<tr align='center'><td><input type=checkbox name=chkbx[] value=".$arr[$index]['borrowNo']."></td>";
    }
    echo "<td>".$arr[$index]['deskNo']."</td>";//印座位編號
    echo "<td>".$time['time']."</td>";//印時段
    echo "<td>".$arr[$index]['date']."</td></tr>";//印日期
  }
}
?>