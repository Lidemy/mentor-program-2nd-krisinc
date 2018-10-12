## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
- nav：專屬導覽列使用的標籤，是HTML5所新增的一系列語意標籤中的一員。
- figcaption：是 HTML5 用來排列圖片與標題的標籤，只要依使用方式加上標籤，就可以自動產生外距等等的樣式。
- audio：讓網頁能載入音訊檔，可以支援MP3、Wav、Ogg三個檔名的音訊檔。

## 請問什麼是盒模型（box modal）
- 由寬、高、內邊距（padding）、框線（border）、外邊距（margin）組成一個類似盒子的模型，而所有html元素都可以看成一個盒子。除了寬、高外，內外邊距跟框線的寬度也會影響到盒模型的寬度及高度。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
- inline： 行內元素
- block： 可以調整寬高，但佔滿整行。
- inline-block： 跟inline一樣可以與其他元素並排，也跟 block 一樣可以設定寬度與高度。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
- static：是預設值，會自動排列下來（預設是由上到下、由右到左排版），不會被定位，也就是不受 top, left, right, bottom 屬性影響位置。
- relative：自動排列下來，但可以被定位，可以用 top, left, right, bottom 的屬性來偏移原本的常規位置，不會影響其他元素的位置。
- absolute：可以被絕對定位在上層元素中的任何一個位置，但上層元素的position不能是預設的static。
- fixed：將物件固定在視窗上的特定位置，不會隨著頁面滾動跑走。
