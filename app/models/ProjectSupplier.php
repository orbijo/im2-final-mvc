<?php

/**
 * Job Class
 */
class ProjectWorker {
    use Model;

    protected $table = 'project_suppliers';
    protected $table_id = '';

    protected $allowedColumns = [
        'project_id',
        'supplier_id',
    ];
    
}