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

    public function getHardworking() {
        $query = "SELECT workers.worker_id, workers.first_name, workers.last_name, workers.salary, COUNT(project_workers.project_id) as project_count FROM project_workers JOIN workers ON project_workers.worker_id = workers.worker_id 
        WHERE workers.job_id != (SELECT jobs.job_id FROM jobs WHERE jobs.job_title = 'Foreman') 
        GROUP BY project_workers.worker_id ORDER BY COUNT(project_workers.project_id) DESC
        ";

        return $this->query($query);
    }

}