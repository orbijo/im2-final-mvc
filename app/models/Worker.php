<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class Worker
{
	
	use Model;

	protected $table = 'workers';
    protected $table_id = 'worker_id';

	protected $allowedColumns = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'job_id',
        'salary',
        'foreman_id',
        'hire_date',
    ];

    protected $relations = [
        'jobs' => 'job_id',
    ];

}