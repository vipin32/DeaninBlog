create vmware host using above library with all fields in foreman api
To create a VMware host using the above library for managing virtual machines with Foreman using Laravel, you can use the createVm() method and specify the appropriate parameters for the host, including all the available fields in the Foreman API.

Here is an example of how you might do this:

Copy code
$manager = new ForemanVmManager();

// Set the parameters for the host
$name = 'My Host';
$operatingSystemId = 1; // ID of the operating system to use for the host
$computeResourceId = 1; // ID of the compute resource to use for the host
$computeProfileId = 1; // ID of the compute profile to use for the host
$environmentId = 1; // ID of the environment to use for the host
$locationId = 1; // ID of the location to use for the host
$organizationId = 1; // ID of the organization to use for the host
$architectureId = 1; // ID of the architecture to use for the host
$domainId = 1; // ID of the domain to use for the host
$puppetClassIds = [1, 2, 3]; // IDs of the Puppet classes to use for the host
$rootPassword = 'password'; // Root password to use for the host
$provisionMethod = 'image'; // Provision method to use for the host
$imageId = 1; // ID of the image to use for the host
$interfaces = [
  [
    'type' => 'Nic::Managed',
    'ip' => '192.168.1.100',
    'mac' => '00:00:00:00:00:01',
  ],
];

// Build the request payload
$payload = [
  'vm' => [
    'name' => $name,
    'operatingsystem_id' => $operatingSystemId,
    'compute_resource_id' => $computeResourceId,
    'compute_profile_id' => $computeProfileId,
    'environment_id' => $environmentId,
    'location_id' => $locationId,
    'organization_id' => $organizationId,
    'architecture_id' => $architectureId,
    'domain_id' => $domainId,
    'puppet_class_ids' => $puppetClassIds,
    'root_pass' => $rootPassword,
    'provision_method' => $provisionMethod,
    'image_id' => $imageId,
    'interfaces_attributes' => $interfaces,
  ],



India Reveals
continue
// Send the request to create the host
$manager->sendRequest('POST', 'vms', [
'json' => $payload,
]);

Copy code

This code sets the various parameters for the host, including the name, operating system, compute resource, compute profile, environment, location, organization, architecture, domain, Puppet classes, root password, provision method, image, and interfaces. It then builds the request payload with these parameters and uses the `sendRequest()` method to send a POST request to the Foreman API to create the host.
