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
        $query = "SELECT countries.country_name, locations.state_province FROM countries
        INNER JOIN locations ON countries.country_id = locations.country_id
        GROUP BY locations.state_province";

        $data = $this->query($query);
        console_log($data);
    }

}