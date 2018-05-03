<?php

namespace application\config;


class BaseView {
    protected $data;
    protected $path;

    public function __construct($data = array(), $path = NULL) {
        $this->data = $data;

        if (!$path) {
            $this->path = VIEW_PATH . DS . App::getRoute()->getController() . DS . App::getRoute()->getAction() . '.php';
        }

        if (!file_exists($path)) {
            return FALSE;
        }

        $this->path = $path;
    }

    /**
     * @return string
     */
    public function render() {
        $data = $this->data;

        ob_start();
        include($this->path);
        $content = ob_get_clean();

        return $content;
    }
}