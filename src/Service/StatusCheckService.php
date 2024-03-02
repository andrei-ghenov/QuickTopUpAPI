<?php

namespace QuickTopUpAPI\Service;

use QuickTopUpAPI\Api\ApiClient;

class StatusCheckService
{
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function checkStatus($ctid)
    {
        $endpoint = 'WSGetTransactionStatus';
        return $this->apiClient->sendRequest('POST', $endpoint, ['CTID' => $ctid]);
    }
}
