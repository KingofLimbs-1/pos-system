<?php
include 'data/data.php';
include 'model/MenuItem.php';
include 'include/addItem.php';
?>

<!-- Error handling -->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if (isset($_POST['confirmBtn'])) {
    if (empty($_SESSION["order"])) {
        $errors[] = "Please add items to your cart";
    } else {
        // ...
    }
}
?>

<?php
if (isset($_POST['confirmBtn'])) {
    if (empty($_SESSION["order"])) {
        $errors[] = "Please add items to your cart";
    } else {
        // ...
    }
}
?>

<?php
// Check to see if any errors occcured
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "</br>";
    }
}
// ...
?>

<!-- Error handling end -->

<!-- Data handling -->

<?php
// MenuItem object instantiations
foreach ($items as $item) {
    $menuItems[] = new MenuItem($item['name'], $item['newPrice'], $item['oldPrice'], $item['src'], $item['barcode']);
}
// ...
?>

<?php
// Add menuItem to order
$selectedItem = $_POST["selectedItemValue"] ?? [];
if (!empty($selectedItem)) {
    foreach ($selectedItem as $item) {
        // Compare the trimmed name of each MenuItem object with the trimmed selected item
        $filteredItems = array_filter($menuItems, function ($menuItem) use ($item) {
            return trim($menuItem->getName()) === trim($item);
        });

        if (!empty($filteredItems)) {
            // Retrieves first matched MenuItem object and get its new price
            $selectedPrice = reset($filteredItems)->getNewPrice();
            // Add the matched MenuItem to order using the addItem() function
            addItem(reset($filteredItems), $selectedPrice);
        }
    }
}
// ...
?>

<?php
// Clear order button
if (isset($_POST["clearBtn"])) {
    $_SESSION["order"] = [];
    $_SESSION["orderTotal"] = 0;
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

    <form action="" method="post">
        <?php if (!empty($_SESSION["order"])) : ?>
            <input class="clearBtn" type="submit" name="clearBtn" value="Clear Order">
        <?php endif; ?>
    </form>

    <hr>

    <div class="till__display">
        <div>
            <span class="till__console">
                Amount: R <span><?php echo isset($_SESSION["orderTotal"]) ? $_SESSION["orderTotal"] : 0; ?></span>
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
                <button type="submit" name="selectedItemValue[]" value="<?php echo $menuItem->getName(); ?>" class="item">
                    <div>
                        <span><?php echo $menuItem->getName(); ?></span>
                        <br>
                        <span class="oldPrice"><?php echo "R" . $menuItem->getOldPrice(); ?></span>
                        <span><?php echo "R" . $menuItem->getNewPrice(); ?></span>
                        <br>
                        <img src="<?php echo $menuItem->getImgSrc(); ?>" alt="itemImage"></span>
                        <br>
                        <span><?php echo $menuItem->getBarcode(); ?></span>
                        <br>
                    </div>
                </button>
            <?php } ?>
        </form>
    </section>

    <?php if (isset($_POST['confirmBtn']) && !empty($_SESSION['order'])) : ?>
        <form action="../pos-system/views/checkout.php" method="get" class="checkout">
            <input type="hidden" name="subTotal" value="sub total amount">
            <button type="submit">
                Proceed to payment
            </button>
        </form>
    <?php endif; ?>

</body>

</html>