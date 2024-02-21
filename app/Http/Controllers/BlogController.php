<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request) {

        $blog_ekle=new Blog();
        $blog_ekle->title=$request->title;
        $blog_ekle->article=$request->article;
        $blog_ekle->category_id = $request->category_id;
        $blog_ekle->save();
        $blogs=Blog::All();
        $categories=Category::All();
        return view('Blog.index',compact('blogs','categories'));
    }
    public function create() {
        $blogs=Blog::with('categori')->get();
        $categories=Category::All();

        return view('Blog.index',compact('blogs','categories'));
    }

    public function update(Request $request,$id = null) {
        $blog = Blog::where('id',$id)->first();
        $blog->title=$request->input('title');
        $blog->article=$request->input('article');
        $blog->category_id = $request->category_id;
        $blog->save();
        $blogs=Blog::all();
        return view('Blog.index',compact('blogs'));
    }
    public function delete($id = null) {
        Blog::findOrFail($id)->delete();
        return redirect()->action([BlogController::class, 'create']);
    }
}
