#小組名稱:Dragon_No.9

**小組成員:**

- 0124024 呂忠祐
- 0124040 劉竹信
- 0124002 馬萱如
- 0124072 翁紫軒

##專題題目:讀書空間預借系統

**壹、動機**

　　每到了學期中或學期末的時候，圖書館的座位可以說是一位難求，導致許多學生會到了圖書館卻沒位置，或是學生在開館前就在圖書館外排隊的情況。讀書時間分秒必爭，卻因此造成時間浪費的困擾；定力較不足的同學，在家中念書的效果常受到電視、電腦等外在因素的影響而不彰。
希望能藉由這個系統省去時間與空間的麻煩，創造一個更舒適且友善的讀書空間。

**貳、利害人關係目標表**

<table border="0">
  <tr>
    <th>利害關係人（參與者）</th>
    <th>目標</th>
  </tr>
  <tr>
    <td>會員</td>
    <td>
      1.使他們能夠節省時間，避免現場排隊。<br>
      2.使其空間能夠做到最完善的運用。<br>
      3.擁有舒適安靜的讀書環境。</td>
  </tr>
  <tr>
    <td>網站資料庫管理員</td>
    <td>
      1.維護每位會員權益。<br>
    	2.有效控管網站安全。<br>
      3.確保網路流暢。</td>
  </tr>
  <tr>
    <td>圖書管員</td>
    <td>
      1.即時掌握各空間的使用。<br>
      2.維護讀書環境。</td>
  </tr>
</table>

**參、事件與使用案例對照表**

| 事件名稱                 | 使用案例名稱     |
|:-------------------------|:-----------------|
| 建立與修改使用者資料     | 會員基本資料作業 |
| 登記預借桌號紀錄         | 書桌編號作業     |
| 使用者預訂讀書空間       | 處理預訂紀錄     |
| 使用者登記預借的讀書空間 | 登記預借作業     |
| 使用者取消預借的讀書空間 | 取消預借作業     |
| 使用者查詢預借紀錄       | 紀錄查詢作業     |

**肆、使用案例圖**

<p><img src="http://i.imgur.com/lgm7Xo4.png?1" title="使用案例圖" /></p>

**伍、個別使用案例的描述**

<table border="1" align="left">
  <tr>
    <td width="170"><b>使用案例名稱</b></td>
    <td colspan=2>會員基本資料作業。</td>
  </tr>
  <tr>
    <td><b>使用案例描述</b></td>
    <td colspan=2>當有新生入學時，網路資料庫管理員啟動系統新增、修改或刪除會員基本資料。</td>
  </tr>
  <tr>
    <td><b>主要參與者</b></td>
    <td colspan=2>網路資料庫管理員。</td>
  </tr>    
  <tr>
    <td><b>利害關係人與目標</b></td>
    <td colspan=2>能夠正確紀錄會員基本資料。</td>
  </tr>  
  <tr>
    <td><b>前置條件</b></td>
    <td colspan=2>無。</td>
  </tr>   
  <tr>
    <td><b>後置條件</b></td>
    <td colspan=2>正確建立、修改或刪除會員基本資料。</td>
  </tr>       
  <tr>
    <td rowspan=2><b>主要成功情節</b></td>
    <th>參與者</th>
    <th>系統</th>
  </tr>       
  <tr align="left" valign="top">
    <td>1.當有新生加入時，資料庫管理員進入會員基本資料作業系統，新增會員資料。<br>
        2.資料庫管理員輸入學生基本資料，包括學號、姓名跟預設密碼。<br><br>
        3.資料庫管理員需人工檢查資料正確性，若要取消編輯按取消鍵。<br>
        4.輸入完畢後，選取儲存按鍵或者取消鍵。<br><br>
        系統重複1-4的動作。<br><br>
        5.若要進行修改，選取修改鍵查詢欲修改的資料，修改完畢按確認或取消。<br><br>
        6.若要進行刪除，選取刪除鍵查詢欲刪除的資料，修改完畢按確認或取消。<br>
    </td>
    <td>1.1系統開啟新增新會員資基本資料畫面。<br><br><br>
        2.1系統檢查輸入資料格式，如果有誤要求重新輸入。檢查是否有重複學號，如果有，顯示”重複學號”訊息。<br>
        3.1如果按取消鍵，系統回至新增畫面。<br><br>
        4.1選取儲存按鍵，系統將輸入的資料存入資料庫，按離開鍵則回到會員基本資料作業畫面。<br><br><br><br>
        5.1根據輸入欲查詢的資料搜尋會員紀錄並顯示至畫面。<br>
        5.2選取儲存鍵儲存會員資料，若按取消鍵則回到會員基本資料作業畫面。<br>
        6.1根據輸入欲查詢的資料搜尋會員紀錄並顯示至畫面。<br>
        6.2出現確認訊息視窗，按確認進行刪除動作，按取消則不做刪除動作。<br>
        6.3回到會員基本資料作業畫面。<br>
    </td>
  </tr> 
  <tr>
    <td><b>例外情節</b></td>
    <td colspan=2>*a.如果有欄位無法輸入，或資料無法儲存，系統需要顯示警告訊息並終止輸入。</td>
  </tr>  
  <tr>
    <td><b>其他需求</b></td>
    <td colspan=2>無。</td>
  </tr>  
</table>
<table border="1" align="left">
  <tr>
    <td width="170"><b>使用案例名稱</b></td>
    <td colspan=2>書桌編號作業。</td>
  </tr>
  <tr>
    <td><b>使用案例描述</b></td>
    <td colspan=2>新增、建立與修改書桌編號。</td>
  </tr>
  <tr>
    <td><b>主要參與者</b></td>
    <td colspan=2>網路資料庫管理員。</td>
  </tr>    
  <tr>
    <td><b>利害關係人與目標</b></td>
    <td colspan=2>能夠正確記錄書桌編號。</td>
  </tr>  
  <tr>
    <td><b>前置條件</b></td>
    <td colspan=2>無。</td>
  </tr>   
  <tr>
    <td><b>後置條件</b></td>
    <td colspan=2>正確建立、修改或刪除書桌編號。</td>
  </tr>       
  <tr>
    <td rowspan=2><b>主要成功情節</b></td>
    <th>參與者</th>
    <th>系統</th>
  </tr>       
  <tr align="left" valign="top">
    <td>1.當要增加書桌數量時，網路資料管理員進入書桌編號作業並啟動新增按鍵。<br>
        2.人員輸入書桌編號。<br><br><br>
        3.輸入完畢後，選取儲存按鍵或者取消鍵。<br><br>
        系統重複1-3的動作。<br><br>
        4.若要進行修改，選取修改鍵查詢欲修改的資料，修改完畢按確認或取消。<br><br>
        5.若要進行刪除，選取刪除鍵查詢欲刪除的資料，修改完畢按確認或取消。<br>
    </td>
    <td>1.1系統開啟新增書桌編號 資料。<br><br><br>
        2.1系統檢查輸入資料格式，如果有誤要求重新輸入。檢查是否有重複編號，如果有，顯示”重複編號”訊息。<br>
        3.1選取儲存按鍵，系統將輸入的資料存入資料庫。<br><br><br><br><br>
        4.1根據輸入欲查詢的資料搜尋書桌編號紀錄並顯示至畫面。<br>
        4.2選取修改鍵修改書桌編號資料，若按取消鍵則回到書桌編號作業畫面。<br>
        5.1根據輸入欲查詢的資料搜尋會員紀錄並顯示至畫面。<br>
        5.2出現確認訊息視窗，按確認進行刪除動作，按取消則不做刪除動作。<br>
        5.3回到書桌編號作業畫面。<br>
    </td>
  </tr> 
  <tr>
    <td><b>例外情節</b></td>
    <td colspan=2>*a.如果有欄位無法輸入，或資料無法儲存，系統需要顯示警告訊息並終止輸入。</td>
  </tr>  
  <tr>
    <td><b>其他需求</b></td>
    <td colspan=2>無。</td>
  </tr>  
</table>
<table border="1" align="left">
  <tr>
    <td width="170"><b>使用案例名稱</b></td>
    <td colspan=2>登記預借作業。</td>
  </tr>
  <tr>
    <td><b>使用案例描述</b></td>
    <td colspan=2>建立預借資料。</td>
  </tr>
  <tr>
    <td><b>主要參與者</b></td>
    <td colspan=2>會員。</td>
  </tr>    
  <tr>
    <td><b>利害關係人與目標</b></td>
    <td colspan=2>能夠正確登記預借資料。</td>
  </tr>  
  <tr>
    <td><b>前置條件</b></td>
    <td colspan=2>必須是會員。</td>
  </tr>   
  <tr>
    <td><b>後置條件</b></td>
    <td colspan=2>正確建立預借資料。</td>
  </tr>       
  <tr>
    <td rowspan=2><b>主要成功情節</b></td>
    <th>參與者</th>
    <th>系統</th>
  </tr>       
  <tr align="left" valign="top">
    <td>1.會員輸入帳號密碼。<br><br>
        2.當有會員登記欲借座位時，會員進入登記預借畫面，建立預借資料。<br>
        3.會員須人工檢查預借資料是否正確。<br>
    </td>
    <td>1.1系統檢查輸入資料格式，如果有誤要求重新輸入。<br>
        2.1系統開啟建立預借畫面。<br><br>
        3.1預借成功，系統則出現”預借成功”，並顯示詳細的預借資料。<br>
    </td>
  </tr> 
  <tr>
    <td><b>例外情節</b></td>
    <td colspan=2>*a.如果有欄位無法輸入，或資料無法儲存，系統需要顯示警告訊息並終止輸入。</td>
  </tr>  
  <tr>
    <td><b>其他需求</b></td>
    <td colspan=2>無。</td>
  </tr>  
</table>
<table border="1" align="left">
  <tr>
    <td width="170"><b>使用案例名稱</b></td>
    <td colspan=2>處理預訂紀錄。</td>
  </tr>
  <tr>
    <td><b>使用案例描述</b></td>
    <td colspan=2>當會員登入預借讀書空間，系統儲存並產生預借紀錄。</td>
  </tr>
  <tr>
    <td><b>主要參與者</b></td>
    <td colspan=2>會員。</td>
  </tr>    
  <tr>
    <td><b>利害關係人與目標</b></td>
    <td colspan=2>會員:正確建立、修改及刪除預借資料。</td>
  </tr>  
  <tr>
    <td><b>前置條件</b></td>
    <td colspan=2>無。</td>
  </tr>   
  <tr>
    <td><b>後置條件</b></td>
    <td colspan=2>正確建立、修改即刪除預借資料。</td>
  </tr>       
  <tr>
    <td rowspan=2><b>主要成功情節</b></td>
    <th>參與者</th>
    <th>系統</th>
  </tr>       
  <tr align="left" valign="top">
    <td>1.當會員登入系統登記預借讀書空間，系統儲存並產生預借紀錄。<br>
        2.會員輸入帳號密碼登入。<br>
        3.會員輸入欲預借/取消/修改之讀書空間。<br>
        4.輸入讀書空間編號；若要取消/修改則按取消/修改按鍵。<br><br>
        重複3，直到按結束鍵<br><br>
        5.輸入完畢，按儲存鍵。<br>
        6.若要進行修改，按修改鍵，選取欲修改之資料進行修改。<br>
        7.修改完畢後，按確認或取消鍵。<br><br>
        8.若要進行刪除選取刪除鍵，選取欲刪除之資料進行刪除。<br>
    </td>
    <td>1.1系統開啟新增預借輸入畫面。<br><br>
        2.1系統讀取會員資料，並顯示畫面。<br>
        3.1系統新增新的預借資料。<br><br>
        4.1系統檢查欲借空間編號及出借與否，有錯誤時，系統要求重新輸入。<br>
        4.2若空間已被預借，則顯示「讀書空間已被預借」之訊息。<br>
        5.1系統將新資料存入資料庫。<br>
        6.1系統讀取欲修改之資料。<br><br>
        7.1選取確認鍵，儲存預借紀錄；若按取消鍵，則回到預借作業畫面。<br>
        8.1讀取欲刪除之資料，並顯示至畫面。<br>
        8.2出現訊息確認窗，按確認進行刪除動作，按取消則不做刪除動作。<br>
        8.3回到預借系統畫面。<br>
    </td>
  </tr> 
  <tr>
    <td><b>例外情節</b></td>
    <td colspan=2>*a.如果有欄位無法輸入，或資料無法儲存，系統需要顯示警告訊息並終止輸入。</td>
  </tr>  
  <tr>
    <td><b>其他需求</b></td>
    <td colspan=2>無。</td>
  </tr>  
</table>
<table border="1" align="left">
  <tr>
    <td width="170"><b>使用案例名稱</b></td>
    <td colspan=2>取消預借作業。</td>
  </tr>
  <tr>
    <td><b>使用案例描述</b></td>
    <td colspan=2>取消預借資料。</td>
  </tr>
  <tr>
    <td><b>主要參與者</b></td>
    <td colspan=2>會員。</td>
  </tr>    
  <tr>
    <td><b>利害關係人與目標</b></td>
    <td colspan=2>能夠正確取消預借資料。</td>
  </tr>  
  <tr>
    <td><b>前置條件</b></td>
    <td colspan=2>必須是會員且有預借成功。</td>
  </tr>   
  <tr>
    <td><b>後置條件</b></td>
    <td colspan=2>正確取消預借資料。</td>
  </tr>       
  <tr>
    <td rowspan=2><b>主要成功情節</b></td>
    <th>參與者</th>
    <th>系統</th>
  </tr>       
  <tr align="left" valign="top">
    <td>1.會員輸入帳號密碼。<br><br>
        2.當有會員登記欲取消座位時，會員進入取消登記預借畫面，取消預借資料。<br>
        3.會員須人工檢查取消預借資料是否成功。<br>
    </td>
    <td>1.1系統檢查輸入資料格式，如果有誤要求重新輸入。<br>
        2.1系統開啟取消預借畫面。<br><br>
        3.1取消預借成功，系統則出現”已取消預借”。<br>
    </td>
  </tr> 
  <tr>
    <td><b>例外情節</b></td>
    <td colspan=2>*a.如果有欄位無法輸入，或資料無法儲存，系統需要顯示警告訊息並終止輸入。</td>
  </tr>  
  <tr>
    <td><b>其他需求</b></td>
    <td colspan=2>無。</td>
  </tr>  
</table>
<table border="1" align="left">
  <tr>
    <td width="170"><b>使用案例名稱</b></td>
    <td colspan=2>記錄查詢作業。</td>
  </tr>
  <tr>
    <td><b>使用案例描述</b></td>
    <td colspan=2>查詢預借座位的編號。</td>
  </tr>
  <tr>
    <td><b>主要參與者</b></td>
    <td colspan=2>會員。</td>
  </tr>    
  <tr>
    <td><b>利害關係人與目標</b></td>
    <td colspan=2>能夠查詢個人預借的座位編號。</td>
  </tr>  
  <tr>
    <td><b>前置條件</b></td>
    <td colspan=2>必須是會員。</td>
  </tr>   
  <tr>
    <td><b>後置條件</b></td>
    <td colspan=2>正確查詢各座位編號。</td>
  </tr>       
  <tr>
    <td rowspan=2><b>主要成功情節</b></td>
    <th>參與者</th>
    <th>系統</th>
  </tr>       
  <tr align="left" valign="top">
    <td>1.會員輸入帳號密碼。<br><br>
        2.當有會員欲查詢座位時，會員進入記錄查詢畫面。<br>
        3.會員輸入欲查詢時段，若要取消編輯按取消鍵。<br>
    </td>
    <td>1.1系統檢查輸入資料格式，如果有誤要求重新輸入。<br>
        2.1系統開啟記錄查詢系統。<br><br>
        3.1根據輸入欲查詢的資料搜尋紀錄並顯示至畫面。<br>
        3.2如果按取消鍵，系統回至記錄查詢畫面。<br>
    </td>
  </tr> 
  <tr>
    <td><b>例外情節</b></td>
    <td colspan=2>*a.如果有欄位無法輸入，或資料無法儲存，系統需要顯示警告訊息並終止輸入。</td>
  </tr>  
  <tr>
    <td><b>其他需求</b></td>
    <td colspan=2>無。</td>
  </tr>  
</table>

**陸、個別使用案例的活動圖**

<p><img src="http://i.imgur.com/VEPMri8.png?1" title="個別使用案例的活動圖" /></p>
