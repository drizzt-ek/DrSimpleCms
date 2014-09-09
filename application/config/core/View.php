<?php

/**
 * Obiekt odpowiedzialny za render widoku. I przekazanie do niego zmiennych
 * User: Drizzt
 * Date: 05.09.14
 * Time: 21:25
 */
namespace application\config\core;
class View
{
    private $params = array();
    private $_viewName;
    private $_controllerName;
    private $_layout;

    public function __construct($controllerName)
    {
        $this->_controllerName = $controllerName;
    }

    /**
     * Metoda pozwalająca przekazać jakąś wartość do widoku
     * @param $name - nazwa zmiennej
     * @param $value - wartość zmiennej
     */
    public function assign($name, $value)
    {
        if (empty($name)) {
            throw new \Exception("Error. Please set variable name in assign method.");
        }
        $this->params[$name] = $value;
    }

    /**
     * Metoda dodająca kontent na podstawie akcji kontrolera
     * @param $actionName
     */
    public function setView($actionName)
    {
        $this->_viewName = str_replace('Action', '', $actionName);
    }

    /**
     * Wstawianie layoutu
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->_layout = $layout;
    }

    /**
     * Metoda dzięki której możemy pobrać wartości przekazane do widoku metodą assign
     * @param $name
     */
    private function g($name)
    {
        if (!empty($this->params[$name])) {
            return $this->params[$name];
        }
        return null;
    }

    /**
     * Metoda wstawiająca kontent widoku.
     */
    public function Content()
    {
        $folderName = str_replace('Controller', '', $this->_controllerName);
        $path = VIEW_ROOT . $folderName . DS . $this->_viewName . '.phtml';
        if (file_exists($path)) {
            include_once $path;
        } else {
            throw new \Exception("Do not find view file: $this->_viewName.");
        }
    }

    /**
     * Metoda renderująca kompletny widok
     */
    public function render()
    {
        $path = THEMES_ROOT . $this->_layout . '.phtml';
        if (file_exists($path)) {
            include_once $path;
        } else {
            throw new \Exception("Do not find layout file: $this->_layout.");
        }
    }
}