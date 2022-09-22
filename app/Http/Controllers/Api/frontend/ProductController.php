<?php


namespace App\Http\Controllers\Api\frontend;

use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Color;
use App\Models\Cupon;
use App\Models\review;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    const TRUE = "true";
    const FALSE= "false";
    public function  product_by_cat($id)
    {
        $product = Product::where('subcategory_id', $id)->with(['img','rating','wishlist'])->get();
        if ($product) {
            return Helper::setresponse(Self::TRUE, $product, "",200);
        } else {
            return Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
    public function product_detail(Request $request,$id)
    {
        $product = Product::find($id);
        $product = Product::with(['productimage','rating'])->whereIn('id', $product)->get();
        if ($product) {
            return  Helper::setresponse(Self::TRUE, $product, "",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
    function search($name)
    {
        $result = Product::where('name', 'LIKE', '%'. $name. '%')->with(['img','rating'])->get();
        if (count($result)) {
            return  Helper::setresponse(Self::TRUE, $result, "",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }

    public function rating(Request $request,$id)
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
        $rating=Rating::where(['product_id'=> $id,'user_id' =>auth('api')->user()->id])->first();
        if($rating){
        $product = Product::find($id);
        $rating->user_id=auth('api')->user()->id;
        $rating->product_id=$product->id;
        $rating->stars_rated=$request->stars_rated;
            $rating->update();
            return  Helper::responseWithMessage(Self::TRUE, $rating, 'rating update successfully.',200);
        }
        $product = Product::find($id);
        $rating= new Rating();
        $rating->user_id=auth('api')->user()->id;
        $rating->product_id=$product->id;
        $rating->stars_rated=$request->stars_rated;
        $rating->save();
        if ($rating) {
            return  Helper::setresponse(Self::TRUE, $rating, "rating added successfully");
        }
    }
    public function review(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'Message' => 'required',
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
        $review=new  review();
        $review->user_id=auth('api')->user()->id;
        $review->product_id=$product->id;
        $review->subject=$request->subject;
        $review->Message=$request->Message;
        $review->Email=$request->Email;
        $review->Name=$request->Name;
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
        // if ($request->colors != null) {
        //     $colors = [];
        //     $color_id = implode(",", $request->colors);
        //     $color_idexplode = explode(",", $color_id);
        //     foreach ($color_idexplode as $color) {
        //         array_push($colors, $color);
        //     }
        // }
        $filter_min_price = $request->min_price;
        $filter_max_price = $request->max_price;
        $range = [$filter_min_price, $filter_max_price];
         $color_id=$request->color_id;
        $size_id=$request->size_id;
        $category_id=$request->category_id;
        $category=Subcategory::orWhere('category_id',$category_id)->get();
        $products = Product::orWhere('color_id',$color_id)
        ->orWhere('size_id',$size_id)
        ->orWhere('subcategory_id',$category_id)
        ->orwhereBetween('price', $range)->with('img','rating','wishlist')
        ->get();
        if ($products) {
            return  Helper::setresponse(Self::TRUE, $products, "false",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
    }
       public function color(Request $request)
       {
        $color=new Color();
        $color->color = $request->color;
        $color->color_code = $request->color_code;
        $color->save();
        if($color)
        {
            return  Helper::setresponse(Self::TRUE, $color, "",200);
        }
        else{
         return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
        }
        public function getcolor(Request $request)
        {
            $color = Color::all();

        if ($color) {
            return  Helper::setresponse(Self::TRUE, $color, "false",200);
        } else {
            return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
        }
        public function updateColor(Request $request,$id)
{
        $color=Color::find($id);
        $color->color = $request->color;
        $color->color_code = $request->color_code;
        $color->update();
        if($color)
        {
            return  Helper::setresponse(Self::TRUE, $color, "",200);
        }
        else{
         return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
        }
        public function delete_color(Request $request,$id)
{
    $color = Color::find($id);
    if ($color) {
        $color->delete();
        return response()->json(['message' => 'color deleted successfully'],200);
    } else {
        return response()->json(['message' => 'no color found'],404);
    }
        }


        public function size(Request $request)
       {
        $size=new Size();
        $size->size = $request->size;
        $size->save();
        if($size)
        {
            return  Helper::setresponse(Self::TRUE, $size, "",200);
        }
        else{
         return  Helper::setresponse(Self::FALSE, "", "no data found ",404);
        }
        }
   public function getsize(Request $request)
        {
            $size = Size::all();
        if ($size) {
            return  Helper::setresponse(Self::TRUE, $size, "false",200);
        } else {
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




