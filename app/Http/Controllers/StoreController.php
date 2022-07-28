<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StoreApproval;
use App\Models\Item;
use Haruncpi\LaravelIdGenerator\IdGenerator;
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
        
        $results = $this->store_repo->getStoreApproval($store);
        $item = Item::paginate();
        return view('dashboards.store', compact('results', 'item'));
    }
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function storeProcess(Request $request, StoreApproval $store){
        $store->approval_comment = $request->input('store_processing_comment');
        $store->quantity_given = $request->input('quantity_given');
        $store->is_approved = true;
        $store->requisition_id = $request->input('req_id');
        $store->store_id = Auth::user()->id;
        $store->save();
        
        return redirect('/store')->with('success', 'Requisition Processed');;

          }

    
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
        $id = IdGenerator::generate(['table' => 'items', 'field'=> 'item_id','length' => 10, 'prefix' => 'ITE-']);
        if(Item::where('name', $request->item)->exists()) {
         return back()->with('error', 'Item exist!');
        }
        $item = new Item();
        $item->category_id = 1;
        $item->name = $request->input('item');
        $item->reorder_quantity = $request->input('reorder_quantity');
        $item->quantity = $request->input('quantity');
        $item->item_id = $id;
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
    public function update(Request $request, Item $item)
    {
    


        $item->update([
            'quantity' => $request->quantity,
            'reorder_quantity' => $request->reorder_quantity
        ]);
       
    
        return redirect('/item')->with('success','Item updated successfully');
    
    }
    public function reorder(){
        $results = Item::where(['quantity' => 'reorder_quantity'])->get();
        // dd($results);
        if($results){
        return view('store.reorder', compact('results'));
    }
}

    public function stockOut(){
        $results = Item::where('quantity', '<=', 0)->get();
        return view('store.stock_out', compact('results'));
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
