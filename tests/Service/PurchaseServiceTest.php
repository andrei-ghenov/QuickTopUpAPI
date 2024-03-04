<?php

namespace QuickTopUpAPI\Tests\Service;

use PHPUnit\Framework\TestCase;
use QuickTopUpAPI\Api\ApiClient;
use QuickTopUpAPI\Service\PurchaseService;

/**
 * Class PurchaseServiceTest
 *
 * @package QuickTopUpAPI\Tests\Service
 *
 * Test cases for the PurchaseService class.
 */
class PurchaseServiceTest extends TestCase {

  /**
   * @var PurchaseService
   *
   * The purchase service.
   */
  private PurchaseService $purchaseService;

  /**
   * @var string
   *
   * The API product ID.
   */
  private $apiProductID;

  /**
   * @var string
   *
   * The API product amount.
   */
  private $apiProductAmount;

  /**
   * @var string
   *
   * The API destination phone number.
   */
  private $apiDestinationPhoneNumber;

  /**
   * @var string
   *
   * The API CTID.
   */
  private $apiCTID;

  /**
   * Test the sendPurchase method.
   *
   * @throws \Exception
   */
  public function testSendPurchase() {
    // Attempt to send a purchase request.
    $response = $this->purchaseService->sendPurchase(
      $this->apiProductID,
      $this->apiProductAmount,
      $this->apiDestinationPhoneNumber,
      $this->apiCTID
    );

    // Display the response for debugging purposes.
    echo "testSendPurchase Response: ";
    var_dump($response);

    // Assert that the response contains expected fields.
    $this->assertIsArray($response);
    $this->assertArrayHasKey('TransactionID', $response);
    $this->assertArrayHasKey('Status', $response);
    $this->assertEquals(
      'Successful', $response['Status']
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    $apiClient = new ApiClient();
    $this->purchaseService = new PurchaseService($apiClient);
    $this->apiProductID = $_ENV['API_PRODUCT_ID'];
    $this->apiProductAmount = $_ENV['API_PRODUCT_AMOUNT'];
    $this->apiDestinationPhoneNumber = $_ENV['API_DESTINATION_PHONE_NUMBER'];
    $this->apiCTID = $_ENV['API_CTID'];
  }

}
