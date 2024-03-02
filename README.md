## QuickTopUpAPI
QuickTopUpAPI is a PHP-based project aimed at demonstrating seamless connections to a financial transaction system for mobile top-ups. The project showcases the integration process by focusing on purchase requests, status checks, and retrieving product information through API endpoints.

## Purpose
QuickTopUpAPI is designed with developers and integrators in mind, providing a foundational example for building and testing API interactions in real-world applications. By offering a streamlined approach to implementing and testing API calls, this project ensures a smooth development experience for services requiring mobile credit top-up functionalities.

## Requirements
* **Implement a Simple Interconnect**: Demonstrate a basic connection to the system's API.
* **Use PHP**: The integration should be implemented in PHP.
* **Focus on Specific Endpoints:**
  * **Purchase Endpoint:** Integrate with the API to send purchase requests.
  * **Status Check Endpoint:** Implement functionality to check the status of purchases.
  * **Product Information:** Retrieve necessary product information for making purchase requests.
  * **Consider Future Extension:** Structure the solution to allow for easy expansion of functionality in the future.

## Development Plan
1. **Environment Setup:**
   - Configure a local development environment with PHP and necessary extensions.
   - Ensure access to a server environment for testing, if required.
2. **Choose Development Approach:**
   - Consider using a simple PHP script or a PHP framework like Symfony, depending on project scale and future extensibility.
3. **Project Structure:**
    - Organize files for configuration, utility functions, and main scripts.
    - Follow framework best practices for larger-scale projects.
4. **API Integration:**
    - Implement authentication with provided test credentials.
    - Develop functions for purchase requests, status checks, and product information retrieval.
5. **Testing:**
    - Test integration components individually and as a whole to ensure functionality.
    - Utilize PHPUnit or similar testing tools, especially with frameworks.
6. **Documentation:**
    - Document code and setup process comprehensively.
    - Focus on how to run the integration and extend it in the future.
7. **Review and Refinement:**
    - Ensure implementation meets requirements and standards.
    - Refactor code for readability and maintainability, preparing for future expansion.
8. **Deployment and Feedback:**
    - Deploy the sample integration to a test environment.
    - Gather feedback and make necessary adjustments based on testing results.
## Usage
To begin using the project, follow these simple steps:

1. **Clone the Repository**: Start by cloning the repository to your local machine:
   ```
   git clone <repository_url>
   ```

2. **Install Dependencies**: Navigate into the project directory and run Composer to install the necessary dependencies:
   ```
   cd <project_directory>
   
   composer install
   ```

3. **Ensure Package Installation**: Make sure all required packages are installed properly. Check the `composer.json` file for a list of dependencies.

4. **Configure Environment Variables**: Rename the `.env.example` file to `.env` and update it with the credentials provided by [PayMaster Worldwide](https://paymasterworldwide.com/en/). This file typically contains settings such as API keys, database connection details, and other configuration options.

5. **Start Using the Project**: Once the setup is complete, you're ready to start using the project! Refer to the project documentation or codebase for specific instructions on how to interact with the functionality provided.

**Note:** This project contains unit tests aimed to validate all the mentioned functionality. To check the performance of the components, you can run the tests using PHPUnit from the project directory:
   ```
   ./vendor/bin/phpunit tests
   ```

Alternatively, you can run tests across Composer using the provided script:
   ```
   composer test
   ```

By running these commands, you can ensure that your project components are functioning as expected.


## Configuration
If your project requires specific configuration settings, API keys, or environment variables, follow these steps to set them up:

1. **Rename Environment File**: Locate the `.env.example` file in the project root directory and rename it to `.env`.

2. **Update Environment Variables**: Open the `.env` file in a text editor and update the values of any relevant environment variables. These variables may include API keys, database connection details, or other configuration settings required for the project to function properly.

3. **Credentials**: Obtain the necessary credentials from [Paymaster Worldwide](https://paymasterworldwide.com/en/) to populate the environment variables related to authentication or API access.

4. **Save Changes**: Save the changes to the `.env` file once you've updated all the required configuration settings.

By following these steps, you can ensure that your project is properly configured and ready to be used in your development environment. If you encounter any issues or have questions about the configuration process, don't hesitate to reach out to [Paymaster Worldwide](https://paymasterworldwide.com/en/) support for assistance.
