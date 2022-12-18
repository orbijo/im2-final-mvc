<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use \Model\Location;
use \Model\Country;
use \Core\Session;
use \Core\Request;

/**
 * Locations Controller
 */
class Locations {
	use MainController;

	public function index()
	{
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$country = new Country();
			
			$country->insert($req->post());

			redirect('locations');
		}

		$locations = new Location;
		$countries = new Country;

		$data['locations'] = $locations->allWithRelations();
		$data['countries'] = $countries->findAll();

        $this->view('locations', $data);
	}

	public function add_location() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$data = [];

		$req = new Request;
		if($req->posted()) {

			$location = new Location();
			
			$location->insert($req->post());

			redirect('locations');
		}

		$countries = new Country;
		$data['countries'] = $countries->findAll();

		$this->view('locations/add', $data);
	}

	public function add_country() {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$data = [];

		$req = new Request;
		if($req->posted()) {

			$country = new Country();
			
			$country->insert($req->post());

			redirect('locations');
		}

		$this->view('countries/add', $data);
	}

	public function edit_location($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$location = new Location();
			
			$location->update($id, $req->post(), 'location_id');

			redirect('locations');
		}

		$location = new Location();
        $data['location'] = $location->first(['location_id'=>$id]);
		$countries = new Country;
		$data['countries'] = $countries->findAll();

        $this->view('locations/edit', $data);
    }

	public function edit_country($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}

		$req = new Request;
		if($req->posted()) {

			$country = new Country();
			
			$country->update($id, $req->post(), 'country_id');

			redirect('locations');
		}

		$country = new Country();
        $data['country'] = $country->first(['country_id'=>$id]);

        $this->view('countries/edit', $data);
    }

	public function delete_location($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		$location = new Location;

		$location->delete($id, 'location_id');

		redirect('locations');
	}

	public function delete_country($id = 0) {
		$session = new Session;
		if(!$session->is_logged_in()) {
			redirect('signin');
		}
		
		$country = new Country;

		$country->delete($id, 'country_id');

		redirect('locations');
	}

}