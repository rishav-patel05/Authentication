<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
        
        
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registeruser(Request $request){
        $request -> validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'gender'=> 'required',
            'department'=> 'required',
            'password'=> 'required|min:8',
        ]);
        $user = new User();
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> gender = $request->gender;
        $user-> department = $request->department;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','You Have Registered Successfully');
        }else{
            return back()->with('fail','Something Went Wrong');
        }
     
    }
    public function loginuser(Request $request){
        $request -> validate([
            'email'=> 'required|email',
            'password'=> 'required|min:8',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginid',$user->id);
                return redirect('home');
            }else{
                return back()->with('fail','Password Incorrect');
            }
        }else{
            return back()->with('fail','Email Doesnt Exist');
        }
    }
    public function home(){
        $data = array ();
        if(Session::has('loginid')){
            $user = User::where('id','=',Session::get('loginid'))->first();
        }
        return view('auth.home',['data' => $user]);
    }
    public function logout(){
        if(Session::has('loginid')){
            Session::pull('loginid');
            return redirect('login');
        }
    }
#-----------------------------CRUD OPERATIONS---------------------------------------------------------------
    public function records(){
       $records =  User::all();
        return view('auth.records', compact('records'));
    }
    public function delete($id){
        User::destroy($id);
        return back();
    }
    public function update($id){
        $data=User::find($id);
        return view('auth.update',compact('data'));
    }
    public function update_data(Request $request,$id){
        $data=User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->department = $request->department;

        // Save the updated data
        $res = $data->save();
        if($res){
            return redirect('records');
        }else{
            return back()->with('fail','Something Went Wrong');
        }    
}

// -----------------------Change password-------------------------
public function showChangePasswordForm()
{
    return view('auth.change-password');
}

public function changePassword(Request $request)
{
    // Correct validation rule
    $request->validate([
        'email' => 'required|email',
        'user_id' => 'required|integer',
        'old_password' => 'required',
        'new_password' => 'required|min:8', // Use 'min' for minimum length
    ]);

    // Retrieve user from the database
    $user = User::where('email', $request->email)
                ->where('id', $request->user_id)
                ->first();

    if ($user && Hash::check($request->old_password, $user->password)) {
        // Change the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');
        return redirect()->back(); // Redirect back with success message
    } else {
        Session::flash('fail', 'Invalid email, user ID, or old password.');
        return redirect()->back(); // Redirect back with failure message
    }
}
}