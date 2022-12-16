<?php

/**
 * Job Class
 */
class Supplier {
    use Model;

    protected $table = 'suppliers';
    protected $table_id = 'supplier_id';

    protected $allowedColumns = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'location_id',
    ];

    
    
}