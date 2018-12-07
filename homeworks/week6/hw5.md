## 請說明 SQL Injection 的攻擊原理以及防範方法
### 攻擊原理
- client 端在輸入的字串中夾帶sql指令，如果沒有跳脫特殊字元便會造成資料庫被取得。
#### 範例
某個網站的登入驗證的SQL查詢程式碼為

    strSQL = "SELECT * FROM users WHERE (name = '" + userName + "') and (pw = '"+ passWord +"');"

惡意填入

    userName = "1' OR '1'='1";
與

    passWord = "1' OR '1'='1";
時，將導致原本的SQL字串被填為

    strSQL = "SELECT * FROM users WHERE (name = '1' OR '1'='1') and (pw = '1' OR '1'='1');"
也就是實際上執行的SQL命令會變成下面這樣的

    strSQL = "SELECT * FROM users;"
因此達到無帳號密碼，亦可登入網站。所以SQL隱碼攻擊被俗稱為駭客的填空遊戲。

### 防範方法
1. 應用系統中存取資料庫時，應明確定義存取資料庫的使用者權限，把系統管理員的使用者與普通使用者區分開來，由於因為權限管控嚴謹，對使用者的操作限制，這些惡意的動作也將無法被執行。

2. 採用參數化（Parameterized）查詢語法，若能在撰寫SQL查詢語法時，使用者輸入的變數不是直接動態結合到SQL 查詢語法，而是通過參數來傳遞這個變數的話，那麼就可以有效的避免SQL Injection 資料隱碼攻擊。

3. 加強對用戶輸入資料的檢核與驗證對字串變數的內容進行測試：只接受所需的值、拒絕包含二進位資料、Escape 跳脫字元和注釋字元等一些容易造成攻擊的特殊字元過濾與驗證。這些動作有助於防止不當攻擊語法的植入，並且可以預防某些緩衝區溢位攻擊等相關手法。

## 請說明 XSS 的攻擊原理以及防範方法
### 攻擊原理
- XSS攻擊是當網站讀取時，執行攻擊者提供的程式碼。XSS通常是透過HTML/JavaScript這類不在伺服器端執行、而在使用者端的瀏覽器執行。可用來竊取用戶的cookie，甚至於冒用使用者的身份。像是網路銀行、電子郵件、部落格或其他需要有帳號才能進入的網站。

- XSS攻擊可以分為兩種：
1. 使用者點擊特製的連結稱為Reflected Attack
2. 另一種是單純的瀏覽網頁，且該網頁中已植入惡意的語法稱為Persistent Attack除了要注意攻擊的手法外，電腦保持更新至最新版也是很重要的。瀏覽器廠商、軟體開發人員與安全專業人員的工作便是防止這些攻擊的關鍵。
- 與 SQL Injection 不同在於：前者是透過從Web前端輸入資料至網站，導致網站輸出了被惡意控制的網頁內容，使得系統安全遭到破壞。而後者則是輸入了足以改變系統所執行之SQL述句內容的字串，使得系統最終達到攻擊的目的。
### 防範方法
- 所有參數都必須做格式驗證，檢查是否為預期輸入的格式，例如長度是否超過限制，姓名欄位是否全是中文等。
- 所有參數都必須做URL encode將URL的保留字取代掉。
- 所有參數都必須做HTML encode將HTML的特殊符號取代掉。
- 所有參數都必須做JSON encode將JSON的特殊符號取代掉。
- 所有參數都檢查是否存在"script"字樣，如果有將其取代掉。

## 請說明 CSRF 的攻擊原理以及防範方法
### 攻擊原理
- CSRF（ Cross-site Request Forgery ）跨站請求偽造，XSS往往容易與CSRF產生混淆，原因在於XSS與CSRF都是跨站式的請求攻擊，有些CSRF攻擊是利用XSS來實現，然而，CSRF不一定要透過XSS，使用者在無知的情況下，點選某外部網站的鏈結（甚至只是瀏覽了某個頁面）回到已登入網站，即使在沒有執行任何JavaScript的情況下，也能使CSRF攻擊成立，因此CSRF也有著One-click Attack的別稱。
- CSRF要能成立的必要條件是，使用者已登入網站，而最簡單的場景就是，使用者登入後，單憑瀏覽器與伺服端之間的會話溝通，就確認使用者的身分無誤而進行各種操作，因而使得有意攻擊者，只要能命令瀏覽器做出想要的請求，就能實現攻擊。
- 最常見也最容易的攻擊範例，會以不正確的URL設計作為開端，像是若要刪除某個文章，單純使用了/delete?articleId=1234這樣的GET請求，而且在實際刪除文章之前，沒有任何一步再確認的動作，這麼一來，攻擊者只要在其他網站，設法引誘已登入使用者點選<a href='user_site/delete?articleId=1234'>美女走光圖</a>這類的鏈結，使用者就會在不知情的情況下，刪除了某篇文章。

### 防範方法
- 使用者必須是在登入狀態，CSRF才有可能成立，因此，儘量不使用自動登入，在使用者沒有活動一段時間之後，自動登出、令會話失效，可以減少CSRF攻擊成功的可能性。
- 增加操作前的確認畫面，是增加CSRF攻擊難度的一個方式，不過若單純只有「確認」按鈕，本質上仍只檢查Session Id的話，也是沒用，較有效的確認畫面必須有其他驗證方式，像是再次輸入密碼（最好是有別於登入時使用之密碼或透過第三方傳遞的一次性密碼）、發送電子郵件附上驗證鏈結等。

- 檢查Referer，確認來源非跨站請求，是個相對簡單的防禦方式，然而，檢查規則容易遺漏或規避，而有些軟體或瀏覽器可以控制傳送或停用Referer，因而這種方式只能用在暫時性防禦，或者是已知使用者環境的情況下。

- 增加一個額外的隨機產生令牌（Token），確認只有使用者自身意願下發出請求，才會附上令牌，若攻擊者利用了某種手法，令瀏覽器發出的情況，則不會附上令牌。這是個公認有效的防禦方式，通常稱之為Synchronizer Token模式，許多程式庫或框架都提供了相關實作，使用方式也略有不同。

## 請舉出三種不同的雜湊函數
- MD5： 是Ron River在MIT所發展出來的(Ron River就是公開鑰匙加密演算法RSA( Rivest-Shamir-Adleman )裡面的「R」)。一直到幾年前(當暴力攻擊法與密碼破解等議題升溫時)，MD5還是最多人使用的安全雜湊函數。這個演算法的輸入是一個任意長度的訊息，其輸出則是一個128位元的訊息摘要。輸入的訊息會被分成好機個512位元的區段來處理。
- SHA-1： SHA-1 是「Secure Hash Algorithm 1」的縮寫，它是一種雜湊演算法，計算之後的結果通常會以 40 個十六進位的數字方式呈現。這個演算法的特點之一，就是只要輸入一樣的值，就會有一樣的輸出值，反之，如果是不同的輸入值，就會有不同的輸出值。Git 裡所有物件的「編號」的計算主要都是靠這個演算法產生的。
- SHA256： 名稱來自於安全雜湊演算法2（英語： Secure Hash Algorithm 2 ）的縮寫，一種密碼雜湊函式演算法標準，由美國國家安全域性研發，屬於 SHA 演算法之一，是 SHA-1 的後繼者。對於任意長度的訊息，SHA256都會產生一個256bit長的雜湊值，稱作訊息摘要。

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
### Session
session機制是一種服務器端的機制，服務器使用一種類似於散列表的結構（也可能就是使用散列表）來保存信息。

當程序需要為某個客戶端的請求創建一個session的時候，服務器首先檢查這個客戶端的請求裡是否已包含了一個session標識 - 稱為 session id，如果已包含一個session id則說明以前已經為此客戶端創建過session，服務器就按照session id把這個 session檢索出來使用（如果檢索不到，可能會新建一個），如果客戶端請求不包含session id，則為此客戶端創建一個session並且生成一個與此session相關聯的session id，session id的值應該是一個既不會重複，又不容易被找到規律以仿造的字符串，這個 session id將被在本次響應中返回給客戶端保存。

保存這個session id的方式可以採用cookie，這樣在交互過程中瀏覽器可以自動的按照規則把這個標識發揮給服務器。一般這個cookie的名字都是類似於SEEESIONID，而。比如weblogic對於web應用程序生成的cookie，JSESSIONID= ByOK3vjFD75aPnrF7C2HmdnV6QZcEbzWoWiBYEnLerjQ99zWpBng!-145788764，它的名字就是 JSESSIONID。

由於cookie可以被人為的禁止，必須有其他機制以便在cookie被禁止時仍然能夠把session id傳遞迴服務器。經常被使用的一種技術叫做URL重寫，就是把session id直接附加在URL路徑的後面，附加方式也有兩種，一種是作為URL路徑的附加信息，表現形式為http://...../xxx;jsessionid= ByOK3vjFD75aPnrF7C2HmdnV6QZcEbzWoWiBYEnLerjQ99zWpBng!-145788764
另一種是作為查詢字符串附加在URL後面，表現形式為http://...../xxx?jsessionid=ByOK3vjFD75aPnrF7C2HmdnV6QZcEbzWoWiBYEnLerjQ99zWpBng!-145788764
這兩種方式對於用戶來說是沒有區別的，只是服務器在解析的時候處理的方式不同，採用第一種方式也有利於把session id的信息和正常程序參數區分開來。
為了在整個交互過程中始終保持狀態，就必須在每個客戶端可能請求的路徑後面都包含這個session id。

### Session 跟 Cookie 的差別
為什麼會有cookie呢,大家都知道，http是無狀態的協議，客戶每次讀取web頁面時，服務器都打開新的會話，而且服務器也不會自動維護客戶的上下文信息，那麼要怎麼才能實現網上商店中的購物車呢，session就是一種保存上下文信息的機制，它是針對每一個用戶的，變量的值保存在服務器端，通過SessionID來區分不同的客戶,session是以cookie或URL重寫為基礎的，默認使用cookie來實現，系統會創造一個名為JSESSIONID的輸出cookie，我們叫做session cookie,以區別persistent cookies,也就是我們通常所說的cookie,注意session cookie是存儲於瀏覽器內存中的，並不是寫到硬盤上的，這也就是我們剛才看到的JSESSIONID，我們通常情是看不到JSESSIONID的，但是當我們把瀏覽器的cookie禁止後，web服務器會採用URL重寫的方式傳遞Sessionid，我們就可以在地址欄看到sessionid=KWJHUG6JJM65HS2K6之類的字符串。
明白了原理，我們就可以很容易的分辨出persistent cookies和session cookie的區別了，網上那些關於兩者安全性的討論也就一目瞭然了，session cookie針對某一次會話而言，會話結束session cookie也就隨著消失了，而persistent cookie只是存在於客戶端硬盤上的一段文本（通常是加密的），而且可能會遭到cookie欺騙以及針對cookie的跨站腳本攻擊，自然不如session cookie安全了。
通常session cookie是不能跨窗口使用的，當你新開了一個瀏覽器窗口進入相同頁面時，系統會賦予你一個新的sessionid，這樣我們信息共享的目的就達不到了，此時我們可以先把sessionid保存在persistent cookie中，然後在新窗口中讀出來，就可以得到上一個窗口SessionID了，這樣通過session cookie和persistent cookie的結合我們就實現了跨窗口的session tracking（會話跟蹤）。
在一些web開發的書中，往往只是簡單的把Session和cookie作為兩種並列的http傳送信息的方式，session cookies位於服務器端，persistent cookie位於客戶端，可是session又是以cookie為基礎的，明白的兩者之間的聯繫和區別，我們就不難選擇合適的技術來開發web service了。

## `include`、`require`、`include_once`、`require_once` 的差別

- include： 當網頁讀到 include 才會將文件引入，如果 include 的文件存在錯誤，程序不會中斷，會發出一個錯誤警告並繼續執行。include一般是放在流程控制的處理部分中PHP程序網頁在讀到include的文件時，才將它讀進來。這種方式可以把程序執行時的流程簡單化。
- require： PHP程序在執行前會先讀取 require 的文件，使它變成程序網頁的一部分，當 require 的文件發生錯誤時，程序中斷並顯示一個致命錯誤。require通常放在PHP程序的最前面，PHP程序在執行前，就會先讀入require所指定引入的文件，使它變成PHP程序網頁的一部份。常用的函數，亦可以這個方法將它引入網頁中。
- include_once： 與 include 相同，但在執行前會先檢查檔案是否已經在程序中被引入過，如果有的話便不會再次引入。
- require_once： 與 require 相同，但在執行前會先檢查檔案是否已經在程序中被引入過，如果有的話便不會再次引入。
- require 通常用於導入靜態內容， include 則用於導入動態內容。