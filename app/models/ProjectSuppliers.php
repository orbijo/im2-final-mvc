<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * User class
 */
class ProjectSuppliers
{

    use Model;

    protected $table = 'project_suppliers';
    protected $table_id = 'id';

    protected $allowedColumns = [
        'project_id',
        'supplier_id',
    ];

    protected $relations = [
        'projects' => 'project_id',
        'suppliers' => 'supplier_id',
    ];

    public function getOuter($id)
    {
        $query = "SELECT suppliers.*
        FROM suppliers
        WHERE suppliers.supplier_id NOT IN
            (SELECT project_suppliers.supplier_id
            FROM project_suppliers
            WHERE project_suppliers.project_id = :project_id)";

        // console_log($query);

        return $this->query($query, ['project_id' => $id]);
    }

    public function getInner($id)
    {
        $query = "SELECT project_suppliers.id, project_suppliers.supplier_id, suppliers.first_name, suppliers.last_name, suppliers.phone_number, suppliers.email FROM project_suppliers
        INNER JOIN suppliers ON project_suppliers.supplier_id = suppliers.supplier_id WHERE project_suppliers.project_id = :project_id";

        // console_log($query);

        return $this->query($query, ['project_id' => $id]);
    }

}