<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable =[
      'user_id',
      'product_id',
      'stars_rated'
    ];

    protected $hidden=[
       'updated_at',
       'created_at'
    ];
    public function rating()
      {
          return $this->hasOne(Rating::class,'product_id');
      }
}
