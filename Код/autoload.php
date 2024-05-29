<?php
error_reporting(E_ERROR);

spl_autoload_register(function ($class) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Config.php';

    $config = App\Config::getInstance();
    $includeDirs = $config->getValue('autoload');

    foreach ($includeDirs as $prefix => $includeDir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }

        $relativeClass = substr($class, $len);

        $file = $includeDir . '/' . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require_once  $file;
        }
    }
});

require_once 'src/functions/functions.php';