<?php

/**
 * Ten plik właściwie służy tylko do tego aby przekierować nas na odpowiedni kontroler i akcje.
 * htaccess pomaga nam w tej czynnosci.
 *
 * User: Drizzt
 * Date: 05.09.14
 * Time: 18:42
 */
// Ladowanie wszystkich ważnych stałych systemowych
include_once dirname(__FILE__).'/application/config/path.php';
// Hmm plik śmietnik metod np vd
include_once CONFIG_ROOT.'tools.php';
// Autoloading klas obiektów do któych się odwołujemy.
include_once CONFIG_ROOT.'autoload.php';


// Przekierowanie na odpowiedni kontroler i akcję.
$dispatcher = new \application\config\core\Dispatcher();
$dispatcher->dispatch();