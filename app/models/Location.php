<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class Location
{
	
	use Model;

	protected $table = 'locations';
    protected $table_id = 'location_id';

    protected $allowedColumns = [
        'postal_code',
        'city',
        'state_province',
        'country_id',
    ];

    protected $relations = [
        'countries' => 'country_id',
    ];

}