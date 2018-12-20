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
        $result = $conn->query("SELECT amount FROM products WHERE id = $ids[$i] for UPDATE");
        if($result->num_rows>0) {
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