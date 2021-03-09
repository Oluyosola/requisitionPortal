<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
            // where(['user_id' => auth()->user()->id
           
        $category = Category::all();
        $item = Item::all();
        $status = Status::all();
        // here(['user_id' => auth()->user()->id, 'name' => $request->name_of_plan])->first();
        $results = Requisition::where('user_id', auth()->user()->id)->with('status','category', 'item')->paginate(2);
        // $results= $results->paginate(10);
        // dd($result)
        return view('dashboards.general', compact('results', 'status', 'category', 'item'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

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
        return view('add_new_requisition', compact('categories'));   
    }
    public function getItems($id){
        $items = Item::get()->where('category_id', $id)->pluck("name", "id");
        
        return json_encode($items);
        
}
    
    public function store(Request $request)
    {
        
        $requisition = new Requisition;
        $requisition->category_id = $request->input('category');
        $requisition->item_id = $request->input('item');
        $requisition->description = $request->input('description');
        // dd($request->description);
        $requisition->quantity = $request->input('quantity');
        $requisition->user_id = auth()->user()->id;
        $requisition->save();
        session()->flash('message', 'you have made a new requisition');
        return redirect('/home')->with('requisition', $requisition);
        //  ('status', 'Profile created!'));

        
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
    // public function destroy($id)
    // {
    //     $requisition = Requisition::find($id);
    //     $requisition->delete();
    //     // return view('dashboards.general');
    // 	return back()->with(['message'=> 'Successfully deleted!!']);
        
    // }
    public function destroy(Requisition $requisition)
    {
       $requisition->delete();
        return back();
    }
}
