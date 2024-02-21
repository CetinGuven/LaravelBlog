<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request) {

            $category_ekle=new Category();
            $category_ekle->name=$request->name;
            $category_ekle->save();
            $categories=Category::All();
            return view('Category.index',compact('categories'));
    }
    public function create() {
            $categories=Category::All();
            return view('Category.index',compact('categories'));
    }

    public function update(Request $request,$id = null) {
            $kategori = Category::where('id',$id)->first();
            $kategori->name=$request->input('name');
            $kategori->save();
            $categories=Category::all();
            return view('Category.index',compact('categories'));
    }
    public function delete($id = null) {
            Category::findOrFail($id)->delete();
            return redirect()->action([CategoryController::class, 'create']);
        }
    }

