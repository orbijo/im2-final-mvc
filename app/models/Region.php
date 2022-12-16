<?php

/**
 * Job Class
 */
class Region {
    use Model;

    protected $table = 'regions';
    protected $table_id = 'region_id';

    protected $allowedColumns = [
        'region_name',
    ];

    
    
}