<?php

class InsertWorkers {

    use Controller;

    public function index() {
        $locations = new Location;
        $countries = new Country;

        $data['locations'] = $locations->findAll();
        $data['state_provinces'] = $countries->state_provinces();
        $data['countries'] = $countries->findAll();

        $this->view('insertworkers',$data);
        
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
        $insertworker = new Workers;

        $insertworker->insert($_POST);

        redirect('workers');
    }

}