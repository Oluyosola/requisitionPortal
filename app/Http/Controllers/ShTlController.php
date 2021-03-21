<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requisition;
use App\Models\Approval;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RequisitionController;
use App\Notifications\RequisitionRejected;
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
        $results = Requisition::get();
        return view('dashboards.sh_tl', compact('results', 'status', 'category', 'item', 'user'));
    
    }

    public function approval(Request $request, int $id){
        $approval = new Approval;
        $approval->requisition_id = $id;

        // dd($id);
        // if(Auth::user()->designation_id == 1||2){
        //     $approval->is_sh_tl_approved = 1;
        //     // $a->sh_tl_comment = $request->input('comment_sh');
        //     // dd($requisition->sh_tl_comment);
        //     $approval->sh_tl_id = auth()->user()->id;
        //     $approval->requisition_id =1;
        // }elseif($requisition->is_sh_tl_approved == 1 && (Auth::user()->designation_id == 3)){
        //     $requisition->is_manager_approved = 1;
        // }else{
        //     $requisition->is_clevel_approved = 1;
        // ($requisition->is_sh_tl_approved == 0) &&
        // }
            $approval->save();

        return redirect('sh');

        // }
    }

    // public function approval2(Requisition $requisition){
    //     if($requisition->shth_approved = 1)
    //     $requisition->is_shth_approved = 0;
    //     $requisition->save();
    //     return redirect('sh');

    // }

    // public function manager_approval(Requisition $requisition){
    //     if($requisition->sh_th_approved = 1){
    //     $requisition->is_manager_approved = 1;
    //     $requisition->save();
    //     return redirect('sh');
    //     }
    // }

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
