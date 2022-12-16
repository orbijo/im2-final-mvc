<?php

class Clients {

    use Controller;

    public function index() {
        $clients = new Client;
        $data['clients'] = $clients->allWithRelations();


        $this->view('clients/index', $data);
    }

    public function add() {
        $locations = new Location;
        $countries = new Country;

        $data['locations'] = $locations->findAll();
        $data['state_provinces'] = $countries->state_provinces();
        $data['countries'] = $countries->findAll();

        $this->view('clients/add', $data);
    }

    public function insert() {
        $client = new Client;

        $client->insert($_POST);

        redirect('clients');
    }
}