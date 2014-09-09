<?php

/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:13
 */

namespace application\controller;
class IndexController extends \application\config\core\ControllerAbstract
{
    public function indexAction()
    {
        //domyślny szablon to default i nie trzbea go deklarować
        //$this->view->setLayout('default');
        
        //przekazujemy tylko zmienną do widoku
        $this->view->assign('test','<br/>TestZmiennej');
    }
}