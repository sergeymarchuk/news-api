<?php

namespace application\config;

class Router {
    private $uri;
    private $controller;
    private $action;
    private $params;
    private $language;

    public function __construct($uri, $routes) {
        $this->setDefaultRoute($routes['default']);
        $this->uri = urldecode(trim($uri, '/'));

        $uri_parts = explode('?', $this->uri);
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);

        if (in_array($path_parts[0], Config::get('languagesList'))) {
            $this->language = $path_parts[0];
            array_shift($path_parts);
        }

        if (key_exists($path_parts[0], $routes)) {
            $this->controller = $path_parts[0];
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

    private function setDefaultRoute($default) {
        $this->controller = $default['controller'];
        $this->action = $default['action'];
        $this->language = $default['language'];
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
}