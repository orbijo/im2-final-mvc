<?php

class InsertWorkers {

    use Controller;

    public function index() {

        $this->view('insertworkers');
    }

    public function add() {
        $location_id = new location_id;
        $city = new city;

        $data['location_id'] = $location_id->findAll();
        $data['city'] = $city->findAll();

        $this->view('workers/insertworkers',$data);
    }
}