<?php

spl_autoload_register(function(string $className) {
   
    $classFile = $className . '.php';
    $classPath = __DIR__ . '/../classes/' . $classFile;

    if(file_exists($classPath)) {
        require_once $classPath;
    }
});