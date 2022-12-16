<?php

/**
 * Job Class
 */
class Project {
    use Model;

    protected $table = 'project';
    protected $table_id = 'project_id';

    protected $allowedColumns = [
        'project_name',
        'start_date',
        'end_date',
        'foreman_id',
        'client_id',
        'budget',
    ];
    
}