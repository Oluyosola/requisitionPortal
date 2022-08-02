<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\User;
use App\Models\QuantityUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
           
        $categories = Category::get()->pluck("name", "id");
        $item = Item::all();
        $user = User::all();
        $item_unit = QuantityUnit::get()->pluck("name", "id");
        $results = Requisition::where('user_id', auth()->user()->id)->with('category', 'item', 'user', 'quantityunit')->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboards.general', compact('results', 'categories', 'item', 'user', 'item_unit'));
    }
    

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     
    public function getCategories(){
        $categories = Category::get()
        ->pluck("name", "id");
        $item_unit = QuantityUnit::all();

        return view('requisition/add_new_requisition', compact('categories', 'item_unit'));   
    }
    public function getItems($id){
        $items = Item::get()->where('category_id', $id)->pluck("name", "id");
        
        return json_encode($items);
        
}
    
    public function store(Request $request, Requisition $requisition)
    
    {


        $validatedData = $request->validate([
        'moreFields.*.category_id' => 'required',
        'moreFields.*.item_id' => 'required',
        'moreFields.*.quantity' => 'required',
        'moreFields.*.item_unit' => 'required',
        
    ]);
    

    $count = count($request->all()['moreFields']);
    for($i = 0; $i < $count; $i++ ) {   
        $item_id = $request->all()['moreFields'][$i]['item_id'];
        $item = Item::where('id', $item_id )->find($count);
        if( $item > $item->quantity || $item > $item->reorder_quantity);
{
    return back()->with('error', 'The requested Item does not have more quantity');  

}
        $requisition = new Requisition;
        $requisition->category_id = $request->all()['moreFields'][$i]['category_id'];
        $requisition->item_id = $item;
        $requisition->description = $request->all()['moreFields'][$i]['description'];
        $requisition->quantity = $request->all()['moreFields'][$i]['quantity'];
        $requisition->quantity_unit_id = $request->all()['moreFields'][$i]['item_unit'];
        $requisition->user_id = Auth::user()->id;
        $requisition->save();
    }

    return redirect('/home')->with('success', 'New Requisition Made');  
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
       $requisition->delete();
        return back();
    }


}