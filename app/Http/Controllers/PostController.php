<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\category;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "Blog",
            "active" => "posts",
            "posts" => post::with('author', 'category')->latest()->get()
        ]);
    }

    public function show(post $post){
        return view('post', [
            "title" => 'blog',
            "active"=>"posts",
            "post"=> $post,
            "categories"=>category::all()
        ]);
    }

}
