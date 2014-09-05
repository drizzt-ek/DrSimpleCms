<?php
/**
 * Plik zawierający wszystkie zmienne globalne
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:06
 */

define ('DS', "/"); // Director separator

define ('PATH_ROOT', dirname(dirname(dirname(__FILE__)).DS).DS); /* root */
define ('APPLICATION_ROOT',PATH_ROOT.'application'.DS ); /* root */

define ('CONFIG_ROOT',APPLICATION_ROOT.'config'.DS ); /* root */
define ('CORE_ROOT',CONFIG_ROOT.'core'.DS ); /* root */

define ('CONTROLLER_ROOT',APPLICATION_ROOT.'controller'.DS ); /* root */
define ('MODEL_ROOT',APPLICATION_ROOT.'model'.DS ); /* root */
define ('VIEW_ROOT',APPLICATION_ROOT.'view'.DS ); /* root */

define ('PUBLIC_ROOT',PATH_ROOT.'public'.DS ); /* root */
define ('THEMES_ROOT',PUBLIC_ROOT.'themes'.DS ); /* root */
