<?
    function renderproducts($name, $id, $amount, $price, $description) {
        return "
        <a href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
        <input type='hidden' name='id$id' value='$id'>
        <input type='hidden' name='amount$id' value='$amount'>
            <div class='d-flex w-100 justify-content-between'>
                <h5>$name</h5>
                <div class='btn delete-comment' data-id='$id'>X</div>
            </div>
            <small>amount: $amount</small>
            <p class='mb-1'>$description</p>
            <div class='item__price'>price: $$price</div>
        </a>
        ";
    }
?>