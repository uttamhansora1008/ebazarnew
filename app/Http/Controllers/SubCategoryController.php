<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function index()
    {
        $category = Subcategory::all();
        $subcategory = Subcategory::all();
        return view('admin.subcategory', compact('subcategory','category'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.add-subcategory', compact('category'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
          ]);
        $subcategory = new Subcategory();
        $subcategory->category_id=$request->category;
        $subcategory->name = $request->input('name');
        $subcategory->status = $request->input('status');
        // dd($request->file('image'));
        foreach ($request->file('image') as $image) {
            $filename = rand(3000,10000).'.'.$image->getClientOriginalExtension();
            $image = $image->move(storage_path('app/public/image'), $filename );
                        $subcategory->image = $filename;
                        $subcategory->save();
                    }
        return redirect()->route('subcategory.index');
    }
    public function edit($id)
    {
        $category = Category::all();
        $subcategory = Subcategory::find($id);
        return view('admin.edit-subcategory', compact('subcategory','category'));
    }
    public function update(Request $request, $id)
    {  
        $subcategory = Subcategory::find($id);
        $subcategory->category_id=$request->category;
        $subcategory->name = $request->input('name');
        $subcategory->status = $request->input('status');
        $subcategory->update();
        return redirect()->route('subcategory.index');
  }
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index');
    }
}

