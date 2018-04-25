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

    public static function initDefaultSettings() {

        if ( empty(self::$settings) ) {
            $default_config = require_once 'app.conf.php';

            foreach ($default_config as $key => $value) {
                self::set($key, $value);
            }

            self::setSources();
        }
    }

    private static function setSources() {
        $sources_list = array();

        $request_string = "https://newsapi.org/v2/sources?apiKey=" . self::$settings['api_key'];
        $sources = json_decode(file_get_contents($request_string));

        if ($sources->status == 'ok') {
            foreach ($sources->sources as $value) {
                $sources_list[$value->id] = $value->name;
            }
        }

        self::set('sources_list', $sources_list);
    }
}
