<?php

class MenuItem
{

    // fields
    private $name;
    private $price;
    private $barcode;

    // constructor
    public function __construct($name, $price, $barcode)
    {
        $this->name = $name;
        $this->price = $price;
        $this->barcode = $barcode;
    }

    // methods
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getBarcode()
    {
        return $this->barcode;
    }
}

