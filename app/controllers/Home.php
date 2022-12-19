<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Core\Session;
use \Model\Project;
use \Model\Worker;

/**
 * home class
 */
class Home {
	use MainController;

	public function index()
	{
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$projects = new Project;
		$workers = new Worker;

		$data['projects_chart'] = $projects->findAll();
		$data['urgent'] = $projects->thisMonth();
		$data['hardworking'] = $workers->getHardworking();
		
		$this->view('home', $data);
	}

}
