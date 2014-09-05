<?php
/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:05
 */


include_once 'path.php';

function __autoload($classname) {
//    vd($classname);
    $paths=array(
        CORE_ROOT,
        CONTROLLER_ROOT,
        MODEL_ROOT,
    );
    foreach ($paths as $path) {
        if (file_exists($path . $classname . '.php')) {
//            vd($classname);
            require_once $path . $classname . '.php';
            return;
        }
    }
//    $filename = "./". $classname .".php";
//    include_once($filename);
}

//spl_autoload_register('__autoload');