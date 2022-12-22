<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * User class
 */
class ProjectWorkers
{

    use Model;

    protected $table = 'project_workers';
    protected $table_id = 'id';

    protected $allowedColumns = [
        'project_id',
        'worker_id',
    ];

    protected $relations = [
        'projects' => 'project_id',
        'workers' => 'worker_id',
    ];

    public function getOuter($id)
    {
        $query = "SELECT workers.*
        FROM workers
        WHERE workers.worker_id NOT IN
            (SELECT project_workers.worker_id
            FROM project_workers
            WHERE project_workers.project_id = :project_id)
        AND workers.job_id !=
            (SELECT jobs.job_id
            FROM jobs
            WHERE jobs.job_title = 'Foreman')
        AND workers.foreman_id =
        	(SELECT projects.foreman_id FROM projects WHERE projects.project_id = :project_id)";

        // console_log($query);

        return $this->query($query, ['project_id' => $id]);
    }

    public function getInner($id)
    {
        $query = "SELECT project_workers.id, project_workers.worker_id, workers.first_name, workers.last_name, workers.phone_number, workers.email FROM project_workers
        INNER JOIN workers ON project_workers.worker_id = workers.worker_id WHERE project_workers.project_id = :project_id";

        // console_log($query);

        return $this->query($query, ['project_id' => $id]);
    }

}