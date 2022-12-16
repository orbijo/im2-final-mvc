<?php

class Suppliers {

    use Controller;

    public function index() {

        $this->view('suppliers/index');
    }
}