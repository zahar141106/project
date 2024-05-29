<?php

namespace App;

class Config
{
    protected static array $_instances = [];
    protected $config;

    private function __construct(string $file)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $file;
        if (file_exists($path)) {
            $this->config = require $path;
        } else {
            die('По указанному пути нет файла');
        }
    }

    public static function getInstance(string $file = 'config/app.php')
    {
        if (!self::$_instances[$file]) {
            self::$_instances[$file] = new self($file);
        }

        return self::$_instances[$file];
    }

    public function getValue(string $name)
    {
        return $this->config[$name];
    }

}