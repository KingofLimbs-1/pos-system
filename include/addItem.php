<?php
session_start();
?>

<?php 

function addItem(MenuItem $menuItem, $selectedPrice)
{
    if (!isset($_SESSION["order"])) {
        $_SESSION["order"] = [];
    }
    
    if (!isset($_SESSION["orderTotal"])) {
        $_SESSION["orderTotal"] = 0;
    }
    
    $_SESSION["order"][] = $menuItem;
    $_SESSION["orderTotal"] += $selectedPrice;
}