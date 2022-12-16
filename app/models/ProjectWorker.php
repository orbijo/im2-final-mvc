<?php

/**
 * Job Class
 */
class ProjectWorker {
    use Model;

    protected $table = 'project_workers';
    protected $table_id = '';

    protected $allowedColumns = [
        'project_id',
        'worker_id',
    ];

    
    
}