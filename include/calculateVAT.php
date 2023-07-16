<?php

function calculateVAT($PurchasedItemsTotal)
{
    $vat = $PurchasedItemsTotal * 0.15;
    return $vat;
}
