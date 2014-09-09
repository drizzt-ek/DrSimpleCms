<?php

/**
 * Autoload - ma za zadnie automatycznie dodać plik klasy do której się odwołujemy
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:05
 */

namespace application\config;


spl_autoload_extensions(".php");

function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DS, $namespace) . DS;
    }
    $fileName .= str_replace('_', DS, $className) . '.php';
    require $fileName;
}
spl_autoload_register('application\config\autoload');