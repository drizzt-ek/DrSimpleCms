<?php
/**
 * Ten plik właściwie służy tylko do tego aby przekierować nas na odpowiedni kontroler i akcje.
 * htaccess pomaga nam w tej czynnosci.
 *
 * User: Drizzt
 * Date: 05.09.14
 * Time: 18:42
 */
include_once '\application\config\autoload.php';

/**
 * To alias do metody var_dump do łatwiejszego debagu.
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
// Przekierowanie na odpowiedni kontroler i akcję.
$dispatcher = new Dispatcher();
$dispatcher->dispatch();