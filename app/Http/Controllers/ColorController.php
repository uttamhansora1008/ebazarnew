<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::all();
        return view('admin.color', compact('color'));
    }
    public function create()
    {
        return view('admin.add-color');
    }
    public function store(Request $request)
    {
      $validatedData = $request->validate([
            'color' => 'required',
        
          ]);
        $color = new Color();
        $color->color = $request->input('color');
     
        $color->save();
        return redirect()->route('color.index');
    }
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.edit-color', compact('color'));
    }
    public function update(Request $request, $id)
    { 
        $color = Color::find($id);
        $color->color = $request->input('color');
    
        $color->update();
        return redirect()->route('color.index');
    }
    public function delete($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('color.index');
    }
}
