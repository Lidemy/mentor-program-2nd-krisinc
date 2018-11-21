資料庫名稱：comments

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言 id     |
| parent_id | integer   | 判斷子留言 |
| username | varchar | 使用者帳號 |
| content   | text | 留言內容  |
| created_at | datetime | 留言時間 |


資料庫名稱：users

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
| id | integer | 使用者id |
| username | varchar | 使用者帳號 |
| password | varchar | 使用者密碼 |
| nickname | varchar | 使用者暱稱 |