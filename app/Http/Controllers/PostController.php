<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return $posts;
    }
    public function create(){
        //$channels = Channel::orderBy('name')->get();
     //   return view('post.create',compact('channels'));
        return view('post.create');
    }
}
