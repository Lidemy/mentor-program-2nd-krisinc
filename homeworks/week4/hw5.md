1. 什麼是 DOM？
- Document Object Model是給HTML跟XML使用的一組API，將每一個HTML標籤看作一個節點，讓Javascript可以透過DOM去操作這些節點，是W3C整合出的一套瀏覽器的標準，給所有程式語言使用，不只有Javascript。

2. 什麼是 Ajax？
- Asynchronous JavaScript and XML（Ajax）通過在後台與服務器進行少量數據交換，AJAX 可以使網頁實現異步更新。Ajax做到能不必重新load一整個網頁的情況下對網站局部更新。其中最重要的就是非同步的概念（Asynchronous），javascript是同步的程式碼，但若要等到讀完整個API資料才去執行其他動作便會太過耗時，所以在Ajax中使用callback function，告訴javascript當非同步的資料完成時，就執行這個callback function。

3. HTTP method 有哪幾個？有什麼不一樣？
- Get: 取得server端的資料展示，
- Post: 從client端傳資料到server，如帳號密碼。
- Patch: 更改現有資料。
- Put:新增一項資料，如果資料已存在就覆蓋過去。
- Delete: 刪除資料。
- Option: 看server支援哪些method
- Head: 跟Get類似，但只取得http header的資料，並不會回傳body的資料。

1. `GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？
- GET 、 POST，一個用來獲取資料，一個用來傳送資料。
- GET 會將參數帶在url中，用 & 跟 = 來切割資料，會自動作url encoded，避免特殊字元出現在參數中。因為是網址，所以GET不會用來放敏感資訊（例：帳號密碼......）。
- POST 資料發送給server時，參數放在request body中，不會顯示在網址中，適合拿來放敏感資訊。

1. 什麼是 RESTful API？
- Representational State Transfer簡稱REST，是一種網路架構風格，以這個風格建構的系統稱為RESTful。RESTful API充分使用http的method，讓code易於維護及擴展，且保持一致性。

6. JSON 是什麼？
- JSON (JavaScript Object Notation)，是一種資料格式，常用於撰寫 API 裡面的交換資料，做為前、後端的溝通工具。用大括號 {} 包起來後，每筆資料都有 key 跟 value，且每筆資料用逗號分開，其中 key 要用雙引號包起來。

7. JSONP 是什麼？
- JSONP (JSON with Padding) 利用 <script> 可以跨網域的特性，在 HTML 裡引入 API URL 到 <script> 裡，然後定義 callback function 的參數，在 JavaScript 檔案裡用 callback function 呼叫出 JSONP 的資料。但只能用 GET method。

8. 要如何存取跨網域的 API？
- 在同源政策下，要取得跨網域的API，除了使用JSONP外，就要依照CORS（Cross-Origin HTTP request）的規範，在server的response header中加上Access-Control-Allow-Origin，當瀏覽器接收到這個response後，比對目前的origin有沒有符合規則，有的話就會允許跨網域的請求，反之沒有的話就會被瀏覽器擋下。