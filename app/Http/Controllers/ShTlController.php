<?php

namespace App\Http\Controllers;
use App\Models\Requisition;
use App\Models\ShTlApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\ShTlRepositoryInterface;


class ShTlController extends Controller
{
    

    public $sh_tl_repo;

    public function __construct(ShTlRepositoryInterface $sh_tl_repo)

    {
        $this->middleware('auth');
        $this->middleware('designation');
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
        $results = $this->sh_tl_repo->getRequisition($sh_tl);
        return view('dashboards.sh-tl.action', compact('results'));
    }


    public function shTlApproval(Request $request, ShTlApproval $sh_tl){
        $sh_tl->approval_comment = $request->input('sh_tl_approval_comment');
        $sh_tl->is_approved = true;
        $sh_tl->requisition_id = $request->input('requisition');
        $sh_tl->reporting_id = Auth::user()->reporting_designation_type_id;
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
        return view('dashboards.sh-tl.approved', compact('results'));
    }

    public function shTlRejected (Requisition $requisition)   {
        $sh_tl = Auth::user()->designation_type_id;
        $results = $this->sh_tl_repo->getRejected($sh_tl);
        return view('dashboards.sh-tl.rejected', compact('results'));
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
