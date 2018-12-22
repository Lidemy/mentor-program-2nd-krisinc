## CSS 預處理器是什麼？我們可以不用它嗎？
- CSS 預處理器用程式化的方法寫 CSS，預處理器讓我們能夠用具結構性的方法寫 CSS，再編譯成 CSS。可以不用，預處理器不是必要，但是很好用。

## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。
- Cache-Control：用 max-age = ? 設定 response 的過期時間，當時間內使用者重新整理頁面，出來的會是 cache 著的結果，超過設定的時間才重新整理，瀏覽器就會發出新的 request。

## Stack 跟 Queue 的差別是什麼？
- Stack 的執行順序是先進後出（First In, Last Out），Queue 則是先進先出。
## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來）
- css selector 的權重計算是 (inline-style) - id - class - element( 0 - 0 - 0 - 0)，也就是寫在 HTML 中的 CSS 權重最高，再來是 id，接著是 class，最後是元素本身。
- Class 較多的標籤樣式會大於 Class 較少的的標籤（( 0-0-10-0 ) > (0-0-5-0)）。
- 但若有id的話，不管有多少個 Class 都不會大於有一個 id（(0-1-0-0) > (0-0-100-0)）。
- 行內元素則又勝過 id 宣告（(1-0-0-0) > (0-1-1-1)）。
- 若 CSS 的權重相等，則最後宣告的 CSS 會執行。
- !important 能蓋過所有一切的 CSS 選擇器，當同樣是 !important 才會比較權重，但 !important 不在 CSS 的權重計算範圍。