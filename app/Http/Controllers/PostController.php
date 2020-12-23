<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        $post->name = $request->name;
        $post->user_id = Auth::id();
        $result = $post->save();
        if($result){
            return redirect()->route('posts.create')->with('mess', 'Thêm mới bài Post thành công');
        }else {
            return redirect()->route('posts.create')->with('mess', 'Thêm mới bài Post thất bại');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);
        $post->name = $request->name;
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        $result = $post->save();
        if($result) {
            return redirect()->route('posts.index')->with('mess', 'Sửa bài viết thành công');
        }else {
            return redirect()->back()->with('mess', 'Sửa bài viết thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $result = $post->delete();
        if($result) {
            return redirect()->route('posts.index')->with('mess', 'Xóa bài viết thành công');
        }else {
            return redirect()->back()->with('mess', 'Sửa bài viết thất bại');;
        }
    }
}
