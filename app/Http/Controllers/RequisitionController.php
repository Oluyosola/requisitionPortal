<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use Illuminate\Http\Request;


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
    // public function __construct(Requisition $requisition)
	// {
		
    //     // $this->requisition = $requisition;
        

	// }
    public function index()
        {
            // where(['user_id' => auth()->user()->id
           
        $category = Category::all();
        $item = Item::all();
        $status = Status::all();
        // here(['user_id' => auth()->user()->id, 'name' => $request->name_of_plan])->first();
        $results = Requisition::with('status','category', 'item')->get();
        // dd($result)
        return view('home', compact('results', 'status', 'category', 'item'));
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
        $this->validate($request, [
            'description' => 'require',

        ]);
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
    public function destroy($id)
    {
        $requisition = Requisition::find($id);
    //     $data = newRequisition($id);
        $requisition ->delete(); 
    // 	if ($data) {
    		return back()->with('success', 'Record deleted successfully');
    	}
    // 
    // }
//     public function create(array $data)
//     {
//         return Requisition::create([
           
//             'item_id' => $data['item'],
//             'description' => $data['description'],
           
            
//             'quantity' => $data['quantity'],
//             'category_id' => $data['category']
            
//         ]);
//         return redirect('/home')->with('status', 'Profile created!');

//     }
}
