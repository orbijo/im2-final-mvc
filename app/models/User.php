<?php

/**
 * Job Class
 */
class User {
    use Model;

    protected $table = 'users';
    protected $table_id = 'user_id';

    protected $allowedColumns = [
        'username',
        'password',
    ];

    
    
}