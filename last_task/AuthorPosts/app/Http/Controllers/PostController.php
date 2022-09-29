<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\IncludeMedia;
use App\Http\Requests\StorePostsRequest;

class PostController extends Controller
{
    public function index()
    {
         $posts = Post::all();
         return view('all_posts',compact('posts'));
    }


    public function create()
    {
         return view('all_posts');
    }

    public function store(StorePostsRequest $request)
   {
        dd($request);
        $imageName = IncludeMedia::upload($request->file('image'),public_path('images\posts'));
        $data = $request->except('image');
        $data['image'] = $imageName;
        Post::create($data);
        return redirect()->route('all_posts')->with('success','Post Created Successfully');
   }


    public function delete($id)
   {
    $post = Post::findOrFail($id);
    IncludeMedia::delete(public_path("images\posts\\{$post->image}"));
    $post->delete();
    return redirect()->route('all_posts');
   }



}
