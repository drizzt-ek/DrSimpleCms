<?php

/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 20:27
 */
class Dispatcher
{
    private $_url;
    private $_controller = null;
    private $_action = null;

    public function __construct()
    {
        $this->_url = $_SERVER['REDIRECT_URL'];
    }

    public function dispatch()
    {
        $this->_prepareUrl();
        if (empty($this->_controller) || class_exists($this->_controller)) {
            $oController = new IndexController();
            $oController->init();
            $oController->indexAction();
            $oController->renderView('indexAction');
            return;
        }
        $oController = new $this->_controller();
        $oController->init();
        $action = $this->_action;
        if (empty($action) || method_exists($oController,$this->_action)) {
            $oController->indexAction();
            $oController->renderView('indexAction');
            return;
        }
        $oController->$action();
        $oController->renderView($action);
        return;
    }

    private function _prepareUrl()
    {
        $urlArray = explode('/', $this->_url);
        $this->_controller = strtolower($urlArray[1]) . 'Controller';
        $this->_action = strtolower($urlArray[2]) . 'Action';
    }
} 