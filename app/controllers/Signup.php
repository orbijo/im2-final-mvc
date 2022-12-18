<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\User;
use \Core\Request;

/**
 * Signup Class
 */
class Signup {
	use MainController;

	public function index()
	{
		$data = [];

		$req = new Request;
		if($req->posted()) {

			$user = new User();
			if($user->validate($req->post())) {
				//save to database
				$password = password_hash($req->post('password'), PASSWORD_DEFAULT);
				$req->set('password', $password);
				$req->set('date_created', date("Y-m-d"));

				$user->insert($req->post());
				redirect('signin');
			}

			$data['errors'] = $user->errors;
		}

		$this->view('signup', $data);
	}

}