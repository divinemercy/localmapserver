<?php

function getLocalmap(){
    return array(
        success => true
    );
}

function getLongDiffByZoom($zoom) {
    //Zoom longitude Diff
    $zoomLongDiff = array(
        17 => 0.00687
    );
    return $zoomLongDiff[$zoom];
}

function getLatDiffByZoom($zoom) {
    //Zoom longitude Diff
    $zoomLatDiff = array(
        17 => 0.00656
    );
    return $zoomLatDiff[$zoom];
}

function getGoogleApiKey() {
    $apiKey = "AIzaSyAOdZeoBsvFL-ZfVc37okgUgdDyU4xxAfw";
    return $apiKey;
}

function getMapImageBaseUrl() {
    return "./images";
}

function getStaticMapBaseUrl() {
    $apiKey = getGoogleApiKey();
    $staticMapUrl = "http://maps.googleapis.com/maps/api/staticmap?key=" . $apiKey . "&size=640x640";
    return $staticMapUrl;
}

function downloadStaticMapImage($arrayParams, $fileName) {
    $result = "";
    foreach ($arrayParams as $key => $value) {
        $result .="&" . $key . "=" . $value;
    }
    $staticMapUrl = getStaticMapBaseUrl() . $result;
    $fileContent = file_get_contents($staticMapUrl);
    file_put_contents($fileName, $fileContent);
}

function downloadAddressImages($addressId, $arrayParams, $sw, $ne) {
    $mapType = $arrayParams["maptype"];
    $zoom = $arrayParams["zoom"];
    $format = $arrayParams["format"];


    $longDiff = getLongDiffByZoom($zoom);
    $latDiff = getLatDiffByZoom($zoom);

    $colCount = 1;
    $centerPtLong = $sw["long"];

    $rowCount = 1;
    $centerPtLat = $ne["lat"];
    while (true) {
        echo "Row-" . $rowCount . "----CenterPtLat = " . $centerPtLat . "\n";
        while (true) {
            $dirName = getMapImageBaseUrl() . "/" . $addressId . "/" . $mapType . "/z-" . $zoom . "/row-" . $rowCount;
            if (!file_exists($dirName)) {
                mkdir($dirName, 0777, true);
            }
            $fileName = $dirName . '/col-' . $colCount . "." . $format;
            $arrayParams["center"] = $centerPtLat . "," . $centerPtLong;
            if (!file_exists($fileName)) {
                downloadStaticMapImage($arrayParams, $fileName);
            } else {
                if (filesize($fileName) == 0) {
                    unlink($fileName);
                    downloadStaticMapImage($arrayParams, $fileName);
                }
            }
            echo "-----------CenterPtLong = $centerPtLong      Col= " . $colCount . "\n";
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

//$addressId = "dschang-roadmap-scale1-png";
//$sw = array(
//    "lat" => 5.4234206,
//    "long" => 10.0269127
//);
//$ne = array(
//    "lat" => 5.482034,
//    "long" => 10.0968646
//);
//$arrayParams = array(
//    "zoom" => 17,
//    "maptype" => "roadmap",
//    "scale" => 1,
//    "format" => "png"
//);

//$addressId = "yaounde-roadmap-scale2-png";
//$sw = array(
//    "lat" => 3.699219099999999,
//    "long" => 11.4284419
//);
//$ne = array(
//    "lat" => 3.9613913,
//    "long" => 11.5924644
//);
//$arrayParams = array(
//    "zoom" => 17,
//    "maptype" => "roadmap",
//    "scale" => 2,
//    "format" => "png"
//);

//echo "test \n";
//downloadAddressImages($addressId, $arrayParams, $sw, $ne);
//echo "test finish \n";

////$arrayParams = array(
////    "center" => "5.450111,10.065000",
////    "scale" => 3,
////    "zoom" => 17,
////    "maptype" => "hybrid"
////);
////$json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=yaoundé&sensor=false");
//// Next, make sure Requests can load internal classes
//
//
//Requests::register_autoloader();
//echo "test test test test test <br>";
////$request = Requests::get(
////                'https://maps.googleapis.com/maps/api/geocode/json', array(), array(
////            'address' => 'yaoundé',
////            "sensor" => false,
////            "key" => getGoogleApiKey()
////        ));
//
//$url = "https://maps.googleapis.com/maps/api/geocode/json?address=yaoundé&sensor=false&key=" . getGoogleApiKey();
////$url = "http://localhost/Google/StaticMap/post.php";
//$params = array();
//$request = Requests::post($url, array(), $params);
//
//// Check what we received
//echo "<pre>";
////print_r($request);
//var_dump($request);
//echo "</pre>";
//
//echo "test test test test test enddddddddd<br>";
////file_put_contents("test.json", $json);
////
////echo"<pre>";
////print_r(json_decode($json));
//////print_r($json);
////echo"</pre>";
//
////echo "start<br>";
////echo getImage(array(
////    "center" => "5.450111,10.065000",
////    "scale" => 3,
////    "zoom" => 17
////));
////$fileName = "http://localhost/TEST/applications.png";
////$fileContent = file_get_contents($fileName);
////file_put_contents("./images/test.png", $fileContent);
////echo "end<br>";

