<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ICController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ic = Auth::user()->designation_type_id;
        // dd($clevel);
            $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, 
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN users ON requisitions.manager_id = users.id OR requisitions.user_id = users.id WHERE users.reporting_designation_type_id = $ic
        OR requisitions.is_clevel_approved = 1";
        $results=  DB::select($sql_query);
        return view ('dashboards.internal_control', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
