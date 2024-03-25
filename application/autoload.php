<?php

function my_autoload($class_name): void
{
    $file = 'classes/' . strtolower(str_replace('\\', '/', $class_name)) . '.php';

    if (file_exists($file)) {
        require_once($file);
    } else {
        echo $file.'konnte nicht geladen werden';
    }
}

spl_autoload_register('my_autoload');