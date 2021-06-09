<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\ManagerRepositoryInterface;
 class ManagerRepository implements ManagerRepositoryInterface
{
    public function getManagerApproval($manager)
    {
       
        // $results = DB::table('requisitions')
        // ->join('users', 'requisitions.user_id', '=', 'users.id')
        // ->join('manager_approvals', 'requisitions.id', '=', 'manager_approvals.requisition_id')
        // ->join('sh_tl_approvals', 'requisitions.id', '=', 'sh_tl_approvals.requisition_id')
        // ->select('requisitions.*', 'requisitions.user_id')->where('requisitions.user_id', '=', 1)
        // // ->where('manager_approvals.is_approved' == null)
        // ->get();
       
       
       
       
       $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
        items.name as item_name FROM requisitions
        LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        -- LEFT JOIN users u1 ON sh_tl_approvals.sh_tl_id = u1.id 
        LEFT JOIN users ON requisitions.user_id = users.id
        LEFT JOIN sh_tl_approvals ON requisitions.id = sh_tl_approvals.requisition_id
        LEFT JOIN manager_approvals ON requisitions.id = manager_approvals.requisition_id 
        WHERE manager_approvals.is_approved IS NULL OR sh_tl_approvals.is_approved = 1 AND sh_tl_approvals.reporting_id = $manager
        AND users.reporting_designation_type_id = $manager
        ";
        
        $results=  DB::select($sql_query);
        return $results;
    }
    public function getApproved($manager){
        $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN manager_approvals ON requisitions.id = manager_approvals.requisition_id
        LEFT JOIN users ON requisitions.user_id = users.id 
        WHERE manager_approvals.is_approved = 1
        -- AND users.reporting_designation_type_id = $manager";

        // id that should be check should be maager not reporting ID
        $results=  DB::select($sql_query);     
        return $results;
    }
    
    public function getRejected($manager){
        $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN manger_approvals ON requisitions.id = manager_approvals.requisition_id
        LEFT JOIN users ON requisitions.user_id = users.id 
        WHERE manager_approvals.is_approved = 0
        AND users.reporting_designation_type_id = $manager";
        $results=  DB::select($sql_query);     
        return $results;
    }
    
}
