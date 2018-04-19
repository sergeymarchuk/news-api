<?php

namespace application\config;

class App {

    public static function run() {
        self::init();
    }

    public static function init() {
        $conf = require_once 'conf.application.php';
        $route = new Router($_SERVER['REQUEST_URI'], $conf['routes']);

        Config::set('name_site', $conf['name_site']);
        Config::set('language', $conf['language']);
    }
}