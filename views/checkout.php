<?php
include '../data/data.php';
include '../model/MenuItem.php';
include '../include/addItem.php';
include '../include/calculateVAT.php';
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// redirect back to index if payment button is selected
if (isset($_GET['payment'])) {
    session_unset();
    header("Location: ./../");
}
?>

<?php
// Variables
if (isset($_SESSION["order"]) && isset($_SESSION["orderTotal"])) {
    $order = $_SESSION["order"];
    $orderTotal = $_SESSION["orderTotal"];
}
// ...
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&S POS | Pay</title>
    <link rel="stylesheet" href="./../static/css/checkout.css">
</head>

<body>
    <h1 class="heading">
        Select and Save
    </h1>

    <hr>

    <div class="purchasedItems">
        <h2>Items Purchased</h2>
        <ul>
            <?php if (isset($order)) {
                foreach ($order as $menuItem) { ?>
                    <li><?php echo $menuItem->getName(); ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    <hr>

    <h2 class="amounts">
        <?php if (isset($orderTotal)) { ?>
            Subtotal (excluding VAT):  R<span><?php echo $orderTotal; ?></span>
            <br>
            Total (including VAT):  R<span><?php echo $orderTotal + calculateVAT($orderTotal); ?></span>
        <?php } ?>
    </h2>

    <hr>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <button type="submit" name="payment">Pay with card</button>
        <button type="submit" name="payment">Pay with cash</button>
    </form>

</body>

</html>