<?php

// First, include Requests
include('../library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();

//$url = "http://localhost:14083/response.php";
$url = "http://uni2growcameroun.com/app/resources/images/templatemo_image_01.jpg";
//$request = Requests::get($url, array('Accept' => 'application/json'));
$request = Requests::get($url, array('Accept' => 'image/jpg'));

// Check what we received
echo "<pre>";
//var_dump($request);
print_r($request->body);
echo "</pre>";
