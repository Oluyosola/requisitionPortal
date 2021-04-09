<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Auth;

class ShTlController extends Controller
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

        $category = Category::all();
        $item = Item::all();
        $status = Status::all();
        $user = User::all();
        $results = Requisition::where(['is_sh_tl_approved' => null])->get();
        return view('dashboards.sh_tl', compact('results', 'status', 'category', 'item', 'user'));
    
    }

    public function shTlApproval(Request $request, Requisition $requisition){
        $requisition->sh_tl_approval_comment = $request->input('sh_tl_approval_comment');
        $requisition->is_sh_tl_approved = true;
        $requisition->quantity = $request->input('quantity');
        $requisition->sh_tl_id = Auth::user()->id;
        $requisition->save();
        return redirect('/sh');

          }

    public function shTlRejection(Request $request, Requisition $requisition){
        $requisition->sh_tl_rejection_comment = $request->input('sh_tl_rejection_comment');
        $requisition->is_sh_tl_approved = false;
        $requisition->sh_tl_id = Auth::user()->id;
        $requisition->save();
        return redirect('/sh');
        
    }  
    public function shTlApprovalAction (Requisition $requisition)   {
        $results = Requisition::where(['is_sh_tl_approved' => 1||0, 'sh_tl_id' => Auth::user()->id])->get();
        return view('approval_actions.sh_tl', compact('results'));
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
