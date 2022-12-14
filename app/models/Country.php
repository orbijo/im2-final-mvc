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
    
}