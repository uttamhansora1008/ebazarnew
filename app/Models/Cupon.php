<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;
    protected $table = 'cupons';
    protected $fillable = [
        'cupon_name',
        'min_price',
        'percentage',
        'expire_date',
        'description',
    ];
    protected $hidden=[
'updated_at',
'created_at',
    ];
}
