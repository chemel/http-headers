<?php

require __DIR__.'/../vendor/autoload.php';

use Alc\HttpHeaders\HttpHeaders;

$httpheaders = new HttpHeaders();

// $headers = $httpheaders->getFile('win7-chrome');
// var_dump($headers);

// $headers = $httpheaders->getHeaders('win7-chrome-fr', Useragents::FORMAT_CURL);
// print_r($headers);

// $headers = $httpheaders->getHeaders('win7-chrome-fr');
// print_r($headers);

// $headers = $httpheaders->getHeaders('googlebot');
// print_r($headers);

// $headers = $httpheaders->getFirefox();
// print_r($headers);

$headers = $httpheaders->getChrome();
print_r($headers);
