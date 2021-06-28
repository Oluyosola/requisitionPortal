<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\StoreRepositoryInterface;
 class StoreRepository implements StoreRepositoryInterface {

   public function getStoreApproval($store){

   
   $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name, items.quantity as item_quantity, quantity_units.name as quantity_unit FROM requisitions
    LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN quantity_units ON requisitions.item_unit_id = quantity_units.id
    LEFT JOIN users ON requisitions.user_id = users.id
    LEFT JOIN ic_approvals ON requisitions.id = ic_approvals.requisition_id
    LEFT JOIN store_approvals ON requisitions.id = store_approvals.requisition_id
    WHERE (store_approvals.is_approved IS NULL AND ic_approvals.is_approved = 1)";
    
    
    $results =  DB::select($sql_query);
    return $results;
   


   }

   public function getProcessed($store){
    $sql_query =
      "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name, items.quantity as item_quantity, quantity_units.name as quantity_unit FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN quantity_units ON requisitions.item_unit_id = quantity_units.id
    LEFT JOIN store_approvals ON requisitions.id = store_approvals.requisition_id
    LEFT JOIN users ON requisitions.user_id = users.id 
    WHERE store_approvals.is_approved = 1
    ";
    $results=  DB::select($sql_query);     
    return $results;
}

// public function getRejected($store){
//     $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
//     requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
//     items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
//     LEFT JOIN items ON requisitions.item_id = items.id
//     LEFT JOIN store_approvals ON requisitions.id = store_approvals.requisition_id
//     LEFT JOIN users ON requisitions.user_id = users.id 
//     WHERE store_approvals.is_approved = 0";
//     $results=  DB::select($sql_query);     
//     return $results;
// }

     }