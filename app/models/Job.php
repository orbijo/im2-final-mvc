<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class Job
{
	
	use Model;

	protected $table = 'jobs';
    protected $table_id = 'job_id';

    protected $allowedColumns = [
        'job_title',
        'min_salary',
        'max_salary',
    ];

    protected $relations = [

    ];

}