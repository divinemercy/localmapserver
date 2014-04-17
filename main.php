<?php

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';

use google\appengine\api\cloud_storage\CloudStorageTools;

$serverKey = "AIzaSyBwWvfmKTali0piBSOwUaaGnT7EdrKWuj0";
$defaultBucket = "localmapserver.appspot.com";
$defaultBucketPath = "gs://" . $defaultBucket;


$lmBucket = "localmapdata";
$lmBucketPath = "gs://" . $lmBucket;

echo 'HHHHHHHHHHello world!!!!!!! localmap <br>';
//file_put_contents('gs://'. $defaultBucket. '/hello.txt', 'Hello');
//echo 'file put <br>';


//$object_url = $lmBucketPathh . '/test.txt';
$object_url = 'gs://localmapdata/test.txt';
$options = stream_context_create(['gs' => ['acl' => 'public-read']]);
echo 'stream context create <br>';

$my_file = fopen($object_url, 'w', false, $options);
echo 'fopen done <br>';
fwrite($my_file, 'my file text document Number');
echo 'fwrite done <br>';

fclose($my_file);
echo 'fclose done <br>';

$object_public_url = CloudStorageTools::getPublicUrl($object_url, false);
echo 'public url = ' . $object_public_url . '<br>';
//header('Location:' . $object_public_url);
