<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\IcRepositoryInterface;
use Illuminate\Support\Facades\Auth;


use App\Models\IcApproval;
use Illuminate\Http\Request;

class IcController extends Controller
{
    public $ic_repo;

    public function __construct(ICRepositoryInterface $ic_repo)

    {
        $this->middleware('auth');
        $this->ic_repo = $ic_repo;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ic = Auth::user()->unit_id;
        // $manager = 4;
        // dd($ic);
        $results = $this->ic_repo->getIcApproval($ic);
        // dd($results);
        return view('dashboards.ic', compact('results'));
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
    public function icApproval(Request $request, IcApproval $ic){
        
        $ic->approval_comment = $request->input('ic_approval_comment');
        $ic->is_approved = true;
        $ic->ic_id = Auth::user()->id;
        $ic->requisition_id = $request->input('req_id');
        $ic->save();
        return redirect('/ic')->with('success', 'Requisition Approved');
        

    }

    public function icRejection(Request $request, IcApproval $ic){
        // dd($request->all());
        $ic->rejection_comment = $request->input('ic_rejection_comment');
        $ic->is_approved = false;
        $ic->ic_id = Auth::user()->id;
        $ic->requisition_id = $request->input('req_id');
        $ic->save();
        return redirect('/ic')->with('success', 'Requisition Rejected');
    }  
    public function icApproved (){
        $ic = Auth::user()->designation_type_id;


        $results = $this->ic_repo->getApproved($ic);
        // dd($results);

        return view('approval_actions.ic', compact('results'));
    }

    public function icRejected() {
        $ic = Auth::user()->designation_type_id;


        $results = $this->ic_repo->getRejected($ic);

        return view('reject_actions.ic', compact('results'));

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
