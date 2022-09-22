<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'subcategory_id',
        'image',
        'price',
        'description',
        'discount',
    ];
    public function image()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function productimage()
    {
        return $this->hasMany(Image::class,'product_id');
    }
    public function img()
    {
        return $this->hasOne(Image::class,'product_id');
    }

        public function ratings()
        {
          return $this->hasMany(Rating::class);
        }
        public function color()
        {
          return $this->hasMany(Color::class);
        }
        public function rating()
        {
            return $this->hasOne(Rating::class,'product_id');
        }
        public function wishlist()
        {
            return $this->hasOne(Wishlist::class,'product_id');
        }
}
