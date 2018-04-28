<?php
    define ('DS', DIRECTORY_SEPARATOR);
    define ('ROOT', dirname(dirname(__FILE__)));
    define ('VIEW_PATH', ROOT . DS . 'application' . DS . 'views');

    require_once ROOT . DS . 'application' . DS . 'config' . DS . 'Autoloader.php';
    $loader = new Autoloader(ROOT, 'application');

    spl_autoload_register([$loader, 'load']);

    require_once ROOT . DS . 'application' . DS . 'index.php';
