<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected  $fillable = [
        'property_id',
        'bedrooms',
        'bathrooms',
        'sqft',
        'price',
        'price_sqft',
        'property_category',
        'status',

    ];
}
