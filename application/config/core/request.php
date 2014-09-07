<?php

/**
 * Obiekt do obsługi requestu ;)
 * User: Drizzt
 * Date: 06.09.14
 * Time: 22:29
 */
class request
{
    private $_post;
    private $_get;
    private $_file;

    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;
        $this->_file = $_FILES;
    }

    /**
     * Pobierz merge tablic posta i geta
     * @return array
     */
    public function getParams()
    {
        return array_merge($this->_get, $this->_post);
    }

    /**
     * Pobierz post
     * @return mixed
     */
    public function getPost()
    {
        return $this->_post;
    }

    /**
     * Pobierz get
     * @return mixed
     */
    public function getGet()
    {
        return $this->_get;
    }
    /**
     * Pobierz get
     * @return mixed
     */
    public function getFile()
    {
        return $this->_file;
    }

    /**
     * Metoda sprawdzająca czy istnieje tablica post
     * @return bool
     */
    public function isPost()
    {
        if (!empty($this->_post) && count($this->_post) > 0) {
            return true;
        }
        return false;
    }
} 