<?php

function __autoload($class)
{
    if (file_exists(__DIR__ . '/Classes/' .$class . '.php'))
    {
        require __DIR__ . '/Classes/' .$class . '.php';
    }
//    else if(file_exists(__DIR__ .'/Controllers/' . $class . '.php'))
//    {
//        require __DIR__ .'/Controllers/' . $class . '.php';
//    }
    else if(file_exists(__DIR__ . '/Models/' . $class . '.php'))
    {
        require __DIR__ . '/Models/' . $class . '.php';
    }
    else if(file_exists(__DIR__ . '/Views/' . $class . '.php'))
    {
        require __DIR__ . '/Views/' . $class . '.php';
    }
    else
    {

        $classParts = explode('\\',$class);
        $classParts[0] = __DIR__;
        $path = implode(DIRECTORY_SEPARATOR,$classParts) . '.php';
        if (file_exists($path))
        {
            require $path;
        }
    }

}