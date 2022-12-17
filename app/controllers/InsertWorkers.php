<?php

class InsertWorkers {

    use Controller;

    public function index() {
        $workers = new Worker;
        //console_log($workers->getDetails());
        $data['workers'] = $workers->allWithRelations();
        $this->view('insertworkers');
    }


    public function add() {
        $locations = new Location;
        $countries = new Country;

        $data['locations'] = $locations->findAll();
        $data['state_provinces'] = $countries->state_provinces();
        $data['countries'] = $countries->findAll();

        $this->view('insertworkers',$data);
    }

    public function insert() {
        $insertworker = new InsertWorkers;

        $insertworker->insert($_POST);

        redirect('workers');
    }

}