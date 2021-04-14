<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\ShTlRepositoryInterface;
class ShTlRepository implements ShTlRepositoryInterface 
{


public function getRequisition($sh_tl){

    $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN sh_tl_approvals ON requisitions.id = sh_tl_approvals.requisition_id
    LEFT JOIN users ON requisitions.user_id = users.id 
    WHERE sh_tl_approvals.is_approved IS NULL
    AND users.reporting_designation_type_id = $sh_tl";
    $results=  DB::select($sql_query);     
    return $results;
}

public function getApproval($sh_tl){
    $sql_query =  "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity, 
    requisitions.description as description, users.name as user_name, categories.name as category_name, requisitions.req_id as req_id,
    items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
    LEFT JOIN items ON requisitions.item_id = items.id
    LEFT JOIN sh_tl_approvals ON requisitions.id = sh_tl_approvals.requisition_id
    LEFT JOIN users ON requisitions.user_id = users.id 
    WHERE sh_tl_approvals.is_approved = 1
    AND users.reporting_designation_type_id = $sh_tl";
    $results=  DB::select($sql_query);     
    return $results;
}
}
?>