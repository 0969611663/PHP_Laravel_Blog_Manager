<?php

namespace App\Http\Controllers;

use App\Model\ListBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $blogs = ListBlog::all();
        return view('blog.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $blog = new ListBlog();
        $blog->name = $request->input('name');
        $blog->author = $request->input('author');
        $blog->publish = $request->input('publish');
        $blog->content = $request->input('content');

        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }

        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công Blog');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('blog_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $blog = ListBlog::find($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $blog = ListBlog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = ListBlog::findOrFail($id);
        $blog->name = $request->input('name');
        $blog->content = $request->input('content');

        //cap nhat anh
        if ($request->hasFile('image')) {
            //xoa anh cu neu co
            $currentImg = $blog->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }

        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('blog_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $blog = ListBlog::FindOrFail($id);
        $image = $blog->image;

        //delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $blog->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach task
        return redirect()->route('blog_index');
    }
}
