<?php

/ Example code for connecting to the Google Cloud Datastore

require_once 'config.php';
require_once 'Google/Client.php';
require_once 'Google/Auth/AssertionCredentials.php';
require_once 'Google/Service/Datastore.php';

// assumes that an array like the following is defined in config.php
// $google_api_config = [
//   'application-id' => 'A name for your app engine app',
//   'service-account-name' => 'xxx@developer.gserviceaccount.com',
//   'private-key' => file_get_contents('xxx-privatekey.p12'),
//   'dataset-id' => 'your-app-id'
// ];

function create_entity() {
  $entity = new Google_Service_Datastore_Entity();
  $entity->setKey(createKeyForTestItem());
  $string_prop = new Google_Service_Datastore_Property();
  $string_prop->setStringValue("test field string value");
  $property_map = [];
  $property_map["testfield"] = $string_prop;
  $entity->setProperties($property_map);
  return $entity;
}

