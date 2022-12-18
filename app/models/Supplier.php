<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Supplier Class
 */
class Supplier
{
	
	use Model;

	protected $table = 'suppliers';
    protected $table_id = 'supplier_id';

    protected $allowedColumns = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
    ];

    protected $relations = [

    ];

}