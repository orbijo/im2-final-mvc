<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User
{
	
	use Model;

	protected $table = 'users';

	protected $allowedColumns = [
		'username',
		'password',
		'date_created',
	];

	public function validate($data)	{
		$this->errors = [];

		if(empty($data['username']))
		{
			$this->errors['username'] = "Username is required";
		}else
		if(!preg_match("/^[a-zA-Z0-9_\\-]+$/", $data['username']))
		{
			$this->errors['username'] = "Username can only contain letters, numbers, and underscores";
		}
		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function create_table() {
		$query = "
			CREATE TABLE IF NOT EXISTS users 
			(
				id INT PRIMARY KEY AUTO_INCREMENT, 
				username varchar(50) NOT NULL, 
				password varchar(255) NOT NULL, 
				date_created DATE
			);
		";

		$this->query($query);
	}

}