<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Job;
use \Core\Session;
use \Core\Request;

/**
 * Jobs Controller
 */
class Jobs {
	use MainController;

	public function index()
	{
		
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$jobs = new Job;
		$data['jobs'] = $jobs->findAll();
        $this->view('jobs', $data);
	}

	public function add() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$data = [];

		$req = new Request;
		if($req->posted()) {

			$job = new Job();
			
			$job->insert($req->post());

			redirect('jobs');
		}

		$this->view('jobs/add', $data);
	}

	public function edit($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$job = new Job();
			
			$job->update($id, $req->post(), 'job_id');

			redirect('jobs');
		}

		$job = new Job();
        $data['job'] = $job->first(['job_id'=>$id]);

        $this->view('jobs/edit', $data);
    }

	public function delete($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		
		$job = new Job;

		$job->delete($id, 'job_id');

		redirect('jobs');
	}

}