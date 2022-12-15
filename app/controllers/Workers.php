<?php

class Workers {

    use Controller;

    public function index() {
        $workers = new Worker;
        //console_log($workers->getDetails());
        $data['workers'] = $workers->getDetails();

        $this->view('workers/index', $data);
    }

    public function show($id = 0) {
        $worker = new Worker;
        $countries = new Country;

        $data['countries'] = $countries->findAll();
        $data['worker'] = $worker->firstWithRelations(['worker_id'=>$id]);

        console_log($data);
        $this->view('workers/show', $data);
    }
}