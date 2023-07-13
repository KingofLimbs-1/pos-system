<?php

class MenuItem
{

    // fields
    private $name;
    private $newPrice;
    private $oldPrice;
    private $barcode;

    // constructor
    public function __construct($name, $newPrice, $oldPrice, $barcode)
    {
        $this->name = $name;
        $this->newPrice = $newPrice;
        $this->oldPrice = $oldPrice;
        $this->barcode = $barcode;
    }

    // methods
    public function getName()
    {
        return $this->name;
    }

    public function getNewPrice()
    {
        return $this->newPrice;
    }

    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    public function getBarcode()
    {
        return $this->barcode;
    }
}
