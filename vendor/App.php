<?php

class App {
    protected $controller;
    protected $method;
    protected $params;
    protected $dbconnection;

    public function __construct(array $preparedController, Connection $db) {
        $this->controller = $preparedController[0];
        $this->method = $preparedController[1];
        $this->params = array_slice($preparedController, 2);
        $this->dbconnection = $db;
    }

    public function sendResponse() {
        $fullControllerName = 'App\Controllers\\' . $this->controller;
        $fullControllerMethodName = $this->method;
        $controllerInstance = new $fullControllerName(...[$this->dbconnection]);
        try {
            $response = $controllerInstance->$fullControllerMethodName(...$this->params);
        } catch (Exception $e) {
            echo $e;
            exit();
        }

        echo $response;
    }

    public function getConnection() {
        return $this->dbconnection;
    }

    //TODO implement repository using factory
}