<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;

class BlogController extends Controller
{
    public function index() {
      return redirect('/blog');
    }

    public function show() {

        $posts = DB::table('blogs')->paginate(10);
        return view('blog',  ['posts' => $posts]);

    }

    public function showPost($title) {


        $post = Blog::where('title',$title)->get();

        return view('post',  ['post' => $post]);

    }
}
