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
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN users ON requisitions.sh_tl_id = users.id  WHERE requisitions.is_manager_approved IS NULL 
        AND users.reporting_designation_type_id = $manager
        OR requisitions.is_sh_tl_approved = 1 
        -- AND requisitions.user_id = users.id
        -- AND requisitions.is_sh_tl_approved is NULL
        -- GROUP BY users.name
        -- GROUP BY requisitions.id, requisitions.quantity,requisitions.description, users.name, categories.name, requisitions.req_id
        -- items.name";
        
        $results=  DB::select($sql_query);     
        return $results;
    }
}
