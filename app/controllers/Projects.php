<?php

class Projects {

    use Controller;

    public function index() {

        $this->view('projects/index');
    }
}