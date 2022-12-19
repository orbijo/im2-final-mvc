<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\User;
use \Core\Request;
use \Core\Session;

/**
 * Signin Controller
 */
class Signin {
	use MainController;

	public function index()
	{
		$data = [];

		$session = new Session;
		if($session->is_logged_in()) {
			redirect('');
		}

		$req = new Request;
		if($req->posted())
		{

			$user = new User();
			$username = $req->post('username');
			$password = $req->post('password');

			if($row = $user->first(['username'=>$username]))
			{
				//check if password is correct
				if(password_verify($password, $row->password))
				{
					//authenticate
					$ses = new Session;
					$ses->auth($row);

					redirect('home');
				}
				
			}
			
			$user->errors['username'] = "Invalid username or password";
			$data['errors'] = $user->errors;
		}

		$this->view('signin',$data);
	}

}