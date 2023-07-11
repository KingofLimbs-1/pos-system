<?php

// display error codes and messages

use function PHPSTORM_META\type;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Session variables
$items = $_SESSION['items'];
// ...


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // Order total
    // ...
}
?>


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
    </div>

    <hr>

    <section>
        <form class="items" action=" <?php $_SERVER['PHP_SELF'] ?>" method="post">

            <?php foreach ($items as $key => $value) {
            ?>
                <button type="submit" name="selectedItemValue" value="" class="item">
                    <span>
                        <?php echo $value['name']; ?>
                        <br>
                        <?php echo "R" . $value['price']; ?>
                    </span>
                </button>
            <?php
            }
            ?>
        </form>
    </section>

    <form action="./views/checkout.php" method="get" class="checkout">
        <input type="hidden" name="subTotal" value="sub total amount">
        <button type="submit">
            Proceed to payment
        </button>
    </form>


</body>
</html>