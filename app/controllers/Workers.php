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
        $locations = new Location;

        $data['countries'] = $countries->findAll();
        $data['worker'] = $worker->firstWithRelations(['worker_id'=>$id]);
        $data['foremen'] = $worker->where(['job_id'=>2]);
        $data['state_provinces'] = $countries->state_provinces();
        $data['locations'] = $locations->findAll();
        console_log($data);

        $this->view('workers/show', $data);
    }

    public function create() {
        console_log($_POST['submit']);
    }

    public function update() {

        $worker = new Worker;

        $worker->update($_POST['worker_id'], $_POST, 'worker_id');

        redirect('workers');
    }
}