<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
// use App\Models\ShTl;
use App\Models\ShTlApproval;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\ShTlRepositoryInterface;
// use App\Repositories\shTlRepository;

// use Auth;

class ShTlController extends Controller
{
    

    public $sh_tl_repo;

    public function __construct(ShTlRepositoryInterface $sh_tl_repo)

    {
        $this->middleware('auth');
        $this->sh_tl_repo = $sh_tl_repo;
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

$sh_tl = Auth::user()->designation_type_id;

// dd($manager);
$results = $this->sh_tl_repo->getRequisition($sh_tl);
return view('dashboards.sh_tl', compact('results'));
}

        // -- $category = Category::all();
        // -- $item = Item::all();
        // -- $status = Status::all();
        // -- $user = User::all();
        // -- $results = Requisition::where(['is_sh_tl_approved' => null])->get();
       

    public function shTlApproval(Request $request, ShTlApproval $sh_tl){
        $sh_tl->approval_comment = $request->input('sh_tl_approval_comment');
        $sh_tl->is_approved = true;
        $sh_tl->requisition_id = $request->input('requisition');
        $sh_tl->reporting_id = Auth::user()->reporting_designation_type_id;
        // $sh_tl->requisition->quantity = $request->input('quantity');
        $sh_tl->sh_tl_id = Auth::user()->id;
        $sh_tl->save();
        return redirect('/sh')->with('success', 'Requisition Approved');;

          }

    public function shTlRejection(Request $request, ShTlApproval $sh_tl){
        $sh_tl->rejection_comment = $request->input('sh_tl_rejection_comment');
        $sh_tl->is_approved = false;
        $sh_tl->sh_tl_id = Auth::user()->id;
        $sh_tl->reporting_id = Auth::user()->reporting_designation_type_id;
        $sh_tl->requisition_id = $request->input('requisition');
        $sh_tl->save();
        return redirect('/sh')->with('success', 'Requisition Rejected');
        
    }  
    public function shTlApproved (Requisition $requisition)   {
        
        $sh_tl = Auth::user()->designation_type_id;


        $results = $this->sh_tl_repo->getApproval($sh_tl);

        return view('approval_actions.sh_tl', compact('results'));
    }

    public function shTlRejected (Requisition $requisition)   {
        // $results = Requisition::where(['is_sh_tl_approved' => 1||0, 'sh_tl_id' => Auth::user()->id])->get();
        $sh_tl = Auth::user()->designation_type_id;

// dd($manager);
        $results = $this->sh_tl_repo->getRejected($sh_tl);

        return view('reject_actions.sh_tl', compact('results'));
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
