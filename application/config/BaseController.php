<?php

namespace application\config;

class BaseController {

    protected $data;
    protected $model;
    protected $params;

    public function __construct($data = array()) {
        $this->data = $data;
        $this->params = App::getRoute()->getParams();
    }

    /**
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getParams() {
        return $this->params;
    }
}