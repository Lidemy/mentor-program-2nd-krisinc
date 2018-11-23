<?
    require_once('conn.php');
    include_once('check_login.php');
    require_once('utils.php');

    if(
        isset($_POST['content']) &&
        !empty($_POST['content'])
    ) {
        $content = $_POST['content'];
        $parent_id = $_POST['parent_id'];

        $sql = "INSERT INTO krisinc_comments (username, content, parent_id) VALUES ('$user', '$content', $parent_id)";
        if($conn->query($sql)) {
            // server redirect
            header('location: ./index.php');
        } else {
            // client redirect
            printMessage($conn->error, './index.php');
        }
        // $last_id = $conn->insert_id;
        // $conn->close();
    } else {
        printMessage('請輸入內容', './index.php');
    }
    
?>