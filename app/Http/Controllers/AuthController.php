<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // If you're using User model
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function home(){
        $data = Auth::user();
        return view('auth.home', ['data' => $data]);
    }
    
    public function login(){
        if (Auth::check()) {
            return redirect()->route('home'); // Redirect to home if already logged in
        }
        return view('auth.login');
    }
    
    public function loginuser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login successful');
        } else {
            return back()->with('fail', 'Incorrect email or password');
        }
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

    public function logout(){
        Auth::logout(); // Logout the user
        Session::forget('loginid'); // Clear login session data
    
        return redirect('/home')->with('success', 'You have been logged out successfully.');
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'user_id' => 'required|integer',
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)
                    ->where('id', $request->user_id)
                    ->first();

        if ($user && Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            Session::flash('success', 'Password changed successfully!');
            return redirect()->back();
        } else {
            Session::flash('fail', 'Invalid email, user ID, or old password.');
            return redirect()->back();
        }
    }
}