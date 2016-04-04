<?php

namespace App\Http\Controllers;

use DB;

//use App\Post;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function index()
	{
		//fetch 5 posts from database which are active and latest
		//$posts = Posts::where('active',1)->orderBy('created_at','desc')->paginate(5);
		$posts = DB::table('posts')->where('active', 1)->orderBy('created_at', 'desc')->take(5)->get();

	    //page heading
	    $title = 'Latest Posts';

		if(Session::has('user')) {
			return view('home')->withPosts($posts)->withTitle($title)->withUser(Session::get('user'));
	    //return home.blade.php template from resources/views folder
	    //return view('home', compact('posts'));
	    }
	    else {
	    	return view('home')->withPosts($posts)->withTitle($title)->withUser('');
	    }
	}

	/*public function login() {

	}

	public function register() {

	}*/

	public function logout() {
		Session::flush();
		
		return Redirect::to('home');
	}
}
