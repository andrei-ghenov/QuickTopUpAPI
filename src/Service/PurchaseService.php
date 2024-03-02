<?php

namespace QuickTopUpAPI\Service;

use QuickTopUpAPI\Api\ApiClient;

class PurchaseService
{
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function sendPurchase($productID, $amount, $phoneNumber, $ctid)
    {
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
