<?php

namespace application\config;

class Router {
    private $uri;
    private $controller;
    private $action;
    private $params;
    private $language;
    private $layout_path;

    public function __construct($uri) {
        $routes = require_once 'app.routes.php';

        $this->setDefaultRoute($routes['default']);
        $this->uri = urldecode(trim($uri, '/'));

        $uri_parts = explode('?', $this->uri);
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);

        if (in_array($path_parts[0], Config::get('languages_list'))) {
            $this->language = $path_parts[0];
            array_shift($path_parts);
        }

        if (key_exists($path_parts[0], $routes)) {
            $this->controller = $path_parts[0];
            $this->layout_path = VIEW_PATH . DS . $this->controller . '.layout.php';
            array_shift($path_parts);
        }

        if (in_array($path_parts[0], $routes[$this->controller])) {
            $this->action = $path_parts[0];
            array_shift($path_parts);
        }

        if (!empty($path_parts)) {
            $this->params = $path_parts;
        }
    }

    /**
     * @param $default
     */
    private function setDefaultRoute($default) {
        $this->controller = $default['controller'];
        $this->action = $default['action'];
        $this->language = $default['language'];
        $this->layout_path = VIEW_PATH . DS . $default['layout'] . '.php';
    }

    /**
     * @return mixed
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getLayout() {
        return $this->layout_path;
    }
}