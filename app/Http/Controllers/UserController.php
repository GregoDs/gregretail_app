<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Import the Log facade

class UserController extends Controller
{
    function login(Request $request)
    { 
        $user= User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return "Username or Password is incorrect";
        }
        else{
            $request->session()->put('user',$user);//store the session data under key user
            return redirect('/index');

        }
    }
    public function profile()
    {
        $userData = Session::get('user');
        if ($userData) {
            //$userName=$userData->name;
           return $userData;
        } else {
            return 'user not found';
        }
    }
    

    function register(Request $request)
    {
 // Output form data for debugging
Log::info('Form data:', $request->all());

// Create a new user in the database
$user = new User;
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);
$user->phonenumber = $request->phone;
$user->address = $request->address;

// Attempt to save the user
if ($user->save()) {
    // User saved successfully
    Log::info('User saved successfully:', $user->toArray());
    // Log in the newly registered user (optional)
    $request->session()->put('user', $user);
    return redirect('/index');
} else {
    // User not saved successfully
    Log::error('User not saved:', $user->toArray());
    return 'User registration failed. Please check the error logs.';
}
       
    }

}
