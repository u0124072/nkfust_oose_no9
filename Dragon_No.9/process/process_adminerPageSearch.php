<?php
	session_start();
	include("Dragon_No.9.inc.php");
	switch ($_POST['choose']) {
		case 'student':
			if(isset($_POST['s_id']) or isset($_POST['s_name']) or isset($_POST['s_pw']) ){
				$id=$_POST['s_id'];
				$name=$_POST['s_name'];
				$pw=$_POST['s_pw'];
				$sql="SELECT * FROM `student` WHERE `ID` LIKE '%".$id."%' and `name` LIKE '%".$name."%' and `password` LIKE '%".$pw."%';";
				$result = mysql_query($sql);
				while($s_row=mysql_fetch_array($result)){
					$str.= "<tr align='left'>";
					$str.= "<td><label><input type=checkbox name=chkS[] value='".$s_row['ID']."'/>".$s_row['ID']."</label></td>";
					$str.= "<td><input type='text' name='name".$s_row['ID']."' value='".$s_row['name']."' style='width:120px;'/></td>";
					$str.= "<td><input type='text' name='password".$s_row['ID']."' value='".$s_row['password']."' style='width:120px;'/></td>";
					$str.= "</tr>";
				}
				echo $str;
			}
			break;
		case 'desk':
			if(isset($_POST['d_id']) or isset($_POST['d_type']) or isset($_POST['d_dist']) ){
				$id=$_POST['d_id'];
				$type=$_POST['d_type'];
				$dist=$_POST['d_dist'];
				$sql="SELECT * FROM `desk` WHERE `deskID` LIKE '%".$id."%' and `deskType` LIKE '%".$type."%' and `deskDist` LIKE '%".$dist."%';";
				$result = mysql_query($sql);
				while($d_row=mysql_fetch_array($result)){
					$str.= "<tr align='left'>";
					$str.= "<td><label><input type=checkbox name=chkD[] value='".$d_row['deskID']."'/>".$d_row['deskID']."</label></td>";
					$str.= "<td><input type='text' name='deskType".$d_row['deskID']."' value='".$d_row['deskType']."' style='width:120px;'/></td>";
					$str.= "<td><input type='text' name='deskDist".$d_row['deskID']."' value='".$d_row['deskDist']."' style='width:120px;'/></td>";
					$str.= "</tr>";
				}
				echo $str;
			}
			break;
		case 'time':
			if(isset($_POST['t_id']) or isset($_POST['t_time']) or isset($_POST['t_start']) or isset($_POST['t_end']) ){
				$id=$_POST['t_id'];
				$time=$_POST['t_time'];
				$start=$_POST['t_start'];
				$end=$_POST['t_end'];
				$sql="SELECT * FROM `time` WHERE `timeID` LIKE '%".$id."%' and `time` LIKE '%".$time."%' and `time_start` LIKE '%".$start."%' and `time_end` LIKE '%".$end."%';";
				$result = mysql_query($sql);
				while($t_row=mysql_fetch_array($result)){
					$str.= "<tr align='center'>";
					$str.= "<td><label><input type=checkbox name=chkT[] value='".$t_row['timeID']."'/>".$t_row['timeID']."</label></td>";
					$str.= "<td><input type='text' name='time".$t_row['timeID']."' value='".$t_row['time']."' style='width:120px;'/></td>";
					$str.= "<td><input type='text' name='time_start".$t_row['timeID']."' value='".$t_row['time_start']."' style='width:120px;'/></td>";
					$str.= "<td><input type='text' name='time_end".$t_row['timeID']."' value='".$t_row['time_end']."' style='width:120px;'/></td>";
					$str.= "</tr>";
				}
				echo $str;
			}
			break;
		case 'borrow':
			if(isset($_POST['b_borrowNo']) or isset($_POST['b_studentID']) or isset($_POST['b_deskNo']) or isset($_POST['b_timeNo']) or isset($_POST['b_date']) or isset($_POST['b_datea']) or isset($_POST['b_check'])){
				$borrowNo=$_POST['b_borrowNo'];
				$studentID=$_POST['b_studentID'];
				$deskNo=$_POST['b_deskNo'];
				$timeNo=$_POST['b_timeNo'];
				$date=$_POST['b_date'];
				$datea=$_POST['b_datea'];
				$check=$_POST['b_check'];
				$sql="SELECT * FROM `borrowdetail` WHERE `borrowNo` LIKE '%".$borrowNo."%' and `studentID` LIKE '%".$studentID."%' and `deskNo` LIKE '%".$deskNo."%' and `timeNo` LIKE '%".$timeNo."%' and `date` LIKE '%".$date."%' and `datea` LIKE '%".$datea."%' and `check` LIKE '%".$check."%' ORDER BY `date`, `timeNo`, `studentID`, `timeNo`;";
				$result = mysql_query($sql);
				while($b_row=mysql_fetch_array($result)){
					$str.= "<tr align='center'>";
					$str.= "<td><label><input type=checkbox name=chkB[] value='".$b_row['borrowNo']."' />".$b_row['borrowNo']."</label></td>";
					$str.= "<td><input type='text' name='studentID".$b_row['borrowNo']."' value='".$b_row['studentID']."' style='width:70px;'/></td>";
					$str.= "<td><input type='text' name='deskNo".$b_row['borrowNo']."' value='".$b_row['deskNo']."' style='width:70px;'/></td>";
					$str.= "<td><input type='text' name='timeNo".$b_row['borrowNo']."' value='".$b_row['timeNo']."' style='width:100px;'/></td>";
					$str.= "<td><input type='text' name='date".$b_row['borrowNo']."' value='".$b_row['date']."' style='width:70px;'/></td>";
					$str.= "<td><input type='text' name='datea".$b_row['borrowNo']."' value='".$b_row['datea']."' style='width:100px;'/></td>";
					$str.="<td><select name='check".$b_row['borrowNo']."' style='width:50px;'>";
					if( $b_row['check']=="not"){
						$str.= "<option value='ok' >ok</option>";
						$str.= "<option value='not' selected>not</option>";
					}else if( $b_row['check']=="ok"){
						$str.= "<option value='ok' selected>ok</option>";
						$str.= "<option value='not' >not</option>";
					}
					$str.= "</select></td>";
					$str.= "</tr>";
				}
				echo $str;
			}
			break;
		default:
			# code...
			break;
	}

?>
