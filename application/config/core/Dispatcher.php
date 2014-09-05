<?php

/**
 * Klasa ma za zadnie przenieść do kontrolera i akcji która jest podana w URL-u.
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
        // Przygotowujemy sobie urla
        $this->_prepareUrl();
        // Jeżeli nie istnieje taki kontroller to podstaw domyślny
        if (empty($this->_controller) || !class_exists($this->_controller)) {
            $oController = new IndexController();
            $oController->init();
            $oController->indexAction();
            $oController->renderView('indexAction');
            return;
        }
        // Jeśli istnieje taki kontroler to utwórz jego obiekt
        $oController = new $this->_controller();
        $oController->init();

        // Sprawdz istnienie akcji w danym kontrolerze
        $action = $this->_action;
        if (empty($action) || !method_exists($oController,$this->_action)) {
            $oController->indexAction();
            $oController->renderView('indexAction');
            return;
        }
        // Jeżeli akcja równierz istnieje to możemy ją wykonać
        $oController->$action();
        $oController->renderView($action);
        return;
    }

    /**
     * Metoga przygotowuje - wyodrębnia nazwę kontrolera i akcji
     */
    private function _prepareUrl()
    {
        $urlArray = explode('/', $this->_url);
        $this->_controller = strtolower($urlArray[1]) . 'Controller';
        $this->_action = strtolower($urlArray[2]) . 'Action';
    }
} 