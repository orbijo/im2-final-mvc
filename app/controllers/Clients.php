<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Client;
use \Core\Request;
use \Core\Session;

/**
 * Clients Controller
 */
class Clients {
	use MainController;

	public function index()	{
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$clients = new Client;
		$data['clients'] = $clients->findAll();
        $this->view('clients', $data);
	}

	public function add() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$data = [];

		$req = new Request;
		if($req->posted()) {

			$client = new Client();
			
			$client->insert($req->post());

			redirect('clients');
		}

		$this->view('clients/add', $data);
	}

	public function edit($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$client = new Client();
			
			$client->update($id, $req->post(), 'client_id');

			redirect('clients');
		}

		$client = new Client();
        $data['client'] = $client->first(['client_id'=>$id]);

        $this->view('clients/edit', $data);
    }

	public function delete($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$client = new Client;

		$client->delete($id, 'client_id');

		redirect('clients');
	}

}