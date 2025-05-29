<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['sku', 'name','description', 'cost_in_gbp', 'stock', 'discontinued', 'created_at', 'updated_at'];
}
