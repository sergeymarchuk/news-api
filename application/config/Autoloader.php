<?php

class Autoloader {
    private $baseDir;
    private $baseNamespace;
    private $structure = array();

    public function __construct($baseDir, $baseNamespace = null) {
        $this->baseDir = trim($baseDir, " \t\n\r\0\x0B\\") . DS . $baseNamespace;
        $this->baseNamespace = $baseNamespace;
        $this->init($baseDir . DS . 'application');
    }

    public function load($className) {
        $class = str_replace('\\', DS, $this->clearNamespace($className)) . '.php';
        $file = $this->baseDir . DS . $class;

        if (!file_exists($file)) {
            if ($this->findFile($class) === NULL) {
                die ("class \"{$className}\" is not found");
            }
            
            $file = $this->findFile($class);
        }
        require_once $file;
    }

    private function clearNamespace($class) {
        
        if ($this->baseNamespace && stripos($class, $this->baseNamespace) === 0) {
            $class = substr($class, strlen($this->baseNamespace));
        }

        return trim($class, " \t\n\r\0\x0B\\");
    }

    private function init($baseDir) {
        $list = array_filter(scandir($baseDir), function ($value) {
                if (!in_array($value, array('.','..'))) {
                    return true;
                }
            });

        foreach ($list as $value) {
            if (is_dir($baseDir . DS . $value)) {
                array_push($this->structure, $baseDir . DS . $value);
                $this->init($baseDir . DS . $value);
            }
        }
    }

    private function findFile($file) {
        foreach ($this->structure as $path) {
            if (file_exists($path . DS . $file)) {
                return $path . DS . $file;
            }
        }
    }
}
