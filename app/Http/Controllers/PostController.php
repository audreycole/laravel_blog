<?php

namespace App\Http\Controllers;

use DB;

use Session;

use App\Post;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
	// Home page for blog (use Query Builder)
    public function index()
	{
		//fetch 5 posts from database which are active and latest
		//$posts = Posts::where('active',1)->orderBy('created_at','desc')->paginate(5);
		$posts = DB::table('posts')->orderBy('created_at')->take(5)->get();

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

	// Add a blog post (use Eloquent ORM)
	public function addPost(Request $request) {

		$post = new Post;

		$post->user_id = Session::get('user_id');

		$post->title = $request->title;

		$post->body = $request->body;

		$post->save();

		return back(); // redirect back()
	}

	// Show a blog post (use Eloquent ORM)
	public function show($id) {

		$post = Post::find($id);

		if(Session::has('user')) {
			return view('posts.show')->withPost($post)->withUser(Session::get('user'));
		}
		else {
			return view('posts.show')->withPost($post)->withUser('');
		}
	}

	
}
