<?php
	$sql = "SELECT * FROM `student`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="process/process_adminerStudent.php" method="post" name="form1">
	<div style="text-align:center">
		<input type="submit" value="學生修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="學生刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"><span> |</span>
		<input type="button" id="s_add" value="+">
		<input type="submit" value="學生新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="s_overf">
		<table id="s_table" align="center" border="1">
			<tr>
				<td><input type='text' placeholder='搜尋學號' id='s_search_id' name='s_search_id' onkeyup='ChangeToStable()' style='width:120px;background-color:#ffa'></td>
		 		<td><input type='text' placeholder='搜尋姓名' id='s_search_name' name='s_search_name' onkeyup='ChangeToStable()' style='width:120px;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋密碼' id='s_search_pw' name='s_search_pw' onkeyup='ChangeToStable()' style='width:120px;background-color:#ffa'></td></tr>
			<tr align="center">
				<td>學號</td><td>姓名</td><td>密碼</td></tr>
			<?php
			for ($index=0 ; $index < $sn_index ; $index++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkS[] value='".$arr[$index]['ID']."'/>".$arr[$index]['ID']."</label></td>";
				echo "<td><input type='text' name='name".$arr[$index]['ID']."' value='".$arr[$index]['name']."' style='width:120px;'/></td>";
				echo "<td><input type='text' name='password".$arr[$index]['ID']."' value='".$arr[$index]['password']."' style='width:120px;'/></td>";
				echo "</tr>";
			};
			?>
		</table>
	</div>
</form>

<script>
	function ChangeToStable(){
		var num = document.getElementById("s_table").rows.length;
		 while(num >2) {
		  document.getElementById("s_table").deleteRow(-1);
		  num--;
		 }
		$.ajax({
			url: "process/process_adminerPageSearch.php",
			type: "POST",
			data: {s_id:$('#s_search_id').val(), s_name:$('#s_search_name').val(), s_pw:$('#s_search_pw').val(),choose:"student"},
			success: function(data){
				$('#s_table').append(data);
			}
		});
	};

	var s_Id = 1;
	$("#s_add").click(function () {
		var str="";
		var qq="value=value.replace(/[^-_a-zA-Z0-9]/g,'')";
		str+="<tr align='center' id='s_row"+s_Id+"'>";
		str+="<td><input type='button' value='-' onclick='del_s_row("+s_Id+")'>";
		str+="<input type='text' name='add_s_ID[]' maxlength='8' onkeyup="+qq+" style='width:100px;'></td>";
		str+="<td><input type='text' name='add_s_name[]' maxlength='10' style='width:120px;'></td>";
		str+="<td><input type='text' name='add_s_PW[]' maxlength='12' style='width:120px;'></td></tr>";
		$("#s_table").append(str);
		s_Id++;
	});
	function del_s_row(id) {
		$("#s_row"+id).remove();
	}
</script>

<!-- 	$("#s_search").click(function () {
		switch(document.getElementById('s_search').value){
		case"查詢":
				var tableObj=document.getElementById("s_table");
				var trObj=tableObj.insertRow(0);
				var trObj1=trObj.insertCell(0);
				var trObj2=trObj.insertCell(1);
				var trObj3=trObj.insertCell(2);
				trObj1.innerHTML="<input type='text' id='s_search_id' name='s_search_id' onkeyup='ChangeToStable()' placeholder='搜尋學號' style='background-color:#ffa'>";
				trObj2.innerHTML="<input type='text' id='s_search_name' name='s_search_name' onkeyup='ChangeToStable()' placeholder='搜尋姓名' style='background-color:#ffa'>";
				trObj3.innerHTML="<input type='text' id='s_search_pw' name='s_search_pw' onkeyup='ChangeToStable()' placeholder='搜尋密碼' style='background-color:#ffa'>";
				document.getElementById( 's_search' ).value = "關閉";
				document.getElementById( 's_add' ).disabled = true;

				for(var i=0;i<s_Id;i++){
					$("#s_row"+i).remove();
				}
			break;
		case "關閉":
				document.getElementById( 's_search' ).value = "查詢";
				document.getElementById( 's_add' ).disabled = false;
				document.getElementById("s_table").deleteRow(0);
				// document.getElementById('s_search_close').setAttribute("id","s_search_open");
			break;
	  }
	}); -->
