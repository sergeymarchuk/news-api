<?php

namespace application\models;

//use application\models\APIRequest;

class User {
    private $location;
    private $sources = [];
    private $country;

    public function __construct() {
        $this->location = $this->setLocation();
    }

    private function setLocation() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
        return strtolower($response->countryCode);
    }

    public function getLocation() {
        return $this->location;
    }

    public static function getUser() {
        if (!empty($_COOKIE['user'])) {
            return unserialize($_COOKIE['user']);
        } else {
            return self;
        }
    }

    public function addSources($sources) {
        foreach ($sources as $value) {
            array_push($this->sources['sources'], $value) ;
        }
    }

    public function setCountry($country) {
        //check country in list;
        $this->country = $country;
    }

    public function getCountry() {
        return $this->country;
    }
}