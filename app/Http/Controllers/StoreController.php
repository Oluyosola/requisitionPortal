<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Requisition;
use App\Models\Category;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ic = Auth::user()->designation_type_id;
        // dd($clevel);
            $sql_query = "SELECT DISTINCT requisitions.id as id, requisitions.quantity as quantity,requisitions.req_id as req_id, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, 
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN users ON requisitions.manager_id = users.id OR requisitions.user_id = users.id WHERE users.reporting_designation_type_id = $ic
        OR requisitions.is_clevel_approved = 1";
        $results=  DB::select($sql_query);
        // return view ('dashboards.internal_control', compact('results'));
        return view('dashboards.store', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createItem()
    {
        $categories = Category::get();
        return view('store.create_item', compact('categories'));
    }

    public function StoreApprovalAction (Requisition $requisition)   {
        $results = Requisition::where(['is_store_approved' => 1||0, 'store_id' => Auth::user()->id])->get();
        return view('approval_actions.store', compact('results'));
    }

    public function allItem()
    {
        return view ('store.all_items');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('store.all_items');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
