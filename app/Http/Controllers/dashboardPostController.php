<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Support\Str;
use App\Models\category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dashboard.posts.index',[
            'posts' =>post::where('user_id', auth()->user()->id)->get()
         ]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'title' => 'required|max:500',
        'slug' => 'required|unique:posts',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $validatedData['user_id'] =auth()->user()->id;
        $validatedData['excerpt'] =Str::limit(strip_tags($request->body),200);

        post::create($validatedData);
        return redirect('/dashboard/posts')->with('success','berhasil diposting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories'=>category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules =[
        'title' => 'required|max:500',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
        ];
        
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] =$request->file('image')->store('post-image');
        }
        $validatedData['user_id'] =auth()->user()->id;
        $validatedData['excerpt'] =Str::limit(strip_tags($request->body),200);

        post::where('id',$post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'berhasil dihapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
