<?php

//session_start();

include_once './config.php';
include_once './utils/ExecutionTracker.php';
//include('./lib/Requests/library/Requests.php');


echo "test22---------- <br>";

//echo ini_get('allow_url_fopen') ? "Enabled" : "Disabled";
////print_r(stream_context_get_default() )."<br>";
//echo "<br>";

function getLongDiffByZoom($zoom) {
    $zoomLongDiff = array(
        17 => 0.00687
    );
    return $zoomLongDiff[$zoom];
}

function getLatDiffByZoom($zoom) {
    $zoomLatDiff = array(
        17 => 0.00656
    );
    return $zoomLatDiff[$zoom];
}

function getGoogleStaticMap($params) {
    $result = "";
    foreach ($params as $key => $value) {
        $result .="&" . $key . "=" . $value;
    }
//    $staticMapUrl = Config::getGoogleApiUrl("staticmap", false) . $result;
    $staticMapUrl = "http://uni2growcameroun.com/app/resources/images/templatemo_image_01.jpg";
    return $staticMapUrl;
}

function appendFileInSession($address, $fileName, $fileContent) {
    if (!isset($_SESSION[$address])) {
        $_SESSION[$address] = array();
    }
    $file = new stdClass();
    $file->fileName = $fileName;
    $file->fileContent = $fileContent;
    $_SESSION[$address][] = $file;
}

function downloadAddressImages($address, $sw, $ne, $params) {
    $mapType = $params["maptype"];
    $zoom = $params["zoom"];
    $format = $params["format"];

    $longDiff = getLongDiffByZoom($zoom);
    $latDiff = getLatDiffByZoom($zoom);

    $colCount = 1;
    $rowCount = 1;

    $centerPtLat = $ne["lat"];
    $centerPtLong = $sw["long"];

//    $time_start = microtime_float();
//    $fileArray = array();

    while (1) {
        echo "Row-" . $rowCount . "----CenterPtLat = " . $centerPtLat . "<br>";
        while (1) {
            $params["center"] = $centerPtLat . "," . $centerPtLong;
            $url = getGoogleStaticMap($params);
            $fileContent = file_get_contents($url, true);
            $fileName = $address . '-z-' . $zoom . '-row-' . $rowCount . '-col-' . $colCount . "." . $format;
            echo $fileName . "<br>";

            if (($centerPtLong + $longDiff) < $ne["long"]) {
                $centerPtLong += $longDiff;
                $colCount++;
            } else {
                break;
            }
        }
        if (($centerPtLat - $latDiff) > $sw["lat"]) {
            $centerPtLat -= $latDiff;
            $rowCount++;
            $colCount = 1;
            $centerPtLong = $sw["long"];
        } else {
            break;
        }
    }
}

$sw = array(
    "lat" => 3.699219099999999,
    "long" => 11.4284419
);
$ne = array(
    "lat" => 3.9613913,
    "long" => 11.5924644
);

$params = array(
    "zoom" => 17,
    "maptype" => "roadmap",
    "scale" => 1,
    "format" => "png",
    "size" => "640x640",
);
$address = "yaounde-roadmap-scale1-";
downloadAddressImages($address, $sw, $ne, $params);









//$time_start = microtime_float();
//
//// Attend pendant un moment
//usleep(1000000);
//
//$time_end = microtime_float();
//$time = $time_end - $time_start;
//
//echo "Ne rien faire pendant $time secondes\n";





//while (1) {
//    check_conn_timeout();
//    $status = connection_status();
////    sleep(1);
//    $exe_time = time() - $_SESSION['start_time'];
////    echo "Connection status = " . $status . "<br>";
////    echo "Connection Time out = " . CONNECTION_TIMEOUT . '<br>';
//    echo "Exe Time = " . $exe_time . '<br>';
//}


