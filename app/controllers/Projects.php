<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Core\Session;
use \Core\Request;
use \Model\Project;
use \Model\Worker;
use \Model\Client;
use \Model\Location;
use \Model\Job;
use \Model\ProjectSuppliers;
use \Model\ProjectWorkers;

/**
 * Projects Controller
 */
class Projects {
	use MainController;

	public function index()
	{
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$projects = new Project;

		$data['projects'] = $projects->allWithRelations();
		// console_log($data['projects']);
		
        $this->view('projects', $data);
	}

	public function manage($id = 0) {

		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$data = [];

		$req = new Request;
		if($req->posted()) {

			// Check which form submitted
			if(array_key_exists('submit_worker', $req->post())) {
				// ProjectWorkers
				
				$worker = new ProjectWorkers();
			
				$worker->insert($req->post());

			} elseif(array_key_exists('submit_supplier', $req->post())) {
				// ProjectSuppliers

				$supplier = new ProjectSuppliers();
			
				$supplier->insert($req->post());

			}

			redirect('projects/manage/'.$id);
			
		}

		$project = new Project;
		$data['project'] = $project->first(['project_id' => $id]);

		$workers = new ProjectWorkers();
		$data['workers_not'] = $workers->getOuter($id);
		$data['workers'] = $workers->getInner($id);

		$suppliers = new ProjectSuppliers;
		$data['suppliers_not'] = $suppliers->getOuter($id);
		$data['suppliers'] = $suppliers->getInner($id);

		$this->view('projects/manage', $data);
	}

	public function add() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$data = [];

		$req = new Request;
		if($req->posted()) {

			$project = new Project();
			
			$project->insert($req->post());

			redirect('projects');
		}

		$workers = new Worker;
		$clients = new Client;
		$locations = new Location;
		$jobs = new Job;

		$row = $jobs->first(['job_title'=>'Foreman']);

		if($row){
			$data['foremen'] = $workers->where(['job_id' => $row->job_id]);
		}
		
		$data['clients'] = $clients->findAll();
		$data['locations'] = $locations->allWithRelations();

		$this->view('projects/add', $data);
	}

	public function edit($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {
			console_log($req->post());
			$project = new Project();
			
			$project->update($id, $req->post(), 'project_id');

			redirect('projects');
		}

		$project = new Project;
		$workers = new Worker;
		$clients = new Client;
		$locations = new Location;
		$jobs = new Job;

		$row = $jobs->first(['job_title'=>'Foreman']);

		$data['project'] = $project->first(['project_id' => $id]);
        $data['foremen'] = $workers->where(['job_id' => $row->job_id]);
		$data['clients'] = $clients->findAll();
		$data['locations'] = $locations->allWithRelations();

		console_log($data['project']);
        $this->view('projects/edit', $data);
    }

	public function delete($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$worker = new Project;

		$worker->delete($id, 'project_id');

		redirect('projects');
	}

	public function remove_worker($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		
		$worker = new ProjectWorkers;

		$worker->delete($id);

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function remove_supplier($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		
		$supplier = new ProjectSuppliers;

		$supplier->delete($id);

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}