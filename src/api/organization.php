<?php
namespace joatis\ControlPanel;

$client = new GuzzleHttp\Client();
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestBody = file_get_contents('php://input');

$api = new API($client, $requestMethod, $requestBody);
$organization = new Organization();
$database =

switch($requestMethod){
    case 'POST':
        $organization->create($requestBody);
        break;
    default:
        break;
}
