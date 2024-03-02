<?php

namespace QuickTopUpAPI\Tests\Api;

use PHPUnit\Framework\TestCase;
use QuickTopUpAPI\Api\ApiClient;

/**
 * Class ApiClientTest
 *
 * @package QuickTopUpAPI\Tests\Api
 *
 * Test cases for the ApiClient class.
 */
class ApiClientTest extends TestCase {

  /**
   * @var ApiClient
   *
   * The API client.
   */
  private $apiClient;

  /**
   * Test a successful login request.
   */
  public function testWSLoginSuccess() {
    $response = $this->apiClient->sendRequest('POST', 'WSLogin');

    // Assert the response indicates a successful login
    $this->assertArrayHasKey('AccessCode', $response);
    $this->assertEquals(0, $response['AccessCode']);
  }

  /**
   * Test a failed login request.
   */
  public function testWSLoginFailure() {
    // Use intentionally incorrect credentials to test failure response
    $response = $this->apiClient->sendRequest('POST', 'WSLogin', [
      'User' => 'incorrectUser',
      'Password' => 'incorrectPassword',
    ]);

    // Assert the response indicates a failed login
    $this->assertArrayHasKey('AccessCode', $response);
    $this->assertNotEquals(0, $response['AccessCode']);
  }

  /**
   * Set up the test case.
   */
  protected function setUp(): void {
    $this->apiClient = new ApiClient();
  }

}
