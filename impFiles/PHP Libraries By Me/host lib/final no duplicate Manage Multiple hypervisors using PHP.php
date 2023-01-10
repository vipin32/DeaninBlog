To remove duplication in the library for managing virtual machines with Foreman using Laravel, you could consider the following options:

Create a function or method to encapsulate the common code for sending requests to the Foreman API. This could include setting the headers, sending the request, and handling any errors that may occur.

Use inheritance and polymorphism to define a base class that implements the common code for sending requests to the Foreman API, and have the other classes inherit from the base class. This would allow you to reuse the common code in multiple classes, while still allowing for specific behavior for each class.

Extract the common code for sending requests to the Foreman API into a separate utility class or package, and use that utility class or package in the various methods of the ForemanVmManager class. This would allow you to reuse the common code across multiple libraries and projects.

Here is an example of how you might implement these suggestions:

Copy code
<?php

namespace App\Libraries;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ForemanVmManager
{
  private $client;
  private $baseUrl;
  private $apiKey;

  public function __construct()
  {
    // Set up the API client
    $this->client = new Client();
    $this->baseUrl = config('services.foreman.base_url');
    $this->apiKey = config('services.foreman.api_key');
  }

  private function sendRequest($method, $endpoint, $options = [])
  {
    try {
      // Set the default options for the request
      $options = array_merge([
        'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => "Basic $this->apiKey",
        ],
      ], $options);

      // Send the request
      return $this->client->request($method, "$this->baseUrl/api/v2/$endpoint", $options);
    } catch (ClientException $e) {
      // Handle any errors that may occur
      // ...
    }
  }

  public function getVmList()
  {
    // Send the request to get the list of virtual machines
    $response = $this->sendRequest('GET', 'vms');

   



India Reveals
continue
// Decode the response
$vmList = json_decode($response->getBody());

Copy code
return $vmList['results'];
}

public function createVm($name, $operatingSystemId, $computeResourceId)
{
// Build the request payload
$payload = [
'vm' => [
'name' => $name,
'operatingsystem_id' => $operatingSystemId,
'compute_resource_id' => $computeResourceId,
],
];

Copy code
// Send the request to create the virtual machine
$this->sendRequest('POST', 'vms', [
  'json' => $payload,
]);
}

public function startVm($id)
{
// Send the request to start the virtual machine
$this->sendRequest('POST', "vms/$id/power", [
'json' => [
'power_action' => 'start',
],
]);
}

public function stopVm($id)
{
// Send the request to stop the virtual machine
$this->sendRequest('POST', "vms/$id/power", [
'json' => [
'power_action' => 'stop',
],
]);
}

public function deleteVm($id)
{
// Send the request to delete the virtual machine
$this->sendRequest('DELETE', "vms/$id");
}
}

Copy code

In this example, the `sendRequest()` method encapsulates the common code for sending requests to the Foreman API, including setting the headers and handling errors. The various methods of the `ForemanVmManager` class can then use the `sendRequest()` method to send requests to the Foreman API, passing the required parameters such as the HTTP method, the endpoint, and any additional options as needed.

This allows you to reuse the common code for sending requests to the Foreman API in multiple places, while still allowing for specific behavior for each method. You can also modify the `sendRequest()` method to handle any additional errors or scenarios that may occur while sending requests to the Foreman API.