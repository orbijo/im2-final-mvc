<?php

class InsertSupplier {

    use Controller;

    public function index() {
        $locations = new Location;
        $countries = new Country;

        $data['locations'] = $locations->findAll();
        $data['state_provinces'] = $countries->state_provinces();
        $data['countries'] = $countries->findAll();
        $this->view('insertsupplier',$data);
    }
}