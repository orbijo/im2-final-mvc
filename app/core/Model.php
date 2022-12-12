<?php

/**
 * Main Modal Trait
 */
Trait Model {
    use Database;
    
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = 'ASC';

    public function findAll() {
        
        $query = "SELECT * FROM $this->table ORDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // echo $query;

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        return $this->query($query);
    }

    public function where($data, $data_not = []) {
        /**
         * General Function to GET WHERE: conidtion 
         */

        // GET THE KEYS OF THE ARRAY AND STORE THEM INTO $keys
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        // INITIALIZE QUERY STATEMENT
        $query = "SELECT * FROM $this->table WHERE ";

        // ADDING THE CONDITIONS TO THE QUERY
        foreach($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }
        foreach($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }
        $query = trim($query, " && ");
        $query .= " ORRDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";

        // MERGE NOT CLAUSES DATA TO $data
        $data = array_merge($data, $data_not);

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // echo $query;

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        return $this->query($query, $data);
    }

    public function first($data, $data_not) {
        /**
         * General function to GET FIRST
         */

        // GET THE KEYS OF THE ARRAY AND STORE THEM INTO $keys
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        // INITIALIZE QUERY STATEMENT
        $query = "SELECT * FROM $this->table WHERE ";

        // ADDING THE CONDITIONS TO THE QUERY
        foreach($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }
        foreach($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }
        $query = trim($query, " && ");
        $query .= " LIMIT $this->limit OFFSET $this->offset";

        /** THIS LINE SHOWS THE COMPLETE QUERY */
        // echo $query;
        
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
        if($result) {
            return $result[0];
        }

        return false;
    }

    public function insert($data) {
        /**
         * General Function for INSERT
         */

        /** Remove Unwanted Data */
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        // GET THE KEYS OF THE ARRAY AND STORE THEM INTO $keys
        $keys = array_keys($data);

        /**
         * PREPARE INSERT STATEMENT
         * INSERT INTO table (column1, column2, column3) VALUES (:column1, :column2, :column3)
         */
        $query = "INSERT INTO $this->table (".implode(", ", $keys).") VALUES (:".implode(", :", $keys).")";

        /** THIS LINE SHOWS THE COMPLETE QUERY */
        echo $query;

        // RUN THE QUERY USING query() function inherited from Trait Database.php
        $this->query($query, $data);

        return false;
    }

    public function update($id, $data, $id_column = 'id') {
        
        /** Remove Unwanted Data */
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        // GET THE KEYS OF THE ARRAY AND STORE THEM INTO $keys
        $keys = array_keys($data);

        // INITIALIZE QUERY STATEMENT
        $query = "UPDATE $this->table SET ";

        // ADDING THE CONDITIONS TO THE QUERY
        foreach($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }
        $query = trim($query, ", ");
        $query .= "  WHERE $id_column = :$id_column";
        $data[$id_column] = $id;

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // echo $query;

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        $this->query($query, $data);
        return false;
    }

    public function delete($id, $id_column = 'id') {
        /**
         * General Function to DELETE
         */

        // INITIALIZE QUERY STATEMENT
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";


        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // echo $query;

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        $this->query($query, $data);

        return false;
    }
}