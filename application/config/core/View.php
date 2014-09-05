<?php

/**
 * User: Drizzt
 * Date: 05.09.14
 * Time: 21:25
 */
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

    public function assign($name, $value)
    {
        if (empty($name)) {
            return false;
        }
        $this->params[$name] = $value;
    }

    public function setView($actionName)
    {
        $this->_viewName = str_replace('Action', '', $actionName);
    }

    public function setLayout($layout)
    {
        $this->_layout = $layout;
    }

    /**
     * g czyli get
     * @param $name
     */
    private function g($name){
        if(!empty($this->params[$name])){
            return $this->params[$name];
        }
        return null;
    }
    public function Content()
    {
        $folderName = str_replace('Controller', '', $this->_controllerName);
        include_once VIEW_ROOT . $folderName . DS . $this->_viewName . '.phtml';
    }

    public function render()
    {
        include_once THEMES_ROOT . $this->_layout . '.phtml';

//        include_once VIEW_ROOT . $folderName.DS.$this->_viewName.'.phtml';
    }
}