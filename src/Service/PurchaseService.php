<?php

namespace QuickTopUpAPI\Service;

use QuickTopUpAPI\Api\ApiClient;

/**
 * Class PurchaseService
 *
 * @package QuickTopUpAPI\Service
 *
 * A simple purchase service to handle purchase related operations.
 */
class PurchaseService {

  /**
   * @var ApiClient
   *
   * The API client.
   */
  private $apiClient;

  /**
   * PurchaseService constructor.
   *
   * @param  ApiClient  $apiClient
   *   The API client.
   */
  public function __construct(ApiClient $apiClient) {
    $this->apiClient = $apiClient;
  }

  /**
   * Send a purchase request to the QuickTopUp API.
   *
   * @param  int     $productID
   *   The product ID.
   * @param  float   $amount
   *   The purchase amount.
   * @param  string  $phoneNumber
   *   The destination phone number.
   * @param  string  $ctid
   *   The CTID.
   *
   * @return array
   *   The purchase response.
   */
  public function sendPurchase($productID, $amount, $phoneNumber, $ctid
  ): array {
    $endpoint = 'WSSendTopUpPurchaseRequest';
    $body = [
      'Product' => $productID,
      'Amount' => $amount,
      'CTID' => $ctid,
      'DestinationPhoneNumber' => $phoneNumber,
    ];

    return $this->apiClient->sendRequest('POST', $endpoint, $body);
  }

}
