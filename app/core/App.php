<?php

class App {
    private $controller = 'Home';
    private $method = 'index';
    private $restrictedMethods = [
        'view',
    ];

    private function splitURL() {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }

    private function checkMethod($method) {
        foreach ($this->restrictedMethods as $key) {
            if($method == $key)
                return false;
            return true;
        }
    }

    public function loadController() {
        $URL = $this->splitURL();

        // Select Controller
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller;

        // SELECT METHOD
        if(!empty($URL[1])) {
            if(method_exists($controller, $URL[1])) {
                if($this->checkMethod($URL[1])) {
                    $this->method = $URL[1];
                }
                unset($URL[1]);
            }
        }

        call_user_func_array([$controller, $this->method], $URL);
    }
}