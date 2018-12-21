<?
    require_once('./conn.php');

    // 抓商品 id 到 array
    $ids = array($_POST['id1'], $_POST['id2'], $_POST['id3'], $_POST['id4'], $_POST['id5']);
    // 抓商品 amount
    $amounts = array($_POST['amount1'], $_POST['amount2'], $_POST['amount3'], $_POST['amount4'], $_POST['amount5']);

    $greater = array_filter($amounts, "postive");

    $conn->autocommit(FALSE);
    $conn->begin_transaction();

    for($i=0; $i<count($ids);$i++) {
        $stmt = $conn->prepare("SELECT amount FROM products WHERE id = ? for UPDATE");
        $stmt->bind_param('i', $ids[$i]);
        $is_success = $stmt->execute();
        $result = $stmt->get_result();
        if($is_success) {
            while($row = $result->fetch_assoc()) {
                if(count($greater) >= count($amounts)) {
                    $stmt_update = $conn->prepare("UPDATE products SET amount = amount - 1 WHERE id = $ids[$i]");
                    $stmt_update->execute();
                    printMessage('購買成功!',$_SERVER["HTTP_REFERER"]);
                    $conn->commit();
                } else {
                    printMessage('有東西賣完了',$_SERVER["HTTP_REFERER"]);
                    $conn->rollback();
                }
            }
        }
    }

    $conn->close();


    // printMessage('購買成功!',$_SERVER["HTTP_REFERER"]);
    // $conn->commit();
    // printMessage('有東西賣完了',$_SERVER["HTTP_REFERER"]);
    // $conn->rollback();

    function postive($num) {
        return ($num - 1 >= 0);
    }

    function printMessage($msg, $redirect) {
        echo '<script>';
        echo "alert('" . htmlentities($msg, ENT_QUOTES) . "');";
        echo "window.location = '". $redirect ."';";
        echo '</script>';
    }
?>