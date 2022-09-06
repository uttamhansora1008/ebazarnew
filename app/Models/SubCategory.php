<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'status	',
        
    ];
    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at',
   ];
   public function image()
   {
       return $this->hasOne(Image::class,'product_id');
   }
   public function productimage()
   {
       return $this->hasMany(Image::class,'product_id');
   }
}
