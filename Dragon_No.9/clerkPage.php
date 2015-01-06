<?php session_start();
if($_SESSION['competence']!="clerk"){//非系統管理員
  echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}else{ ?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>讀書空間預借系統-圖書館員頁面</title>
    <!--基本樣式-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <!--網頁頁籤_abgne_tab-->
    <link rel="stylesheet" type="text/css" href="css/abgne-block.css">
    <script type="text/javascript" src="js/abgne-block.js"></script>
    <script type="text/javascript" src="js/jquery.jget.js"></script>
    <!--燈箱效果_fancybox-->
    <!-- Add fancyBox main JS and CSS files -->
    <link rel="stylesheet" type="text/css" href="css/fancybox/fancybox.css">
    <script type="text/javascript" src="js/fancybox/fancybox.js"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="js/fancybox/mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox({
        prevEffect  : 'none',
        nextEffect  : 'none',
        });
      });
    </script>

    <!--日曆-->
    <script src="js/JSCal2-1.7/jscal2.js"></script>
    <script src="js/JSCal2-1.7/lang/b5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/JSCal2-1.7/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="css/JSCal2-1.7/border-radius.css" />
    <link id="skin-gold" title="Gold" type="text/css" rel="stylesheet" href="css/JSCal2-1.7/gold/gold.css" />

    <style type="text/css">
      .desk{
        height: 40px;
        width: 40px;
        background-color: rgb(255,255,255);
        margin: 5px;
        padding: 5px;
        display:inline;
        cursor: pointer;
      }
      .desk_br{background-color: #FFFF99;}
      .desk_br span{color:red; font;font-weight: bold;}
      .desk_r{border: 2px outset red;}
      .desk_g{border: 2px outset green;}
    </style>


    <!--卷軸呈現-->
    <style type="text/css">
      .overf{
        overflow:scroll;overflow-x:visible;margin:0 auto;width:700px;height:300px;
      }
    </style>
    <script>
      $(document).ready(function(){
        $('#select_date').change(ChangeToTime);//下拉日期變動 改變時段
        $('#select_time').change(ChangeToDesk);//下拉時段變動 改變座位表
      });
      function ChangeToTime(){//改變時段
        $.ajax({
          url:"process/process_clerk.php",
          type:"POST",
          data:{select_date: $('#select_date').val(),choose:"date"},//傳送所選擇日期並告知日期變動
          success: function(data){
            $('#select_time').empty();//時段清空
            $('#show_desk').empty();//座位表清空
            $('#show_table').empty();//座位表清空
            $('#select_time').append("<option value=''>請選擇</option>")
            $('#select_time').append(data);//增加回傳的時段

          }
        });
      };
      function ChangeToDesk(){//改變座位表
        $.ajax({
          url:"process/process_clerk.php",
          type:"POST",
          data:{select_date: $('#select_date').val(),select_time: $('#select_time').val(),choose:"time"},//傳送所選擇日期與時段並告知時段變動
          success: function(data){
            $('#show_desk').empty();//座位表清空
            $('#show_table').empty();//座位表清空
            $('#show_desk').append(data);//增加回傳的座位表
          }
        });
      };

      function ChangeToTable_L(s_no,s_status){//改變表單
        $.ajax({
          url:"process/process_clerk.php",
          type:"POST",
          data:{select_no:s_no ,select_status:s_status,choose:"table"},//傳送所選擇日期與時段並告知時段變動
          success: function(data){
            $('#show_table').empty();//座位表清空
            $('#show_table').append(data);//增加回傳的座位表
          }
        });
      };

      function ChangeToTable_E(s_no, s_time, s_date, s_status){//改變表單
        $.ajax({
          url:"process/process_clerk.php",
          type:"POST",
          data:{select_no:s_no ,select_time:s_time,select_date:s_date,select_status:s_status,choose:"table"},//傳送所選擇日期與時段並告知時段變動
          success: function(data){
            $('#show_table').empty();//座位表清空
            $('#show_table').append(data);//增加回傳的座位表
          }
        });
      };

      function c_MDS(t_status){//修改
        $.ajax({
          url:"process/process_clerk.php",
          type:"POST",
          data:{s_no:$('#t_no').val(), s_id:$('#t_id').val(),s_date:$('#t_date').val(), s_time:$('#t_time').val(), s_desk:$('#t_desk').val(), s_check:$('input:radio:checked[name="t_check"]').val(), s_status:t_status, choose:"MDS"},//傳送所選擇日期與時段並告知時段變動
          success: function(data){
            alert(data);
            ChangeToDesk();
          }
        });
      };
    </script>
  </head>
  <body>
  <div class="container">
      <?php
      include("process/Dragon_No.9.inc.php");
      //搜尋資料庫找出名字並顯示
      $sql = "SELECT `name` FROM `adminer` WHERE `ID` = '".$_SESSION['ID']."';";
      $result = mysql_query($sql);
      $clerk = mysql_fetch_array($result);
      ?>
      <div style="text-align:left; padding:10px;">
        <span>管理員：<?php echo $clerk[name];?></span></div>
      <div style="text-align:right; padding-right:40px;">
        <input type="button" value="登出" onclick="if(confirm('確定登出?'))
          return window.location.replace('process/logout.php') ;else return false;">
      </div>
      <div class="content">
      <div style="margin:10 auto 0 auto;text-align:left;width:250px; height:50px;">

        <span>日期：</span>
        <input type="text" id="select_date" name="select_date" size="10" >
        <input type="button" value="..." id="BTN" name="BTN"><br>

        <span>時段：</span>
        <select id="select_time" name="select_time"><!--下拉時段-->
          <option value="">請先選擇日期</option>
        </select><br>
      </div>
      <div style="margin:0 auto;text-align:center ;width:700px;">
        <div id="show_desk"></div><br><!--顯示座位表-->
        <div id="show_table"></div>
      </div>
    </div> <!-- end .content -->
  </div> <!-- end .container -->
  </body>
  </html>
<?php } ?>


<script type="text/javascript">
    new Calendar({
        inputField: "select_date",
        dateFormat: "%Y-%m-%d",
        trigger: "BTN",
        bottomBar: true,
        //weekNumbers: false,
        //showTime: 24,
        onSelect: function() {this.hide(); ChangeToTime();}
    });
</script>