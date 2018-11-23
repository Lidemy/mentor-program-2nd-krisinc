## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
### VARCHAR
- 長度為 n 的字元型態，n 必須介於 1 與 8000 之間，只是若輸入的資料小於 n，資料庫不會自動補空格，因此為變動長度之字串。
### TEXT
- 純文字，沒有默認值，用來儲存大量的（可高達兩億個位元組）字元資料，儲存空間以 8k 為單位動態增加。

### 比較
- varchar 通常用在儲存帳號、密碼或 session 這類長度有限的字串資料，而 text 則用在儲存文字內容較多的欄位。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？

### Cookie
- SERVER 端在 Client 端儲存資料的方式，要在網路上識別瀏覽者的身份，必須透過一些機制來保存狀態，而 Cookie 就是其中一種保存狀態的機制。
- 從 Server 設定紀錄 Cookie 的函式（ setcookie(name,value,expire,path,domain,secure) ），發送到 Client 端紀錄資料，當瀏覽器再次發送 Http Request 指令到 Server 時，就會比對目前在 Browser 內的 Cookie 存放區有沒有「該網域」、「該目錄」、「過期時間尚未過期」且「是否為安全連線」的 Cookie，如果有的話就會包含在 HTTP Request 指令的 "Cookie" Header 中。 

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
- 沒有設定跳脫特定字元，所以當使用者輸入惡意程式碼，意圖取得資料時，只能雙手一攤，任人家上下其手。密碼、cookie 沒有 hash 所以也很容易被有心人士偷走資料。
