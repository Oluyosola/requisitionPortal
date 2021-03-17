<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalController extends Controller
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
        $category = Category::all();
        $item = Item::all();
        $status = Status::all();
        $user = User::where(['location_id' => 16])->get();
        $results = Requisition::get();
        return view('dashboards.sh_th_dashboard', compact('results', 'status', 'category', 'item', 'user'));
    
    }

    public function approval(Requisition $requisition){
        if($requisition->is_shth_approved = 0){
        $requisition->is_shth_approved = 1;
        }elseif($requisition->is_shth_approved = 1){
            $requisition->is_manager_approved = 1;
        }else{
        $requisition->save();
        return redirect('sh');
        }
    }

    public function reject(Requisition $requisition){
        $requisition->is_shth_approved = 0;
        $requisition->save();
        return redirect('sh');

    }

    public function manager_approval(Requisition $requisition){
        if($requisition->sh_th_approved = 1){
        $requisition->is_manager_approved = 1;
        $requisition->save();
        return redirect('sh');
        }
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
