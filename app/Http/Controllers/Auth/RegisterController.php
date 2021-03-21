<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Location;
// use App\Models\Designation;
use App\Models\ReportingManager;
use App\Models\Designation;
use App\Models\DesignationType;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function getUserDetails(){
        $units = Unit::get();
        $locations = Location::get();
        $reporting_designation = Designation::get()->pluck("name", "id");
        // $reporting_line = ReportingLine::all();
        return view('auth.register', compact('units', 'locations', 'reporting_designation'));   
    }
 

    // public function getReportingdesignation(){
        
    //     return view('auth.register', compact('reporting_designation'));
    // }
    public function getReportingLines($id){
        $reporting_line = DesignationType::get()->where('designation_id', $id)->pluck("name", "id");
        
        return json_encode($reporting_line);
    }

    
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(Request $request)
    // {
        // $user =new User;
        //     $user->name = $request->input('name');
        //     $user->email = $request->input('email');
        //     $user->password = Hash::make($request->input('password'));
        //     // 'password' => Hash::make($data['password']),
        //     $user->unit_id = $request->input('unit');
        //     $user->designation_id = $request->input('designation');
        //     $user->location_id = $request->input('location');
        //     $user->reporting_id = $request->input('reporting');
        //     'unit_id' => $data['unit'],
        //     'location_id' => $data['location'],
        //     'reporting_id' => $data['reporting'],
        //     'designation_id' => $data['designation']
            
        // ]);
        // $user->save();
        // return redirect('/home')->with('status', 'Profile created!');


    // }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'unit_id' => $data['unit'],
            'location_id' => $data['location'],
            // 'reporting_id' => $data['reporting'],
            'designation_id' => $data['designation'],
            'designation_type_id' => $data['designation_type'],
            'reporting_designation_id' => $data['reporting_designation'],
            'reporting_designation_type_id' => $data['reporting_line'],
            // 'reporting_line2_id' => $data['reporting_line2'],
        
        ]);
        return back()->with('success','Product successfully added.');
    }
}
