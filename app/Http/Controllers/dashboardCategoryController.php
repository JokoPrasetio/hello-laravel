<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class dashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'name' => 'required|unique:categories|max:40',
            'slug' => 'required|unique:categories'
        ]);

        category::create($validateData);

        return redirect()->route('categories.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $validateData = $request->validate([
            'name' => 'required|max:40|unique:categories,name,' .$category->id,
            'slug' => 'required|unique:categories,slug,' .$category->id
        ]);
        $category->update($validateData);
        return redirect()->route('categories.index')->with('success', 'kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        foreach ($category->posts as $post) {
            if($post->image){
                $filePath = public_path('storage/'.$post->image);
                if(File::exists($filePath)){
                    File::delete($filePath);
                }
                Storage::delete('public/'.$post->image);
            }
        }
        $category->posts()->delete();
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'kategori berhasil dihapus');
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
