<?php
/**
 * Autoload - ma za zadnie automatycznie dodać plik klasy do której się odwołujemy
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:05
 */


include_once 'path.php';

function __autoload($classname)
{
    $paths = array(
        CORE_ROOT,
        CONTROLLER_ROOT,
        MODEL_ROOT,
    );
    foreach ($paths as $path) {
        if (file_exists($path . $classname . '.php')) {
            require_once $path . $classname . '.php';
            return;
        }
    }
}