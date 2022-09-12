<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable=[
            'id',
            'user_id',
            'product_id',
            'review',
            'image'
    ];
    protected $hidden=[
       'created_at',
       'updated_at',
    ];
}
