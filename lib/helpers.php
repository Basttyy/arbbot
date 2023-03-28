<?php

use Monolog\Handler\StreamHandler;

include __DIR__."/../vendor/autoload.php";

if (! function_exists("logger") ) {

    function logger(string $name = "test_logger", string $file_path = "")
    {
        $file_path = $file_path === "" ? __DIR__."/../logs/".date("y-m-d").".log" : $file_path;
        $logger = new Monolog\Logger($name);
        $logger->pushHandler(new StreamHandler($file_path));

        return $logger;
    }
}