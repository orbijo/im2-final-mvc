<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

trait Database
{

	private function connect()
	{
		$string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
		$con = new \PDO($string, DBUSER, DBPASS);
		return $con;
	}

	public function query($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		try {
			$check = $stm->execute($data);
			if ($check) {
				$result = $stm->fetchAll(\PDO::FETCH_OBJ);
				if (is_array($result) && count($result)) {
					return $result;
				}
			}
			// do other things if successfully inserted
		} catch (\PDOException $e) {
			if ($e->errorInfo[1] == 1062) {
				return 1062;
			}
		}
		return false;
	}

	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(\PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result[0];
			}
		}

		return false;
	}

}