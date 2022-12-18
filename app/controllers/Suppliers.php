<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Supplier;
use \Core\Request;
use \Core\Session;

/**
 * Suppliers Controller
 */
class Suppliers {
	use MainController;

	public function index()	{
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$suppliers = new Supplier;
		$data['suppliers'] = $suppliers->findAll();
        $this->view('suppliers', $data);
	}

	public function add() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$data = [];

		$req = new Request;
		if($req->posted()) {

			$supplier = new Supplier();
			
			$supplier->insert($req->post());

			redirect('suppliers');
		}

		$this->view('suppliers/add', $data);
	}

	public function edit($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$supplier = new Supplier();
			
			$supplier->update($id, $req->post(), 'supplier_id');

			redirect('suppliers');
		}

		$supplier = new Supplier();
        $data['supplier'] = $supplier->first(['supplier_id'=>$id]);

        $this->view('suppliers/edit', $data);
    }

	public function delete($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		
		$supplier = new Supplier;

		$supplier->delete($id, 'supplier_id');

		redirect('suppliers');
	}

}