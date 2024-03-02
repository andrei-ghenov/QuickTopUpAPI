<?php

namespace QuickTopUpAPI\Model;

class Product
{
    public $id;
    public $name;
    public $description;
    public $amount;

    public function __construct($id, $name, $description, $amount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->amount = $amount;
    }
}
