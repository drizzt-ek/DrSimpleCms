<?php
/**
 * Klasa abstrakcyjna w tym przypadku definiuje nam podstawowe metody które będą nam potrzebne w dispacherze.
 * User: Drizzt
 * Date: 05.09.14
 * Time: 20:54
 */
abstract class controllerAbstract
{
    /**
     * @var request $request
     */
    protected $request;
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
        //Obiekt odpowiedzialny za pobieranie danych z get i post
        $this->request = new request();
        //Pobieranie nazwy kontrolera który został wywołany przez dispatcher
        $this->controllerName = get_called_class();
        //Z nazwy kontrolera tworzymy nazwę modelu który musi być takiej samej nazwy jak kontroler
        $model = str_replace('Controller', 'Model', $this->controllerName);
        if (class_exists($model)) {
            $this->model = new $model();
        }else{
            // Jeżeli nie istnieje to zarzuć wyjątkiem :).
            throw new Exception('Nie istnieje model o nazwie '.$model);
        }
        //Inicjujemy obiekt który ma za zadanie zarządzać layoutem.
        $this->view = new View($this->controllerName);
        //Ustawiamy domyślny layout aplikacji
        $this->view->setLayout('default');
    }

    /**
     * Renderowanie widoku danej akcji w kontrolerze
     * @param $action
     */
    public function renderView($action){
        //Przekaż do obiektu View akcje która została wykonana
        $this->view->setView($action);
        //Zwróć na ekran wyrenderowaną treść
        $this->view->render();
    }
} 