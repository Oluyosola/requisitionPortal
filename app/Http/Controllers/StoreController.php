<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Requisition;
use App\Models\StoreApproval;
use App\Models\Item;
use App\Models\QuantityUnit;
use App\Repositories\Interfaces\StoreRepositoryInterface;



class StoreController extends Controller
{

    public $store_repo;

    public function __construct(StoreRepositoryInterface $store_repo)

    {
        $this->middleware('auth');
        $this->store_repo = $store_repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $store = Auth::user()->unit_id;
        // $store = 4;
        // dd($store);
        $results = $this->store_repo->getStoreApproval($store);
        // dd($results);
        return view('dashboards.store', compact('results'));
    }
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createItem()
    {
        // $item_unit = QuantityUnit::get();
        // return view('store.create_item', compact('item_unit'));
    }
    public function storeProcess(Request $request, StoreApproval $store){
        $store->approval_comment = $request->input('store_processing_comment');
        $store->is_approved = true;
        $store->requisition_id = $request->input('req_id');
        // $store->reporting_id = Auth::user()->reporting_designation_type_id;
        // $store->requisition->quantity = $request->input('quantity');
        $store->store_id = Auth::user()->id;
        $store->save();
        return redirect('/store')->with('success', 'Requisition Accepted');;

          }

    // public function StoreApprovalAction (Requisition $requisition)   {
    //     $results = Requisition::where(['is_store_approved' => 1||0, 'store_id' => Auth::user()->id])->get();
    //     return view('approval_actions.store', compact('results'));
    // }

    public function allItem()
    {
        $quantity_unit = QuantityUnit::all();
        // dd($item_unit);
        $results = Item::all();
        return view('store.item', compact('quantity_unit', 'results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $item = new Item();
        $item->category_id = 1;
        $item->name = $request->input('item');
        $item->quantity = $request->input('quantity');
        // dd($item->quantity);
        $item->quantity_unit_id = $request->input('quantity_unit');
        $item->save();
        return back()->with('success','Item created successfully!');

    }


    public function storeProcessed(){
        $store = Auth::user()->designation_type_id;


        $results = $this->store_repo->getProcessed($store);
        // dd($results);

        return view('approval_actions.store', compact('results'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('store.create_item');
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
