<?php
	$sql = "SELECT * FROM `time`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="process/process_adminerTime.php" method="post" name="form3">
	<div style="text-align:center">
		<input type="submit" value="時段修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="時段刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"><span> |</span>
		<input type="button" id="t_add" value="+">
		<input type="submit" value="時段新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="t_overf">
		<table id="t_table" align="center" border="1">
			<tr>
				<td><input type='text' placeholder='搜尋編號' id='t_search_id' name='t_search_id' onkeyup='ChangeToTtable()' style='width:99px;background-color:#ffa'></td>
		 		<td><input type='text' placeholder='搜尋時段' id='t_search_time' name='t_search_time' onkeyup='ChangeToTtable()' style='width:120px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋開始時間' id='t_search_start' name='t_search_start' onkeyup='ChangeToTtable()' style='width:120px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋結束時間' id='t_search_end' name='t_search_end' onkeyup='ChangeToTtable()' style='width:120px;background-color:#ffa'></td></tr>
			<tr align="center">
				<td>時段編號</td><td>時段</td><td>開始時間</td><td>結束時間</td></tr>
			<?php
			for ($index=0 ; $index < $sn_index ; $index++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkT[] value='".$arr[$index]['timeID']."'/>".$arr[$index]['timeID']."</label></td>";
				echo "<td><input type='text' name='time".$arr[$index]['timeID']."' value='".$arr[$index]['time']."' style='width:120px;'/></td>";
				echo "<td><input type='text' name='time_start".$arr[$index]['timeID']."' value='".$arr[$index]['time_start']."' style='width:120px;'/></td>";
				echo "<td><input type='text' name='time_end".$arr[$index]['timeID']."' value='".$arr[$index]['time_end']."' style='width:120px;'/></td>";
				echo "</tr>";
			};
			?>
		</table>
	</div>
</form>

<script>
	function ChangeToTtable(){
		var num = document.getElementById("t_table").rows.length;
		 while(num >2) {
		  document.getElementById("t_table").deleteRow(-1);
		  num--;
		 }
		$.ajax({
			url: "process/process_adminerPageSearch.php",
			type: "POST",
			data: {t_id:$('#t_search_id').val(), t_time:$('#t_search_time').val(), t_start:$('#t_search_start').val(), t_end:$('#t_search_end').val(),choose:"time"},
			success: function(data){
				$('#t_table').append(data);
			}
		});
	};

	var t_Id = 1;
	$("#t_add").click(function () {
		var str="";
		str+="<tr align='center' id='t_row"+t_Id+"'>";
		str+="<td><input type='button' value='-' onclick='del_t_row("+t_Id+")'>";
		str+="<input type='text' name='add_t_ID[]' style='width:78px;'></td>";
		str+="<td><input type='text' name='add_t_time[]' style='width:120px;'></td>";
		str+="<td><input type='text' name='add_t_start[]' style='width:120px;'></td>";
		str+="<td><input type='text' name='add_t_end[]' style='width:120px;'></td></tr>";
		$("#t_table").append(str);
		t_Id++;
	});
	function del_t_row(id) {
		$("#t_row"+id).remove();
	}
</script>