<?php

namespace QuickTopUpAPI\Tests\Service;

use PHPUnit\Framework\TestCase;
use QuickTopUpAPI\Api\ApiClient;
use QuickTopUpAPI\Service\StatusCheckService;

/**
 * Class StatusCheckServiceTest
 *
 * @package QuickTopUpAPI\Tests\Service
 *
 * Test cases for the StatusCheckService class.
 */
class StatusCheckServiceTest extends TestCase {

  /**
   * @var StatusCheckService
   *
   * The status check service.
   */
  private StatusCheckService $statusCheckService;

  /**
   * Test the checkStatus method with a CTID that should return "Pending".
   */
  public function testCheckStatusPending() {
    // Testing with a CTID that should return "Pending".
    $response = $this->statusCheckService->checkStatus('1234');

    // Display the response for debugging purposes.
    echo "testCheckStatusPending Response: ";
    var_dump($response);

    $this->assertArrayHasKey('Status', $response);
    $this->assertEquals('Pending', $response['Status']);
  }

  /**
   * Test the checkStatus method with a CTID that should return "Failed".
   */
  public function testCheckStatusFailed() {
    // Testing with a CTID that should return "Failed".
    $response = $this->statusCheckService->checkStatus('12345');

    // Display the response for debugging purposes.
    echo "testCheckStatusFailed Response: ";
    var_dump($response);

    $this->assertArrayHasKey('Status', $response);
    $this->assertEquals('Failed', $response['Status']);
  }

  /**
   * Test the checkStatus method with a CTID that should return "Successful".
   */
  public function testCheckStatusSuccessful() {
    // Using a different CTID that is expected to return "Successful".
    // Replace 'anyOtherCTID' with a valid CTID value according to your API's logic.
    $response = $this->statusCheckService->checkStatus('anyOtherCTID');

    echo "testCheckStatusSuccessful Response: ";
    var_dump($response);

    $this->assertArrayHasKey('Status', $response);
    $this->assertEquals('Successful', $response['Status']);
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    $apiClient = new ApiClient();

    // Instantiate StatusCheckService with the real ApiClient.
    $this->statusCheckService = new StatusCheckService($apiClient);
  }

}
