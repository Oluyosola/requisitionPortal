<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\ManagerRepositoryInterface;
use App\Models\ManagerApproval;

class ManagerController extends Controller
{   
    public $manager_repo;

    public function __construct(ManagerRepositoryInterface $manager_repo)

    {
        $this->middleware('auth');
        $this->middleware('designation');
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
        $results = $this->manager_repo->getManagerApproval($manager);
        return view('dashboards.manager.action', compact('results'));
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

    public function managerApproval(Request $request, ManagerApproval $manager){
        
        $manager->approval_comment = $request->input('manager_approval_comment');
        $manager->is_approved = true;
        $manager->manager_id = Auth::user()->id;
        $manager->requisition_id = $request->input('req_id');
        $manager->save();
        return redirect('/manager')->with('success', 'Requisition Approved');
        

    }

    public function managerRejection(Request $request, ManagerApproval $manager){
        $manager->rejection_comment = $request->input('manager_rejection_comment');
        $manager->is_approved = false;
        $manager->manager_id = Auth::user()->id;
        $manager->requisition_id = $request->input('req_id');
        $manager->save();
        return redirect('/manager')->with('success', 'Requisition Rejected');
    }  
    public function managerApproved (){
        $manager = Auth::user()->designation_type_id;
        $results = $this->manager_repo->getApproved($manager);
        return view('dashboards.manager.approved', compact('results'));
    }

    public function managerRejected() {
        $manager = Auth::user()->designation_type_id;
        $results = $this->manager_repo->getRejected($manager);

        return view('dashboards.manager.rejected', compact('results'));


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
