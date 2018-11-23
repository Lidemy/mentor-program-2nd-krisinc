<?php
    function printMessage($msg, $redirect) {
        echo '<script>';
        echo "alert('" . htmlentities($msg, ENT_QUOTES) . "');";
        echo "window.location = '". $redirect ."';";
        echo '</script>';
    }

    function setToken($conn, $username) {
        $token = uniqid();
        $sql = "DELETE FROM krisinc_certificate where username = '$username'";
        $conn->query($sql);

        $sql = "INSERT INTO krisinc_certificate(username,  token) VALUES('$username', '$token')";
        $conn->query($sql);
        setcookie("token", $token, time()+3600*24);
    }
    function getUserByToken($conn, $token) {
        if(isset($token) && !empty($token)) {
            $sql = "SELECT * from krisinc_certificate where token='$token'";
            $result = $conn->query($sql);
            if(!$result || $result->num_rows <= 0) {
                return null;
            }
            $row = $result->fetch_assoc();
            return $row['username'];
        } else {
            return null;
        }
    }

    function renderDeleteBtn($id) {
        return "
            <form method='POST' action='./delete_comment.php'>
                <input type='hidden' name='id' value='$id'>
                <input class='btn dele__btn' type='submit' value='X'>
            </form>
        ";
    }
    function renderDeleteBtnSub($id) {
        return "
            <form method='POST' action='./delete_comment.php'>
                <input type='hidden' name='id' value='$id'>
                <input class='btn dele__btn--sub' type='submit' value='X'>
            </form>
        ";
    }

    function renderEditBtn($id) {
        return "
            <form method='GET' action='./edit_comment.php'>
                <input type='hidden' name='id' value='$id'>
                <input class='btn dele__btn' type='submit' value='EDIT'>
            </form>
        ";
    }
    function renderEditBtnSub($id) {
        return "
            <form method='GET' action='./edit_comment.php'>
                <input type='hidden' name='id' value='$id'>
                <input class='btn dele__btn--sub' type='submit' value='EDIT'>
            </form>
        ";
    }
?>

