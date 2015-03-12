<?php

require __DIR__.'/vendor/autoload.php';

spl_autoload_register('my_autoloader');

function my_autoloader($class)
{
        $pathPart = explode('\\', $class);
        $pathPart[0] = __DIR__;
        $path = implode(DIRECTORY_SEPARATOR, $pathPart).'.php';
        if (file_exists($path)){require $path;}

}

