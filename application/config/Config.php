<?php
namespace application\config;

class Config {
    private static $settings = array();

    public static function get($key) {
        return (isset(self::$settings[$key])) ? self::$settings[$key] : null;
    }

    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }
}
