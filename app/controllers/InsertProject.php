<?php

class InsertProject {

    use Controller;

    public function index() {

        $clients = new Client;
        $foremans = new Worker;
    
       $data['foremans'] = $foremans->where(['job_id'=> 2]);
        $data['clients'] = $clients->findall();
        $this->view('insertproject',$data);
    }

    public function insert() {
        $insertproject = new Projects;

        $insertproject->insert($_POST);

        redirect('home');
    }
}