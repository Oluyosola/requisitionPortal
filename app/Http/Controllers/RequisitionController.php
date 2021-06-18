<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Requisition;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use App\Models\QuantityUnit;
use Barryvdh\DomPDF\Facade as PDF;
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
        $status = Status::all();
        $user = User::all();
        $item_unit = QuantityUnit::get()->pluck("name", "id");
        $results = Requisition::where('user_id', auth()->user()->id)->with('status','category', 'item', 'user', 'quantityunit')->orderBy('created_at', 'desc')->paginate(4);
        return view('dashboards.general', compact('results', 'status', 'categories', 'item', 'user', 'item_unit'));
    }
    

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requisitionPdf() {
        // retreive all records from db
        
        $category = Category::all();
        $item = Item::all();
        $status = Status::all();
        $results = Requisition::where('user_id', auth()->user()->id)->with('category', 'item', 'status')->get();
        $pdf = PDF::loadView('dashboards.general', $results);
        $pdf->save(storage_path().'_requisition.pdf');
        return $pdf->download('requsistion.pdf', compact('category', 'item', 'status', 'results'));
        
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
        $item_unit = QuantityUnit::all();

        return view('add_new_requisition', compact('categories', 'item_unit'));   
    }
    public function getItems($id){
        $items = Item::get()->where('category_id', $id)->pluck("name", "id");
        
        return json_encode($items);
        
}
    
    public function store(Request $request, Requisition $requisition)
    
    {
        // dd($request->all()['moreFields']);
        // 'moreFields.*.user_id' => Auth::user()->id ;
$validator = Validator::make($request->all(), [
    'moreFields.*.category_id' => 'required',
    'moreFields.*.item_id' => 'required',
    // 'moreFields.*.description' => 'required',
    'moreFields.*.quantity' => 'required'
    // 'moreFields.*.' => 'required'
    // 'moreFields.*.user_id' => 'required',
       
]);
if($validator->fails()){
    echo "oopps validation failed";

}

// $requisition = new Requisition;
// $user_id = [];
// $user_id = Auth::user()->id;
// $requisition->user_id = $user_id;

$count = count($request->all()['moreFields']);

// dd($count);


for($i = 0; $i < $count; $i++ ) {   
    
$requisition = new Requisition;
// $item = Item::where('id', $request->all()['moreFields'][$i]['item_id'])->limit(3)->get();
// // dd($item);
// $item_remaining = $item['quantity'] < $request->all()['moreFields'][$i]['quantity'];

// if ($item_remaining ){
//     return redirect()->back()->with('error', 'Item is out of stock');
// }
$requisition->category_id = $request->all()['moreFields'][$i]['category_id'];
$requisition->item_id = $request->all()['moreFields'][$i]['item_id'];
$requisition->description = $request->all()['moreFields'][$i]['description'];
$requisition->quantity = $request->all()['moreFields'][$i]['quantity'];
$requisition->item_unit_id = $request->all()['moreFields'][$i]['item_unit'];
$requisition->user_id = Auth::user()->id;
$requisition->save();
}

 return redirect('/home')->with('success', 'New Requisition Made');
// });

        
    }

    public function check(Request $request)
{
    return redirect('/op')
            ->with('warning',"Don't Open this link");
}
public function editCategories(){
    $categories = Category::get()
    ->pluck("name", "id");
    return redirect('/home')->with('categories', $categories);   
}
public function editItems($id){
    $items = Item::get()->where('category_id', $id)->pluck("name", "id");
    
    return json_encode($items);
    
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

// public function store(Request $request)
//     {


// $requisition = new Requisition;
//         $requisition->category_id = $request->input('category');
//         $requisition->item_id = $request->input('item');
//         $requisition->description = $request->input('description');
//         $requisition->quantity = $request->input('quantity');
//         $requisition->user_id = auth()->user()->id;
//         $requisition->save();
//         return redirect('/home')->with(['requisition', $requisition, 'success', 'you have made a new requisition']);
//     }
//  $category_id = $request->input('moreFields[0][category]');
// $item_id = $request->input('moreFields[0][item]');
// $description = $request->input('moreFields[0][description]');
// $quantity = $request->input('moreFields[0][quantity]');
// $req_id = "gfggg";
// $user_id = Auth::user()->id;
// // dd($user_id);
// for ($count = 0; $count < count($category_id); $count++){
//     $data = array(
//     'category_id' => $category_id[$count],
//     'item_id' => $item_id[$count],
//     'description' => $description[$count],
//     'quantity' => $quantity[$count],
//     'user_id' => $user_id[$count],
//     'req_id' => $req_id[$count],
//     );
//     $insert_data[] = $data;

// $rules = [];
// $request->validate([

//     'addmore.*.name' => 'required',

//     'addmore.*.qty' => 'required',

//     'addmore.*.price' => 'required',

// ]);



// foreach ($request->addmore as $key => $value) {

//     ProductStock::create($value);

// }



// return back()->with('success', 'Record Created Successfully.');

// }
// return redirect('/home');
// $request->validate([
//     'moreFields[0][category]' => 'required',
//     'moreFields[0][item]' => 'required',
//     'moreFields[0][description]' => 'required',
//     'moreFields[0][quantity]' => 'required'
//  ]);
 
//  $count = count($request->moreFields[0][category]);

//  for ($i=0; $i < $count; $i++) { 
//    $task = new Requisition();
//    $task->category = $request->moreFields[0][category][$i];
//    $task->item = $request->moreFields[0][item][$i];
//    $task->category = $request->moreFields[0][description][$i];
//    $task->item = $request->moreFields[0][quantity][$i];
//    $task->save();
//  }
}