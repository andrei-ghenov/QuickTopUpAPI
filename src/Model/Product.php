<?php

namespace QuickTopUpAPI\Model;

/**
 * Class Product
 *
 * @package QuickTopUpAPI\Model
 *
 * A simple product model.
 */
class Product {

  /**
   * @var int
   *
   * The product ID.
   */
  public $id;

  /**
   * @var string
   *
   * The product name.
   */
  public $name;

  /**
   * @var string
   *
   * The product description.
   */
  public $description;

  /**
   * @var float
   *
   * The product amount.
   */
  public $amount;

  /**
   * Product constructor.
   *
   * @param  int     $id
   *   The product ID.
   * @param  string  $name
   *   The product name.
   * @param  string  $description
   *   The product description.
   * @param  float   $amount
   *   The product amount.
   */
  public function __construct($id, $name, $description, $amount) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->amount = $amount;
  }

}
