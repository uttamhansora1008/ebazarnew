<?php

namespace App\Http\Controllers\Api\frontend;

use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
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
    public function product_detail($id)
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
            'reviews' => 'required',
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
        $rating->reviews=$request->reviews;
        $rating->save();
        if($rating) {
            return  Helper::setresponse(Self::TRUE, $rating, "",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
}
