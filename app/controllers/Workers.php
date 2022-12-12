<?php

class Workers {

    use Controller;

    public function index() {
        $workers = new Worker;
        //console_log($workers->getDetails());
        $data['workers'] = $workers->getDetails();

        $this->view('workers', $data);
    }
}