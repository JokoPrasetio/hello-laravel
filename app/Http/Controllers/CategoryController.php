<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('posts', [
            'active'=>'posts',
            'title' => ' Halaman Kategori : ' .$category->name,
            'posts' => post::with('category','author')->where('category_id', $category->id)->get()
        ]);
    }

 
}
