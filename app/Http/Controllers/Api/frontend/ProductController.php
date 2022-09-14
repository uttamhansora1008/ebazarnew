<?php

namespace App\Http\Controllers\Api\frontend;

use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Color;
use App\Models\Cupon;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    const TRUE = "true";
    const FALSE= "false";
    public function  product_by_cat($id)
    {
        $product = Product::where('subcategory_id', $id)->with('img')->get();
        if ($product) {
            return Helper::setresponse(Self::TRUE, $product, "",200);
        } else {
            return Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
    public function product_detail(Request $request,$id)
    {
        $product = Product::find($id);
        $product = Product::with('img')->whereIn('id', $product)->get();
        if ($product) {
            return  Helper::setresponse(Self::TRUE, $product, "",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
    function search($name)
    {
        $result = Product::where('name', 'LIKE', '%'. $name. '%')->with('img')->get();
        if (count($result)) {
            return  Helper::setresponse(Self::TRUE, $result, "",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }

    public function rating(Request $request,  $id)
    {
        $validator =  Validator::make($request->all(), [
            'stars_rated' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                "flag" => Self::FALSE,
                "message" => $validator->errors()->first(),
                "error" => 'validation_error',
            ], 422);
        }
        $product = Product::find($id);
        $rating= new Rating();
        $rating->user_id=$request->user()->id;
        $rating->product_id=$product->id;
        $rating->stars_rated=$request->stars_rated;
        $rating->save();
        if($rating) {
            return  Helper::setresponse(Self::TRUE, $rating, "",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
    public function review(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'review' => 'required',
            'image.*' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                "flag" => Self::FALSE,
                "message" => $validator->errors()->first(),
                "error" => 'validation_error',
            ], 422);
        }
        $product = Product::find($id);
        $review=new  Reviews();
        $review->user_id=$request->user()->id;
        $review->product_id=$product->id;
        $review->review=$request->review;
        $images = $request->file('image');
        if ($images) {
            $filename = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(storage_path('app/public/review'), $filename);
            $review->image = $filename;
            $review->save();
        }
       if($review){
        return  Helper::setresponse(Self::TRUE, $review, "",200);
       }
       else{
        return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
       }
    }
    public function product(Request $request)
    {
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $filter_min_price = $request->min_price;
        $filter_max_price = $request->max_price;
        $range = [$filter_min_price, $filter_max_price];
        $products = Product::query()->whereBetween('price', $range)->get();

        if($filter_min_price && $filter_max_price){
                    if($filter_min_price > 0 && $filter_max_price > 0)
                    {
                        $products = Product::all()->whereBetween('price', [$filter_min_price, $filter_max_price]);
                    }
                } else {
                    $products = Product::with('image')->get();
                }
            return response()->json(['products'=>$products,'min_price'=>$min_price,'max_price'=>$max_price,'filter_min_price'=>$filter_min_price,'filter_max_price'=>$filter_max_price]);
        }
       public function color(Request $request)
       {
        $color=new Color();
        $color->color = $request->color;
        $color->save();
        if($color)
        {
            return  Helper::setresponse(Self::TRUE, $color, "",200);
        }
        else{
         return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
        }

     public function cupon(Request $request)
        {
            $cupon = Cupon::all();

        if ($cupon) {
            return  Helper::setresponse(Self::TRUE, $cupon, "false",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
        }
}
