<?php 

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Main Model trait
 */
Trait Model
{
	use Database;

	protected $limit 		= 25;
	protected $offset 		= 0;
	protected $order_type 	= "asc";
	public $errors 		= [];

	public function findAll() {
        
        $query = "SELECT * FROM $this->table ORDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // echo $query;

        return $this->query($query);
    }

	public function where($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :". $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :". $key . " && ";
		}
		
		$query = trim($query," && ");

		$query .= " ORDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";
		$data = array_merge($data, $data_not);

		return $this->query($query, $data);
	}

	public function first($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :". $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :". $key . " && ";
		}
		
		$query = trim($query," && ");

		$query .= " limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);
		
		$result = $this->query($query, $data);
		if($result)
			return $result[0];

		return false;
	}

	public function insert($data)
	{
		
		/** remove unwanted data **/
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:", $keys).")";
		$this->query($query, $data);

		return false;
	}

	public function update($id, $data, $id_column = 'id')
	{

		/** remove unwanted data **/
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update $this->table set ";

		foreach ($keys as $key) {
			$query .= $key . " = :". $key . ", ";
		}

		$query = trim($query,", ");

		$query .= " where $id_column = :$id_column ";

		$data[$id_column] = $id;

		$this->query($query, $data);
		return false;

	}

	public function delete($id, $id_column = 'id')
	{

		$data[$id_column] = $id;
		$query = "delete from $this->table where $id_column = :$id_column ";
		$this->query($query, $data);

		return false;

	}

	public function allWithRelations() {
        // INITIALIZE QUERY STATEMENT
        $query = "SELECT $this->table.$this->table_id";
        foreach ($this->allowedColumns as $key) {
            if(!in_array($key, $this->relations)){
                $query .= ", $this->table.$key";
            }
        }
        foreach ($this->relations as $key => $value) {
            $query .= ", $key.*";
        }

        $query .= " FROM $this->table";

        // JOINS
        foreach ($this->relations as $key => $value) {
            $query .= " LEFT JOIN $key ON $this->table.$value = $key.$value";
        }

        $query .= " ORDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // console_log($query);

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        return $this->query($query);
    }

    public function whereWithRelations($data, $data_not = []) {
        /**
         * General Function to GET WHERE: conidtion 
         */

        // GET THE KEYS OF THE ARRAY AND STORE THEM INTO $keys
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        // INITIALIZE QUERY STATEMENT
        // $query = "SELECT * (FROM $this->table WHERE)";
        $query = "SELECT $this->table.$this->table_id";
        foreach ($this->allowedColumns as $key) {
            if(!in_array($key, $this->relations)){
                $query .= ", $this->table.$key";
            }
        }
        foreach ($this->relations as $key => $value) {
            $query .= ", $key.*";
        }

        $query .= " FROM $this->table";

        // JOINS
        foreach ($this->relations as $key => $value) {
            $query .= " LEFT JOIN $key ON $this->table.$value = $key.$value";
        }

        // ADDING THE CONDITIONS TO THE QUERY
        $query .= " WHERE ";
        foreach($keys as $key) {
            $query .= $this->table.".".$key . " = :" . $key . " && ";
        }
        foreach($keys_not as $key) {
            $query .= $this->table.".".$key . " != :" . $key . " && ";
        }
        $query = trim($query, " && ");
        $query .= " ORDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";

        // MERGE NOT CLAUSES DATA TO $data
        $data = array_merge($data, $data_not);

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        //console_log($query);

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        return $this->query($query, $data);
    }

    public function firstWithRelations($data, $data_not = []) {
        /**
         * General Function to GET WHERE: conidtion 
         */

        // GET THE KEYS OF THE ARRAY AND STORE THEM INTO $keys
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        // INITIALIZE QUERY STATEMENT
        // $query = "SELECT * (FROM $this->table WHERE)";
        $query = "SELECT $this->table.$this->table_id";
        foreach ($this->allowedColumns as $key) {
            if(!in_array($key, $this->relations)){
                $query .= ", $this->table.$key";
            }
        }
        foreach ($this->relations as $key => $value) {
            $query .= ", $key.*";
        }

        $query .= " FROM $this->table";

        // JOINS
        foreach ($this->relations as $key => $value) {
            $query .= " LEFT JOIN $key ON $this->table.$value = $key.$value";
        }

        // ADDING THE CONDITIONS TO THE QUERY
        $query .= " WHERE ";
        foreach($keys as $key) {
            $query .= $this->table.".".$key . " = :" . $key . " && ";
        }
        foreach($keys_not as $key) {
            $query .= $this->table.".".$key . " != :" . $key . " && ";
        }
        $query = trim($query, " && ");
        $query .= " ORDER BY $this->table_id $this->order_type LIMIT 1 OFFSET $this->offset";

        // MERGE NOT CLAUSES DATA TO $data
        $data = array_merge($data, $data_not);

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        //console_log($query);

        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
        if($result) {
            return $result[0];
        }

        return false;
    }
	
}