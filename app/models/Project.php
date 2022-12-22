<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * User class
 */
class Project
{

    use Model;

    protected $table = 'projects';
    protected $table_id = 'project_id';

    protected $allowedColumns = [
        'project_name',
        'start_date',
        'end_date',
        'foreman_id',
        'client_id',
        'budget',
        'location_id',
    ];

    protected $relations = [
        'workers' => 'foreman_id',
        'clients' => 'client_id',
        'locations' => 'location_id',
    ];

    protected $foreign_tables = [
        'workers' => 'foreman_id',
        'clients' => 'client_id',
        'locations' => 'location_id',
    ];


    public function allWithRelations()
    {
        // INITIALIZE QUERY STATEMENT
        $query = "SELECT projects.*, workers.first_name AS foremanFname, workers.last_name AS foremanLname, clients.first_name AS clientFname, clients.last_name AS clientLname, locations.* 
            FROM projects 
                LEFT JOIN workers ON projects.foreman_id = workers.worker_id 
                    LEFT JOIN clients ON projects.client_id = clients.client_id 
                        LEFT JOIN locations ON projects.location_id = locations.location_id 
            ORDER BY project_id asc";

        /** THIS LINE SHOWS THE COMPLETE QUERY (UNCOMMENT TO SHOW ON PAGE THE COMPLETE QUERY) */
        // console_log($query);

        // GET AND RETURN THE RESULT BY USING query() function inherited from Trait Database.php
        return $this->query($query);
    }

    public function thisMonth()
    {
        $query = "SELECT *
        FROM projects
        WHERE MONTH(end_date) = MONTH(CURRENT_DATE())
        AND YEAR(end_date) = YEAR(CURRENT_DATE())
        ORDER BY end_date ASC";

        // console_log($query);

        return $this->query($query);
    }

    public function averageBudget()
    {
        $query = "SELECT l.city as 'city', ROUND(AVG(p.budget), 2) as 'avgbudget'
        FROM projects p
        INNER JOIN locations l ON p.location_id = l.location_id
        GROUP BY l.location_id";

        // console_log($query);

        return $this->query($query);
    }

}