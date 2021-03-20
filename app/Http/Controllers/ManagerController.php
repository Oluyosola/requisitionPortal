<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constant;
use App\Notifications\RequisitionRejected;
// use Auth;

class ManagerController extends Controller
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
        
        //
        // @if(Auth::user()->designation_id = 3 && $result->is_shth_approved = 1)

        $category = Category::all();
        $item = Item::all();
        $status = Status::all();
        $user = User::all();
        // ((Auth::user()->designation_id == 3) && ($result->user->reporting_line1_id == Auth::user()->designation_type_id) || $result->user_id == $result->sl_th_id && $result->is_sh_tl_approved == 1) 



        $results = Requisition::where(Auth::user()->designation_id == 3  )->get();
        // $check1 = $results->$user->reporting_line1_id == Auth::$user()->designation_type_id;
        // $check2 = Auth::$user()->designation_id == 3 && $results->is_shth_approved == 1;
        // $check3 = Auth::$user()->designation_id == 4 && $results->is_manger_approved == 1;
        // if($check1 || $check2 || $check3){
          
            // dd($user_id);
        return view('dashboards.manager', compact('results', 'status', 'category', 'item', 'user'));
        // dd( $results->user->location_id);
        // }
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
