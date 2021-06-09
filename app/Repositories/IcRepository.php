<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\IcRepositoryInterface;
 class IcRepository implements IcRepositoryInterface {
    // $ic = Auth::user()->designation_type_id;
    // // dd($clevel);
    //     $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
    // requisitions.description as description, users.name as user_name, categories.name as category_name, 
    // items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
    // LEFT JOIN items ON requisitions.item_id = items.id
    // LEFT JOIN users ON requisitions.manager_id = users.id OR requisitions.user_id = users.id WHERE users.reporting_designation_type_id = $ic
    // OR requisitions.is_manager_approved = 1";
    // $results=  DB::select($sql_query);
    // return view ('dashboards.internal_control', compact('results'));

 }