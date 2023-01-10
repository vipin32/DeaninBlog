create dual interface host with above library

To create a dual interface host with the above library for managing virtual machines with Foreman using Laravel, you can use the createVm() method and specify the appropriate parameters for the host.

Here is an example of how you might do this:

Copy code
$manager = new ForemanVmManager();

// Set the parameters for the host
$name = 'My Host';
$operatingSystemId = 1; // ID of the operating system to use for the host
$computeResourceId = 1; // ID of the compute resource to use for the host
$interfaces = [
  [
    'type' => 'Nic::BMC',
    'ip' => '192.168.1.100',
    'mac' => '00:00:00:00:00:01',
  ],
  [
    'type' => 'Nic::Managed',
    'ip' => '192.168.2.100',
    'mac' => '00:00:00:00:00:02',
  ],
];

// Build the request payload
$payload = [
  'vm' => [
    'name' => $name,
    'operatingsystem_id' => $operatingSystemId,
    'compute_resource_id' => $computeResourceId,
    'interfaces_attributes' => $interfaces,
  ],
];

// Send the request to create the host
$manager->sendRequest('POST', 'vms', [
  'json' => $payload,
]);

This code sets the parameters for the host, including the name, operating system, compute resource, and the two interfaces with their respective IP addresses and MAC addresses. It then builds the request payload with these parameters and uses the sendRequest() method to send a POST request to the Foreman API to create the host.

Consult the Foreman API documentation for more information on the available parameters and options for creating a host. You may also want to modify the code to handle any errors that may occur while creating the host.