<?php

namespace QuickTopUpAPI\Service;

use QuickTopUpAPI\Api\ApiClient;

/**
 * Class StatusCheckService
 *
 * @package QuickTopUpAPI\Service
 *
 * A simple service to check the status of a transaction.
 */
class StatusCheckService {
  private ApiClient $apiClient;

  /**
   * StatusCheckService constructor.
   *
   * @param  ApiClient  $apiClient
   *   The API client.
   */
  public function __construct(ApiClient $apiClient) {
    $this->apiClient = $apiClient;
  }

  /**
   * Check the status of a transaction.
   *
   * @param  string  $ctid
   *   The CTID.
   *
   * @return array
   *   The transaction status.
   */
  public function checkStatus($ctid) {
    $endpoint = 'WSGetTransactionStatus';

    return $this->apiClient->sendRequest('POST', $endpoint, ['CTID' => $ctid]);
  }

}
