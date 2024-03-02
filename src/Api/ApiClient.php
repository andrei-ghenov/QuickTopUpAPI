<?php

namespace QuickTopUpAPI\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ApiClient
{
    private $client;
    private $apiUser;
    private $apiPassword;
    private $apiSecurityKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $_ENV['API_BASE_URL'],
        ]);
        $this->apiUser = $_ENV['API_USER'];
        $this->apiPassword = $_ENV['API_PASSWORD'];
        $this->apiSecurityKey = $_ENV['API_SECURITY_KEY'];
    }

    private function generateAuthKey($timestamp)
    {
        // Generate the HMAC SHA256 hash of the timestamp using the API security key.
        return base64_encode(hash_hmac('sha256', $timestamp, $this->apiSecurityKey, true));
    }

    private function hashPassword()
    {
        // Hash the API password using SHA256.
        return hash('sha256', $this->apiPassword);
    }

    public function sendRequest($method, $endpoint, array $data = [])
    {
        $timestamp = gmdate('c');
        $authKey = $this->generateAuthKey($timestamp);
        $hashedPassword = $this->hashPassword();

        // Add authentication parameters to the request data.
        $data = array_merge($data, [
            'DTime' => $timestamp,
            'AuthKey' => $authKey,
            'User' => $this->apiUser,
            'Password' => $hashedPassword,
        ]);

        try {
            $response = $this->client->request($method, $endpoint, [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
