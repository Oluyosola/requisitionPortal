<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\ManagerRepositoryInterface;
 class ManagerRepository implements ManagerRepositoryInterface
{
    public function getManagerApproval($manager)
    {
       
        
       $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
        items.name as item_name, items.quantity as item_quantity, quantity_units.name as quantity_unit FROM requisitions
        LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id 
        LEFT JOIN quantity_units ON requisitions.quantity_unit_id = quantity_units.id
        LEFT JOIN users ON requisitions.user_id = users.id
        LEFT JOIN sh_tl_approvals ON requisitions.id = sh_tl_approvals.requisition_id
        LEFT JOIN manager_approvals ON requisitions.id = manager_approvals.requisition_id 
        WHERE (users.reporting_designation_type_id = $manager AND manager_approvals.is_approved is NULL) OR ( manager_approvals.is_approved is NULL AND sh_tl_approvals.is_approved = 1 
        AND sh_tl_approvals.reporting_id = $manager )";
        
        $results=  DB::select($sql_query);
        return $results;
    }
    public function getApproved($manager){
        $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
        items.name as item_name, items.quantity as item_quantity, quantity_units.name as quantity_unit FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN quantity_units ON requisitions.quantity_unit_id = quantity_units.id
        LEFT JOIN manager_approvals ON requisitions.id = manager_approvals.requisition_id
        LEFT JOIN users ON requisitions.user_id = users.id 
        WHERE manager_approvals.is_approved = 1
        -- AND users.reporting_designation_type_id = $manager
        ";

        // id that should be check should be maager not reporting ID
        $results=  DB::select($sql_query);     
        return $results;
    }
    
    public function getRejected($manager){
        $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
        items.name as item_name, items.quantity as item_quantity, quantity_units.name as quantity_unit FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN quantity_units ON requisitions.quantity_unit_id = quantity_units.id
        LEFT JOIN manager_approvals ON requisitions.id = manager_approvals.requisition_id
        LEFT JOIN users ON requisitions.user_id = users.id 
        WHERE manager_approvals.is_approved = 0
        AND users.reporting_designation_type_id = $manager";
        $results=  DB::select($sql_query);     
        return $results;
    }
    
}
