<?php

namespace QuickTopUpAPI\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class ApiClient
 *
 * @package QuickTopUpAPI\Api
 *
 *  A simple API client to send requests to the QuickTopUp API.
 */
class ApiClient {

  /**
   * @var Client
   *
   * The Guzzle HTTP client.
   */
  private Client $client;

  /**
   * @var string
   *
   * The API user.
   */
  private $apiUser;

  /**
   * @var string
   *
   * The API password.
   */
  private $apiPassword;

  /**
   * @var string
   *
   * The API security key.
   */
  private $apiSecurityKey;

  /**
   * ApiClient constructor.
   */
  public function __construct() {
    $this->client = new Client([
      'base_uri' => $_ENV['API_BASE_URL'],
      'timeout' => 30,
    ]);
    $this->apiUser = $_ENV['API_USER'];
    $this->apiPassword = $_ENV['API_PASSWORD'];
    $this->apiSecurityKey = $_ENV['API_SECURITY_KEY'];
  }

  /**
   * Send a request to the QuickTopUp API.
   *
   * @param  string  $method
   *   The HTTP method to use for the request.
   * @param  string  $endpoint
   *   The API endpoint to send the request to.
   * @param  array   $data
   *   The request data.
   *
   * @return mixed
   *   The response from the API.
   * @throws \Exception
   */
  public function sendRequest(
    string $method,
    string $endpoint,
    array $data = []
  ): mixed {
    // Generate the timestamp in GMT/UTC format
    $timestamp = gmdate('Y-m-d\TH:i:s');
    $authKey = $this->generateAuthHmac($timestamp, $this->apiSecurityKey);
    $hashedPassword = $this->generateAuthHmac(
      hash('sha256', $this->apiPassword), $authKey
    );

    // Add authentication parameters to the request data.
    $data = array_merge([
      'DTime' => $timestamp,
      'AuthKey' => $authKey,
      'User' => $this->apiUser,
      'Password' => $hashedPassword,
    ], $data);
    try {
      $response = $this->client->request($method, $endpoint, [
        'json' => $data,
        'headers' => [
          'Content-Type' => 'application/json',
        ],
      ]);

      return json_decode($response->getBody()->getContents(), TRUE);
    }
    catch (GuzzleException $e) {
      return ['error' => $e->getMessage()];
    }
  }

  /**
   * Generates an HMAC SHA256 hash using the API security key.
   *
   * @param  string  $message  The message to hash.
   * @param  string  $secret   The secret key for HMAC.
   *
   * @return string The base64-encoded HMAC hash.
   */
  private function generateAuthHmac($message, $secret): string {
    return base64_encode(hash_hmac('sha256', $message, $secret, TRUE));
  }

}
