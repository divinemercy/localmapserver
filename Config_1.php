<?php

$google_api_config = [
    'application-id' => 'A name for your app engine app',
    'service-account-name' => 'xxx@developer.gserviceaccount.com',
    'private-key' => file_get_contents('xxx-privatekey.p12'),
    'dataset-id' => 'your-app-id'
];

class Config {

    public static $apiKey = "AIzaSyBwWvfmKTali0piBSOwUaaGnT7EdrKWuj0";
    public static $maxExecutionTime = 60;
    public static $googleApiUrl = array(
        "staticmap" => "http://maps.googleapis.com/maps/api/staticmap"
    );

    public static function getGoogleApiKey() {
        return Config::$apiKey;
    }

    public static function getGoogleApiUrl($api, $addApiKey = true) {
        $url = "";
        if (isset(Config::$googleApiUrl[$api])) {
            if ($addApiKey) {
                $url = Config::$googleApiUrl[$api] . "?key=" . Config::$apiKey;
            } else {
                $url = Config::$googleApiUrl[$api];
            }
        }
        return $url;
//        $staticMapUrl = "http://maps.googleapis.com/maps/api/staticmap?key=" . $apiKey . "&size=640x640";
    }

    public static function getMaxExecutionTime() {
        return Config::$maxExecutionTime;
    }

}
