<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Show All blogs
     */
    public function index(){
        $blogs = Blog::all();
        return view('blogs.index',[
            'blogs' => $blogs
        ]);
    }

    /**
     * show a form for creating new blog
     */
    public function create(){
        return view('blogs.create');
    }
    /**
     * store a blog into database
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);
        Blog::create([
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,
        ]);
        return back()->with('blog_create_success','Blog Created Successfully');
    }

    /**
     * show a edit form for updating blog
     */
    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.edit',[
            'blog' => $blog
        ]);
    }
    /**
     * update a blog
     */
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);
        Blog::where('id',$id)->update([
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,
        ]);
        return back()->with('blog_update_success','Blog Updated Successfully');
    }

    /**
     * show a blog
     */
    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.show',[
            'blog' => $blog
        ]);
    }

    /**
     * destroy a blog
     */
    public function destroy($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->with('blog_delete_success','Blog Deleted Successfully');
    }
}
