<?php

namespace QuickTopUpAPI\Service;

use QuickTopUpAPI\Api\ApiClient;

class ProductService
{
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getAllProducts()
    {
        $endpoint = 'WSGetTopUpProducts';
        return $this->apiClient->sendRequest('GET', $endpoint);
    }

    public function getProductById($productID)
    {
        $endpoint = "WSGetSingleTopUpProduct";
        return $this->apiClient->sendRequest('GET', $endpoint, ['Product' => $productID]);
    }
}
