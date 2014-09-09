<?php

/**
 * Plik zawierający zbiór metod które maja nam ułatwić proces tworzenia aplikacji - śmietnik ;/
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:05
 */


/**
 * To alias do metody var_dump do łatwiejszego debug-u. Do wydzielenia osobny plik
 * @param $const
 * @param bool $exit
 */
function vd($const,$exit=false){
    echo '<pre>';
    var_dump($const);
    echo '</pre>';

    if($exit){
        exit;
    }
}