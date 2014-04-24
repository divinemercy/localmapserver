<?php

class Config {

    public static $apiKey = "AIzaSyAOdZeoBsvFL-ZfVc37okgUgdDyU4xxAfw";
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
