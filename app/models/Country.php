<?php

/**
 * Countries Class
 */
class Country {
    use Model;

    protected $table = 'countries';
    protected $table_id = 'country_id';

    protected $allowedColumns = [
        'country_name',
        'region_id',
    ];
    
    public function state_provinces() {
        $query = "SELECT countries.country_name, locations.state_province, locations.country_id FROM countries
        INNER JOIN locations ON countries.country_id = locations.country_id
        GROUP BY locations.state_province";

        $result = $this->query($query);
        // $data = [];
        // foreach ($results as $result) {
        //     $data[$result->country_name]->array_push($result->state_province);
        // }
        // console_log($data);

        // return $this->query($query);
        return $result;
    }

}