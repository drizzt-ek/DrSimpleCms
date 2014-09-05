<?php
/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 19:13
 */

class IndexController extends BaseController
{
    public function indexAction()
    {
        $this->view->assign('test','<br/>TestZmiennej');
    }
}