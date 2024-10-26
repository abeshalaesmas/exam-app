<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class CustomAuthController extends Controller
{
    public function login(){
        return view ('auth.login');
    } 
    public function registration(){
        return view('auth.registration');
    }


    public function registerUser(Request $request){
        $validation = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:5|max:12',
        ]);

        $user = new User();
        $user->name = $validation['name'];
        $user->email = $validation['email'];
        $user->password = Hash::make($validation['password']);
        $res = $user->save();
        if($res){
            return back()->with('success','You have registered!!');
        }else{
            return back()->with('fail','Something wrong!!');

        }
    }
    
   
    public function loginUser(Request $request){
        $validation = $request->validate([
           
            'email' => 'required|string|email',
            'password' => 'required|string|min:5|max:12',
        ]);

        $user = User::where('email','=',$request->email)->first();
        
        if($user){
            if(Hash::check( $request->password, $user->password))
            {
                $request->session()->put('loginId', $user->id);
                return redirect()->intended('dashboard');
            }
            else
            {
                return back()->with('fail','Password is not match');
            }

        }else{
            return back()->with('fail','This Email is not Registered!!');
        }

    }
    public function dashboard(Request $request){
        
    
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
            
    }
    public function index()
    {
    $notes = Auth::user()->notes;
    return view('dashboard', ['notes'=>$notes]);
        
    }
    


     public function logout(Request $request){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
     }


}
