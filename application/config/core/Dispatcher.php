<?php

/**
 * Klasa ma za zadnie przenieść do kontrolera i akcji która jest podana w URL-u.
 * User: Drizzt
 * Date: 05.09.14
 * Time: 20:27
 */
namespace application\config\core;
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
            $controller = new \application\controller\IndexController();
            $controller->init();
            $controller->indexAction();
            $controller->renderView('indexAction');
            return;
        }
        // Jeśli istnieje taki kontroler to utwórz jego obiekt
        $controller = new $this->_controller();
        $controller->init();

        // Sprawdz istnienie akcji w danym kontrolerze
        $action = $this->_action;
        if (empty($action) || !method_exists($controller,$this->_action)) {
            $controller->indexAction();
            $controller->renderView('indexAction');
            return;
        }
        // Jeżeli akcja równierz istnieje to możemy ją wykonać
        $controller->$action();
        $controller->renderView($action);
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
            $this->_controller = '\application\controller\\'.$urlArray[1] . 'Controller';
        }
        //Trzeci element tablicy powinien być akcją
        if (!empty($urlArray[2])) {
            $this->_action = $urlArray[2] . 'Action';
        }

        //TODO Może w przyszłości dodamy obsługę parametrów z urla zamiast z geta.
    }
} 