<?php
/**
 * Klasa abstrakcyjna w tym przypadku definiuje nam podstawowe metody które będą nam potrzebne w dispacherze.
 * User: Drizzt
 * Date: 05.09.14
 * Time: 20:54
 */
abstract class controllerAbstract
{
    protected $POST = array();
    protected $GET = array();
    protected $model = null;
    protected $controllerName;
    /**
     * @var View $view
     */
    protected $view;

    /**
     * Zainicjowanie podstawowaych zmiennych dla kontrolera
     */
    public function init()
    {
        $this->POST = $_POST;
        $this->GET = $_GET;
        $this->controllerName = get_called_class();
        $model = str_replace('Controller', 'Model', $this->controllerName);
        if (class_exists($model)) {
            $this->model = new $model();
        }
        $this->view = new View($this->controllerName);
        $this->view->setLayout('default');
    }

    /**
     * Renderowanie widoku danej akcji w kontrolerze
     * @param $action
     */
    public function renderView($action){
        $this->view->setView($action);
        $this->view->render();
    }
} 