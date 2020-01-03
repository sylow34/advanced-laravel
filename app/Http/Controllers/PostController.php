<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        //$channels = Channel::orderBy('name')->get();
     //   return view('post.create',compact('channels'));
        return view('post.create');
    }
}
