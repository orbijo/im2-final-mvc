<?php

Trait Database {

    private function connect() {
        // CONNECTS TO DB USING CONSTANTS DEFINED AT config.php
        $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = []) {
        /**
         * Accepts a query, and the data to be queried
         * Then executes the query using prepared statements
         */

        //  CONNECT TO DB
        $con = $this->connect();

        // PREPARE THE QUERY STATEMENT
        $stm = $con->prepare($query);

        // EXECUTE QUERY
        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function get_row($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }

}