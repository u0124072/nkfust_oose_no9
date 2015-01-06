<?php
	$sql = "SELECT * FROM `borrowdetail` ORDER BY `date`, `timeNo`, `studentID`, `timeNo`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>

<form action="process/process_adminerBorrow.php" method="post" name="form4">
	<div style="text-align:center">
		<input type="submit" value="預借修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="預借刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="reset">
		<span> |</span>
		<input type="button" value="selAll" onclick="selAll();">
		<input type="button" value="unselAll" onclick="unselAll();">
		<input type="button" value="usel" onclick="usel();">
		<span> |</span>
		<input type="button" id="b_add" value="+">
		<input type="submit" value="預借新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="b_overf">
		<table id="b_table" align="center" border="1">
			<tr>
				<td><input type='text' placeholder='搜尋預借編號' id='b_search_borrowNo' name='b_search_borrowNo' onkeyup='ChangeToBtable()' style='width:70px;background-color:#ffa'></td>
		 		<td><input type='text' placeholder='搜尋學號' id='b_search_studentID' name='b_search_studentID' onkeyup='ChangeToBtable()' style='width:70px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋書桌編號' id='b_search_deskNo' name='b_search_deskNo' onkeyup='ChangeToBtable()' style='width:70px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋時間編號' id='b_search_timeNo' name='b_search_timeNo' onkeyup='ChangeToBtable()' style='width:100px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋日期' id='b_search_date' name='b_search_date' onkeyup='ChangeToBtable()' style='width:70px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋預借時間' id='b_search_datea' name='b_search_datea' onkeyup='ChangeToBtable()' style='width:100px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋確認' id='b_search_check' name='b_search_check' onkeyup='ChangeToBtable()' style='width:50px;background-color:#ffa'></td></tr>
			<tr align="center">
				<td>預借編號</td><td>學號</td><td>書桌編號</td><td>時段編號</td><td>日期</td><td>預借時間</td><td>確認</td></tr>
			<?php
			for ($i=0 ; $i < $sn_index ; $i++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkB[] value='".$arr[$i]['borrowNo']."'/>".$arr[$i]['borrowNo']."</label></td>";
				echo "<td><input type='text' style='width:70px' name='studentID".$arr[$i]['borrowNo']."' value='".$arr[$i]['studentID']."'/></td>";
				echo "<td><input type='text' style='width:70px'name='deskNo".$arr[$i]['borrowNo']."' value='".$arr[$i]['deskNo']."'/></td>";

				echo "<td><select name='timeNo".$arr[$i]['borrowNo']."'>";
					$sql = "SELECT `timeNo` FROM `borrowdetail` where `borrowNo` = ".$arr[$i]['borrowNo'].";";
					$result = mysql_query($sql);
					$record =mysql_fetch_array($result);
					$sql = "SELECT * FROM `time`";
					$result = mysql_query($sql);
					while($time=mysql_fetch_array($result)){
						if( $record['timeNo']==$time['timeID']){
							echo "<option value='".$time['timeID']."' selected>".$time['time']."</option>";
						}else{
							echo "<option value='".$time['timeID']."'>".$time['time']."</option>";
						}
					}
				echo "</select></td>";

				echo "<td><input type='text' style='width:70px'name='date".$arr[$i]['borrowNo']."' value='".$arr[$i]['date']."'/></td>";
				echo "<td><input type='text' style='width:100px'name='datea".$arr[$i]['borrowNo']."' value='".$arr[$i]['datea']."'/></td>";

				echo "<td><select name='check".$arr[$i]['borrowNo']."'>";
				if( $arr[$i]['check']=="not"){
					echo "<option value='ok' >ok</option>";
					echo "<option value='not' selected>not</option>";
				}else if( $arr[$i]['check']=="ok"){
					echo "<option value='ok' selected>ok</option>";
					echo "<option value='not' >not</option>";
				}
					echo "</select></td>";
					echo "</tr>";
				};
			?>
		</table>
	</div>
</form>

<script>
	function ChangeToBtable(){
		var num = document.getElementById("b_table").rows.length;
		 while(num >2) {
		  document.getElementById("b_table").deleteRow(-1);
		  num--;
		 }
		$.ajax({
			url: "process/process_adminerPageSearch.php",
			type: "POST",
			data: {b_borrowNo:$('#b_search_borrowNo').val(), b_studentID:$('#b_search_studentID').val(), b_deskNo:$('#b_search_deskNo').val(), b_timeNo:$('#b_search_timeNo').val(), b_date:$('#b_search_date').val(), b_datea:$('#b_search_datea').val(), b_check:$('#b_search_check').val(),choose:"borrow"},
			success: function(data){
				$('#b_table').append(data);
			}
		});
	};

	var b_Id = 1;
	$("#b_add").click(function () {
		var str="";
		str+="<tr align='center' id='b_row"+b_Id+"'>";
		str+="<td><input type='button' value='-' onclick='del_b_row("+b_Id+")'>";
		str+="<td><select name='add_b_studentID[]' style='width:70px;'>";
		<?php
			$str="";
			$sql = "SELECT * FROM `student`";
			$result = mysql_query($sql);
			$str.= "<option value=''>請選擇</option>";
			while($stuednt=mysql_fetch_array($result)){
				$str.= "<option value='".$stuednt['ID']."'>".$stuednt['ID']."</option>";
			}
		?>
		str+= "<?php echo $str;?>";
		str+="<td><select name='add_b_deskNo[]' style='width:70px;'>";
		<?php
			$str="";
			$sql = "SELECT * FROM `desk`";
			$result = mysql_query($sql);
			$str.= "<option value=''>請選擇</option>";
			while($desk=mysql_fetch_array($result)){
				$str.= "<option value='".$desk['deskID']."'>".$desk['deskID']."</option>";
			}
		?>
		str+= "<?php echo $str;?>";
		str+= "</select></td>";
		str+="<td><select name='add_b_timeNo[]' style='width:100px;'>";
		<?php
			$str="";
			$sql = "SELECT * FROM `time`";
			$result = mysql_query($sql);
			$str.= "<option value=''>請選擇</option>";
			while($time=mysql_fetch_array($result)){
				$str.= "<option value='".$time['timeID']."'>".$time['time']."</option>";
			}
		?>
		str+= "<?php echo $str;?>";
		str+= "</select></td>";
		str+="<td><input type='text' name='add_b_date[]' style='width:70px;'></td>";
		str+="<td></td>";
		str+="<td></td></tr>";
		$("#b_table").append(str);
		b_Id++;
	});
	function del_b_row(id) {
		$("#b_row"+id).remove();
	}
	function selAll(){
		//變數checkItem為checkbox的集合
		var checkItem = document.getElementsByName("chkB[]");
		for(var i=0;i<checkItem.length;i++){
			checkItem[i].checked=true;
		}
	}
	function unselAll(){
		//變數checkItem為checkbox的集合
		var checkItem = document.getElementsByName("chkB[]");
		for(var i=0;i<checkItem.length;i++){
			checkItem[i].checked=false;
		}
	}
	function usel(){
		//變數checkItem為checkbox的集合
		var checkItem = document.getElementsByName("chkB[]");
		for(var i=0;i<checkItem.length;i++){
			checkItem[i].checked=!checkItem[i].checked;
		}
	}
</script>