<?php
/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 18:42
 */
include_once '\application\config\autoload.php';

function vd($const,$exit=false){
    echo '<pre>';
    var_dump($const);
    echo '</pre>';

    if($exit){
        exit;
    }
}
$dispatcher = new Dispatcher();
$dispatcher->dispatch();