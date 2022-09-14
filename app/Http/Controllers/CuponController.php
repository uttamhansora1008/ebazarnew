<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Cupon;
class CuponController extends Controller
{
    public function index()
    {
        $cupon = Cupon::all();
        return view('admin.cupon', compact('cupon'));
    }
    public function create()
    {
        return view('admin.add-cupon');
    }
    public function store(Request $request)
    {
      $validatedData = $request->validate([
            'cupon_name' => 'required',
           'min_price' =>'required',
           'percentage' =>'required',
           'expire_date' =>'required',
           'description' =>'required',  
          ]);
        $cupon = new Cupon();
        $cupon->cupon_name = $request->input('cupon_name');
        $cupon->min_price= $request->input('min_price');
        $cupon->percentage = $request->input('percentage');
        $cupon->expire_date = $request->input('expire_date');
        $cupon->description = $request->input('description');
        $cupon->save();
        return redirect()->route('cupon.index');
    }
    public function edit($id)
    {
        $cupon = Cupon::find($id);
        return view('admin.edit-cupon', compact('cupon'));
    }
    public function update(Request $request, $id)
    { 
        $cupon = Cupon::find($id);
        $cupon->cupon_name = $request->input('cupon_name');
        $cupon->min_price= $request->input('min_price');
        $cupon->percentage = $request->input('percentage');
        $cupon->expire_date = $request->input('expire_date');
        $cupon->description = $request->input('description');
        $cupon->update();
        return redirect()->route('cupon.index');
    }
    public function delete($id)
    {
        $cupon = Cupon::find($id);
        $cupon->delete();
        return redirect()->route('cupon.index');
    }
}
