<?php

namespace QuickTopUpAPI\Service;

use QuickTopUpAPI\Api\ApiClient;

/**
 * Class ProductService
 *
 * @package QuickTopUpAPI\Service
 *
 * A simple product service to handle product related operations.
 */
class ProductService {

  /**
   * @var ApiClient
   *
   * The API client.
   */
  private ApiClient $apiClient;

  /**
   * ProductService constructor.
   *
   * @param  ApiClient  $apiClient
   *   The API client.
   */
  public function __construct(ApiClient $apiClient) {
    $this->apiClient = $apiClient;
  }

  /**
   * Get all products.
   *
   * @return array
   *   The products.
   */
  public function getAllProducts(): array {
    $endpoint = 'WSGetTopUpProducts';

    return $this->apiClient->sendRequest('POST', $endpoint);
  }

  /**
   * Get a product by its ID.
   *
   * @param  int  $productID
   *   The product ID.
   *
   * @return array
   *   The product.
   */
  public function getProductById(int $productID): mixed {
    $endpoint = "WSGetSingleTopUpProduct";

    return $this->apiClient->sendRequest(
      'POST', $endpoint, ['Product' => $productID]
    );
  }

}
