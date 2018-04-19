<?php

class Autoloader {
    private $baseDir;
    private $baseNamespace;


    public function __construct($baseDir, $baseNamespace = null) {
        $this->baseDir = trim($baseDir, " \t\n\r\0\x0B\\") . DS . $baseNamespace;
        $this->baseNamespace = $baseNamespace;
    }

    public function load($className) {
        $class = $this->clearNamespace($className);
        $file = $this->baseDir . DS . str_replace('\\', DS, $class) . '.php';

        if (!file_exists($file)) {
            die ("class \"{$className}\" is not found");
        }
        require_once $file;
    }

    private function clearNamespace($class) {
        
        if ($this->baseNamespace && stripos($class, $this->baseNamespace) === 0) {
            $class = substr($class, strlen($this->baseNamespace));
        }

        return trim($class, " \t\n\r\0\x0B\\");
    }
}
