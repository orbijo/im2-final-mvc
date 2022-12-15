<?php

/**
 * Worker Class
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
        'job_id',
        'salary',
        'foreman_id',
        'location_id',
    ];

    protected $relations = [
        'jobs' => 'job_id',
        'locations' => 'location_id',
        // 'workers' => 'foreman_id',
    ];

    public function getDetails()
    {
        $query = "SELECT workers.*, jobs.job_title, locations.street_address, locations.city, locations.state_province FROM workers
        LEFT JOIN jobs ON workers.job_id = jobs.job_id
        LEFT JOIN locations ON workers.location_id = locations.location_id ORDER BY $this->table_id $this->order_type LIMIT $this->limit OFFSET $this->offset";
        return $this->query($query);
    }

}