<?php

class Jobs {

    use Controller;

    public function index() {

        $this->view('jobs/index');
    }
}