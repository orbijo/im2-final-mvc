<?php

/**
 * Job Class
 */
class Client {
    use Model;

    protected $table = 'clients';
    protected $table_id = 'client_id';

    protected $allowedColumns = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'location_id',
    ];

    
    
}