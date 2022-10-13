<?php

require_once("vendor/autoload.php");

use OpenAPI\Client\Api\DefaultApi;
use OpenAPI\Client\Configuration;

$configFile = "/etc/releasetool/youtrack.ini";
if (!file_exists($configFile))
    die("YouTrack configuration file not found: " . $configFile);
$config = parse_ini_file($configFile, false);
if (!isset($config->host) || !isset($config->apiToken))
    die("YouTrack host or API token missed in /etc/releasetool/youtrack.ini");

$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken($config->apiToken)
    ->setHost($config->host);


$apiInstance = new OpenAPI\Client\Api\DefaultApi(
// If you want to use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->;
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->activitiesGet: ', $e->getMessage(), PHP_EOL;
}

