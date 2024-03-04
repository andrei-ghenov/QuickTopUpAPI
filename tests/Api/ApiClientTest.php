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
  private ApiClient $apiClient;

  /**
   * Test a successful login request.
   */
  public function testWSLoginSuccess() {
    try {
      $response = $this->apiClient->sendRequest('POST', 'WSLogin');

      // Use PHPUnit assertions to check for successful login
      // Display the response for debugging purposes
      // (usually done during development only).
      echo "Response: ";
      var_dump($response);

      // Assert the response indicates a successful login.
      $this->assertArrayHasKey(
        'AccessCode', $response, "Response does not contain AccessCode"
      );
      $this->assertEquals(
        0, $response['AccessCode'],
        "AccessCode is not 0, indicating login failure"
      );
    }
    catch (\Exception $e) {
      // Catch and display the error for debugging purposes
      // In production or CI environments, it might be better to log this error
      // or handle it accordingly.
      echo "Error during WSLogin request: ".$e->getMessage();
      // Fail the test if an exception is caught.
      $this->fail(
        "WSLogin request failed with an exception: ".$e->getMessage()
      );
    }
  }

  /**
   * Test a failed login request.
   */
  public function testWSLoginFailure() {
    try {
      // Use intentionally incorrect credentials to test failure response.
      $response = $this->apiClient->sendRequest('POST', 'WSLogin', [
        'User' => 'incorrectUser',
        'Password' => 'incorrectPassword',
      ]);

      // Assert the response indicates a failed login.
      $this->assertArrayHasKey(
        'AccessCode', $response, "Response does not contain AccessCode"
      );
      $this->assertNotEquals(
        0, $response['AccessCode'],
        "AccessCode is 0, indicating unexpected success"
      );
    }
    catch (\Exception $e) {
      // If there's an exception, catch and display it for debugging purposes.
      echo "Error during WSLogin failure test: ".$e->getMessage();
      // Optionally fail the test to indicate an unexpected error occurred.
      $this->fail(
        "WSLogin failure test failed with an exception: ".$e->getMessage()
      );
    }
  }

  /**
   * Set up the test case.
   */
  protected function setUp(): void {
    $this->apiClient = new ApiClient();
  }

}
