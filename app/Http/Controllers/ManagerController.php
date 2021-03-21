<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Requisition;
use App\Repositories\Interfaces\ManagerRepositoryInterface;

use App\Constant\designations;
use App\Notifications\RequisitionRejected;
use Illuminate\Support\Facades\DB;
// use Auth;

class ManagerController extends Controller
{   
    protected $manager_repo;

    public function __construct(ManagerRepositoryInterface $manager_repo)

    {
        $this->middleware('auth');
        $this->manager_repo = $manager_repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = Auth::user()->designation_type_id;
        // $results = $this->manager_repo->getManagerApproval($manager);

        $sql_query = "SELECT requisitions.id as id, requisitions.quantity as quantity, 
        requisitions.description as description, users.name as user_name, categories.name as category_name, 
        items.name as item_name FROM `requisitions` LEFT JOIN categories ON requisitions.category_id = categories.id
        LEFT JOIN items ON requisitions.item_id = items.id
        LEFT JOIN users ON requisitions.sh_tl_id = users.id WHERE requisitions.is_sh_tl_approved = 1
         AND users.reporting_designation_type_id = $manager";
        $results=  DB::select($sql_query);
        return view('dashboards.manager', compact('results'));
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

    public function managerApproval(Request $request, Requisition $requisition){
        $requisition->sh_tl_approval_comment = $request->input('sh_tl_approval_comment');
        $requisition->is_sh_tl_approved = true;
        $requisition->sh_tl_id = Auth::user()->id;
       

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
            $requisition->save();

        return redirect('/manager');

        // }
    }

    public function managerRejection(Request $request, Requisition $requisition){
        // if ($requisition->is_sh_tl_approved == null){
        $requisition->manager_rejection_comment = $request->input('manager_rejection_comment');
        $requisition->manager_approved = false;
        $requisition->manager_id = Auth::user()->id;
        $requisition->save();

        return redirect('/manager');
        // }
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
