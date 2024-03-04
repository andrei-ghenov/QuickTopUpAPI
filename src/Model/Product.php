<?php

namespace QuickTopUpAPI\Model;

/**
 * Class Product
 *
 * @package QuickTopUpAPI\Model
 *
 * Note. This is a simple product model, in a real scenario it will be
 * a database model.
 *
 * Not currently used, created to expand functionality.
 */
class Product {

  /**
   * @var int
   *
   * The product ID.
   */
  public int $id;

  /**
   * @var string
   *
   * The product name.
   */
  public string $name;

  /**
   * @var string
   *
   * The product description.
   */
  public string $description;

  /**
   * @var float
   *
   * The product amount.
   */
  public float $amount;

  /**
   * Product constructor.
   *
   * @param  int  $id
   *   The product ID.
   * @param  string  $name
   *   The product name.
   * @param  string  $description
   *   The product description.
   * @param  float  $amount
   *   The product amount.
   */
  public function __construct(
    int $id, string $name, string $description, float $amount
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->amount = $amount;
  }

}
