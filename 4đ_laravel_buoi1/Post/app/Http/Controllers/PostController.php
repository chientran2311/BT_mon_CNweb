<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    // trả lời rõ về phần model nhaast là phần về quan hệ giữa các bảng belongto

// nếu validate k thành công thì nó sẽ mắc kẹt trong validate và k chạy khỏi đc function store và update và back về trang trước đ
// dùng alert thì phải ví dụ sửa dòng nào hiển thị alert dòng đó
// xóa sử dụng xác nhận thì phải học về confirm hoặc modal như cách của thầy là sử dụng bao nhiêu bản ghi thì có bấy nhiêu nút xóa tức có bấy nhiêu modal
// tức học gì làm gì phải hiểu hết tường tận hàm laravel làm gì thực hiện gì của cái gì


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'title'=> 'required|max:255',
          'content'=> 'required|max:255',
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
          ]);
        $posts = Post::find($id);
        $posts->update($request->all());
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }
}
