<?php

namespace application\config;

class Router {
    private $uri;
    private $controller;
    private $action;
    private $params;
    private $language;

    public function __construct($uri, $routes) {
        $this->uri = urldecode(trim($uri, '/'));

        $uri_parts = explode('?', $this->uri);
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);
        if (in_array($path_parts[0], array('en', 'ru', 'ua'))) {
            $this->language = $path_parts[0];
        }
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
    public function getLanguage()
    {
        return $this->language;
    }
}