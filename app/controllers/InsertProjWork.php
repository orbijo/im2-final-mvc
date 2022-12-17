<?php

class InsertProjWork
{
    use Controller;

    public function index() {
        $projects = new Projects;
        $workers = new Workers;
    
       $data['projects'] = $projects->findall();
       $data['workers'] = $workers->findall();


        $this->view('insertprojwork',$data);
    }

    public function add() {
        $projects = new Projects;
        $workers = new Workers;
    
       $data['projects'] = $projects->findall();
       $data['workers'] = $workers->findall();


        $this->view('insertprojwork',$data);
    }
}