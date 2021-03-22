<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RequisitionRejected;
// use Auth;

class ClevelController extends Controller
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

        // $category = Category::all();
        // $item = Item::all();
        // $status = Status::all();
        // $user = User::all();
        // $results = Requisition::with('user')->get();
        // $check1 = $results->$user->reporting_line1_id == Auth::$user()->designation_type_id;
        // $check2 = Auth::$user()->designation_id == 3 && $results->is_shth_approved == 1;
        // $check3 = Auth::$user()->designation_id == 4 && $results->is_manger_approved == 1;
        // if($check1 || $check2 || $check3){
          
            // dd($user_id);
        $clevel = Auth::user()->designation_type_id;
        // dd($clevel);
            $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, 
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN users ON requisitions.manager_id = users.id OR requisitions.user_id = users.id WHERE users.reporting_designation_type_id = $clevel
        OR requisitions.is_clevel_approved = 1";
        $results=  DB::select($sql_query);
        return view('dashboards.c_level', compact('results'));
        // dd( $results->user->location_id);
        // }
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    function clevelApproval(Request $request, Requisition $requisition){
        $requisition->clevel_approval_comment = $request->input('clevel_approval_comment');
        $requisition->is_clevel_approved = true;
        $requisition->clevel_id = Auth::user()->id;
    
            $requisition->save();

        return redirect('/clevel');

        // }
    }

    public function clevelRejection(Request $request, Requisition $requisition){
        // if ($requisition->is_sh_tl_approved == null){
        $requisition->clevel_rejection_comment = $request->input('clevel_rejection_comment');
        $requisition->is_clevel_approved = false;
        $requisition->clevel_id = Auth::user()->id;
        $requisition->save();

        return redirect('/clevel');
        // }
    }  
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
