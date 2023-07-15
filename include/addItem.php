<?php

function addItem(MenuItem $menuItem)
{
    // Order array instantiation
    if (!isset($_SESSION["order"])) {
        $_SESSION["order"] = [];
    }
    // Order population
    $_SESSION["order"][] = $menuItem;
    // Order price creation
    $_SESSION["orderTotal"] += $menuItem->getNewPrice();
}