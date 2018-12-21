<?
    require_once('./conn.php');
    require_once('./temp_product.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>transaction</title>
</head>
<body>
    <header class="header"><h1>購物車</h1></header>
    <?
        $stmt = $conn->prepare("SELECT * FROM products ORDER BY id ASC");
        $is_success = $stmt->execute();
        $result = $stmt->get_result();
    ?>
    <div class="container">
        <form method="POST" action="./handle_transaction.php">
            <div class="list-group">
            <?
                if($is_success) {
                    while($row = $result->fetch_assoc()){
                        echo renderproducts($row['product_name'], $row['id'], $row['amount'], $row['price'], $row['description']);
                    }
                }
            ?>
                <div class="list-group-item flex-column align-items-start">
                    <div class="row">
                        <div class="offset-md-7 col-md-3"></div>
                        <div class="pay col-md-2">
                            <button class="btn btn-info" type="submit">結帳！</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>