1. javascript 執行緒讀到第一行 console.log(1)，丟進 call stack執行完 log 出 1。
2. 讀到第二行 setTimeout(() => { console.log(2) }, 0)，進 call stack 執行完，瀏覽器根據 web api 設定一個 timer ，然後將 setTimeout 移出 call stack。timer 時間到後將 setTimeout 移到 callback queue，當 call stack 執行完所有東西，再輸出 setTimeout 結果。
3. console.log(3) 進 call stack 執行完 log 3。
4. setTimeout(() => { console.log(4) }, 0) 進 call stack，web api 再設一個timer，時間到移到 callback queue 等待。
5. console.log(5) 進 call stack 執行完 log 5。
6. call stack 執行完，偵測到 callback queue 還有東西，於是將 queue 中等待的 setTimeout 依先進 queue 的順序執行。
- 所以結果是： 13524
