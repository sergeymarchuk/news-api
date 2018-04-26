<?php

namespace application\config;

class App {
    private static $route;

    public static function run() {
        self::init();

        $controller_class = ucfirst(self::$route->getController()) . 'Controller';
        $controller_action = self::$route->getAction() . 'Action';
        $controllerObject = new $controller_class();

        if (method_exists($controllerObject, $controller_action)) {
            $view_path = $controllerObject->$controller_action();
            $view_object = new BaseView($controllerObject->getData(), $view_path);
            $content = $view_object->render();
        }

        $layout_path = self::$route->getLayout();
        $layout_view_object = new BaseView(compact('content'), $layout_path);

        echo $layout_view_object->render();
    }

    public static function init() {
        Config::initDefaultSettings();

        self::$route = new Router($_SERVER['REQUEST_URI']);
    }

    public static function getRoute() {
        return self::$route;
    }
}