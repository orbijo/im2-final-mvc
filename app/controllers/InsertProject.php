<?php

class InsertProject {

    use Controller;

    public function index($id = 2) {
       // $locations = new Location;
       // $countries = new Country;
        $clients = new Client;
        $foremans = new Worker;
      //  $jobs = new Jobs;
       
        //$data['locations'] = $locations->findAll();
        //$data['state_provinces'] = $countries->state_provinces();
       // $data['countries'] = $countries->findAll();
       $data['foremans'] = $foremans->firstWithRelations(['job_id'=>$id]);
       //$data['jobs'] = $jobs->findall();
        $data['clients'] = $clients->findall();
        $this->view('insertproject',$data);
    }
}