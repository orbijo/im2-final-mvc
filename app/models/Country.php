<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class Country
{
	
	use Model;

	protected $table = 'countries';
    protected $table_id = 'country_id';

    protected $allowedColumns = [
        'country_name',
    ];

    protected $relations = [

    ];

}