<?php
include 'data/data.php';
include 'model/MenuItem.php';
?>

<?php
// Variables
$menuItems = [];
// ...
?>

<!-- Session variable -->
<?php
$errors = [];
$_SESSION["errors"] = $errors;
?>
<!-- Session variable end -->


<!-- Error handling -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "</br>";
    }
}
?>

<?php
if (!isset($menuItems)) {
    $errors[] = "menuItems class is not populating menuItems array";
} else {
    // Proceed as normal...
}
?>
<!-- Error handling end -->


<!-- Data handling -->
<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['selectedItemValue'])) {
    }
}
?>

<?php
// MenuItem object instantiations
foreach ($items as $item) {
    $menuItems[] = new MenuItem($item['name'], $item['newPrice'], $item['oldPrice'], $item['barcode']);
}
// ...
?>
<!-- Data handling end -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&S POS</title>
    <link rel="stylesheet" href="./static/css/style.css">
</head>

<body>
    <div class="heading">
        <h1>
            Select and Save
        </h1>
    </div>

    <hr>

    <div class="till__display">
        <div>
            <span class="till__console">
                Amount: R <span>0</span>
            </span>
        </div>
        <div>
            <form action="" method="post">
                <input class="confirmBtn" type="submit" name="confirmBtn" value="Confirm Order">
            </form>
        </div>
    </div>

    <hr>

    <section>
        <form class="items" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

            <?php foreach ($menuItems as $menuItem) { ?>
                <button type="submit" name="selectedItemValue" value="" class="item">
                    <div>
                        <span><?php echo $menuItem->getName(); ?></span>
                        <br>
                        <span class="oldPrice"><?php echo "R" . $menuItem->getOldPrice(); ?></span>
                        <span><?php echo "R" . $menuItem->getNewPrice(); ?></span>
                    </div>
                </button>
            <?php } ?>
        </form>
    </section>


    <form action="views/checkout.php" method="get" class="checkout">
        <input type="hidden" name="subTotal" value="sub total amount">
        <button type="submit">
            Proceed to payment
        </button>
    </form>

</body>

</html>