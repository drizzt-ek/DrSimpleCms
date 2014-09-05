<?php
/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:13
 */

class ContactController extends BaseController
{
    public function indexAction()
    {
        //definiujemy inny niż domyślny szablon
        $this->view->setLayout('custom');
        //przekazujemy zmienną do widoku
        $this->view->assign('test','<br/>TestZmiennej');
    }
}