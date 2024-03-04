<?php
namespace QuickTopUpAPI\Tests\Service;

use PHPUnit\Framework\TestCase;
use QuickTopUpAPI\Api\ApiClient;
use QuickTopUpAPI\Service\ProductService;

/**
 * Class ProductTest
 *
 * @package QuickTopUpAPI\Tests\Service
 *
 * A test case for the ProductService class.
 */
class ProductServiceTest extends TestCase {

  /**
   * @var ProductService
   *
   * The product service.
   */
  private ProductService $productService;

  /**
   * @var string
   *
   * The API product ID.
   */
  private $apiProductID;

  /**
   * Test the getProductById method.
   */
  public function testGetProductById() {

    // Attempt to fetch the product by ID.
    $product = $this->productService->getProductById($this->apiProductID);

    // Display the response for debugging purposes.
    echo "Response: ";
    var_dump($product);

    // You might want to adjust these assertions based on
    // the expected product structure.
    $this->assertIsArray($product);
    $this->assertArrayHasKey('Product', $product);
    $this->assertEquals($this->apiProductID , $product['Product']);
  }

  /**
   * Set up the test case.
   */
  protected function setUp(): void {
    $apiClient = new ApiClient();

    // Instantiate ProductService with the real ApiClient.
    $this->productService = new ProductService($apiClient);

    // Set the API product ID.
    $this->apiProductID = $_ENV['API_PRODUCT_ID'];
  }

}