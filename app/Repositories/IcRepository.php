<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\IcRepositoryInterface;
 class IcRepository implements IcRepositoryInterface {

   public function getIcApproval($ic){

   
   $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name FROM requisitions
    LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN users ON requisitions.user_id = users.id
    LEFT JOIN manager_approvals ON requisitions.id = manager_approvals.requisition_id
    -- LEFT JOIN users ON requisitions.manager_id = users.id OR requisitions.user_id = users.id 
    LEFT JOIN ic_approvals ON requisitions.id = ic_approvals.requisition_id
    WHERE (ic_approvals.is_approved IS NULL AND manager_approvals.is_approved = 1) OR (ic_approvals.is_approved IS NULL AND users.designation_id = 4)";
    
    $results =  DB::select($sql_query);
    return $results;
   


   }

   public function getApproved($ic){
    // $sql_query =
      "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN ic_approvals ON requisitions.id = ic_approvals.requisition_id
    LEFT JOIN users ON requisitions.user_id = users.id 
    WHERE ic_approvals.is_approved = 1
    ";
    // $results=  DB::select($sql_query)->paginate(2);     
    // return $results;
}

public function getRejected($ic){
    $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN ic_approvals ON requisitions.id = ic_approvals.requisition_id
    LEFT JOIN users ON requisitions.user_id = users.id 
    WHERE ic_approvals.is_approved = 0";
    $results=  DB::select($sql_query);     
    return $results;
}

     }