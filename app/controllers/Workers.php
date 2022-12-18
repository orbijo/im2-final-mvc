<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Worker;
use \Model\Job;
use \Core\Request;
use \Core\Session;

/**
 * Workers Controller
 */
class Workers {
	use MainController;

	public function index()	{
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$workers = new Worker;
		$data['workers'] = $workers->allWithRelations();
        $this->view('workers', $data);
	}
	
	public function add() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$data = [];

		$jobs = new Job;
		$foremen = new Worker;

		$data['jobs'] = $jobs->findAll();
		$row = $jobs->first(['job_title'=>'Foreman']);

		if($row){
			$data['foremen'] = $foremen->where(['job_id' => $row->job_id]);
		}
		

		$req = new Request;
		if($req->posted()) {

			$worker = new Worker();
			
			$req->set('hire_date', date("Y-m-d"));
			$worker->insert($req->post());

			redirect('workers');
		}

		$this->view('workers/add', $data);
	}

	public function edit($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$worker = new Worker();
			
			$worker->update($id, $req->post(), 'worker_id');

			redirect('workers');
		}
		$jobs = new Job;
		$worker = new Worker;

		$row = $jobs->first(['job_title'=>'Foreman']);

        $data['worker'] = $worker->firstWithRelations(['worker_id'=>$id]);
        $data['foremen'] = $worker->where(['job_id' => $row->job_id]);

        $this->view('workers/edit', $data);
    }

	public function delete($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		
		$worker = new Worker;

		$worker->delete($id, 'worker_id');

		redirect('workers');
	}

}