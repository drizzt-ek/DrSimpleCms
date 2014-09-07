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
        $this->_url = empty($_SERVER['REDIRECT_URL'])?null:$_SERVER['REDIRECT_URL'];
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
        //Jeżeli zmienna url jest pusta to nie ma z czego wyciagać nazw kontrolera i akcji.
        if (empty($this->_url)) {
            return;
        }
        //Rozbijamy adres ze zmiennej $_SERVER po / i otrzymujemy (powinniśmy otrzymać) tablice z akcja i kontrolerem
        $urlArray = explode('/', $this->_url);
        //Pierwszy element tablicy to element pusty
        //Drugi element tablicy powinien być controlerem
        if (!empty($urlArray[1])) {
            $this->_controller = strtolower($urlArray[1]) . 'Controller';
        }
        //Trzeci element tablicy powinien być akcją
        if (!empty($urlArray[2])) {
            $this->_action = strtolower($urlArray[2]) . 'Action';
        }

        //TODO Może w przyszłości dodamy obsługę parametrów z urla zamiast z geta.
    }
} 