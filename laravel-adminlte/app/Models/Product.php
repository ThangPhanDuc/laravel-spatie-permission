<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'unit_price', 'discount', 'final_price', 'category_id', 'image', 'description'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
