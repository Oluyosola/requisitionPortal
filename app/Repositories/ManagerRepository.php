<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\ManagerRepositoryInterface;
class ManagerRepository implements ManagerRepositoryInterface
{
    public function getManagerApproval($manager_id)
    {
        $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, 
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN users ON requisitions.sl_th_id = users.id WHERE requisitions.is_sh_tl_approved = 1
         AND users.reporting_line1_id = $manager_id";
        $results=  DB::select($sql_query);
        return $results;
    }
}
