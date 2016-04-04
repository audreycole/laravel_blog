<?php

namespace App\Http\Controllers;

use Session;

use Hash;

use DB;

use DateTime;

use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    // Login
    public function auth(Request $request) {
    	$email = $request->email;

    	$password = $request->password;

		$user = DB::table('users')->where('email', $email)->first();
		if($user) {
			// Verify they have the correct password
			if (Hash::check($password, $user->password))
			{
    			// They are logged in!
				// Store the user in the session...
    			//session(['user' => $user->name]);
                Session::put('user', $user->name);

    			return Redirect::to('home');
			}
		}
		return Redirect::to('/login');
    }


    // Register a new user
    public function create(Request $request) {

		$user = DB::table('users')->where('email', $request->email)->first();

		if($user) {
			return Redirect::to('/register');
		}

    	// Insert the new user into the table
    	DB::table('users')->insert(
    		['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'created_at' => new DateTime, 'updated_at' => new DateTime]);

    	return Redirect::to('/login');
    }

    // Logout a user
    public function logout() {
        Session::flush();
        
        return Redirect::to('home');
    }
}
 