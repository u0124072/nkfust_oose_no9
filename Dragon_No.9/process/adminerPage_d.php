<?php
	$sql = "SELECT * FROM `desk`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="process/process_adminerDesk.php" method="post" name="form2">
	<div style="text-align:center">
		<input type="submit" value="書桌修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="書桌刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"><span> |</span>
		<input type="button" id="d_add" value="+">
		<input type="submit" value="書桌新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="d_overf">
		<table id="d_table" align="center" border="1">
			<tr>
				<td><input type='text' placeholder='搜尋編號' id='d_search_id' name='d_search_id' onkeyup='ChangeToDtable()' style='width:120px;background-color:#ffa'></td>
		 		<td><input type='text' placeholder='搜尋規格' id='d_search_type' name='d_search_type' onkeyup='ChangeToDtable()' style='width:120px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋區域' id='d_search_dist' name='d_search_dist' onkeyup='ChangeToDtable()' style='width:120px;background-color:#ffa'></td></tr>
			<tr align="center">
				<td>書桌編號</td><td>書桌規格</td><td>書桌區域</td></tr>
			<?php
			for ($index=0 ; $index < $sn_index ; $index++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkD[] value='".$arr[$index]['deskID']."'/>".$arr[$index]['deskID']."</label></td>";
				echo "<td><input type='text' name='deskType".$arr[$index]['deskID']."' value='".$arr[$index]['deskType']."' style='width:120px;'/></td>";
				echo "<td><input type='text' name='deskDist".$arr[$index]['deskID']."' value='".$arr[$index]['deskDist']."' style='width:120px;'/></td>";
				echo "</tr>";
			};
			?>
		</table>
	</div>
</form>

<script>
	function ChangeToDtable(){
		var num = document.getElementById("d_table").rows.length;
		 while(num >2) {
		  document.getElementById("d_table").deleteRow(-1);
		  num--;
		 }
		$.ajax({
			url: "process/process_adminerPageSearch.php",
			type: "POST",
			data: {d_id:$('#d_search_id').val(), d_type:$('#d_search_type').val(), d_dist:$('#d_search_dist').val(),choose:"desk"},
			success: function(data){
				$('#d_table').append(data);
			}
		});
	};

	var d_Id = 1;
	$("#d_add").click(function () {
		var str="";
		str+="<tr align='center' id='d_row"+d_Id+"'>";
		str+="<td><input type='button' value='-' onclick='del_d_row("+d_Id+")'>";
		str+="<td><input type='text' name='add_d_Type[]' style='width:120px;'></td>";
		str+="<td><input type='text' name='add_d_Dist[]' style='width:120px;'></td></tr>";
		$("#d_table").append(str);
		d_Id++;
	});
	function del_d_row(id) {
		$("#d_row"+id).remove();
	}
</script>