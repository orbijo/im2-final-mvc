<?php

/**
 * Location Class
 */
class Location {
    use Model;

    protected $table = 'locations';
    protected $table_id = 'location_id';

    protected $allowedColumns = [
        'postal_code',
        'city',
        'state_province',
        'country_id',
    ];
    
}