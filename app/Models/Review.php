<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable=[
       'id',
'product_id',
'Name',
'Email',
'review',
'Message',
'image',
    ];
    protected $hidden=[
'updated_at',
'created_at'
    ];
    public function getImageAttribute($val)
    {
        return asset('storage/review/'.$val);
    }
}

