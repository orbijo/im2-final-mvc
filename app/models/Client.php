<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Client Class
 */
class Client
{
	
	use Model;

	protected $table = 'clients';
    protected $table_id = 'client_id';

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