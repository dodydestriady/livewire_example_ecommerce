<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'stock',
        'description',
        'category_id',
        'price'
    ];

    protected static function boot() {
        parent::boot();
    
        static::creating(function ($product) {
            $product->slug = \Str::slug($product->name).'-'.date('his');
        });
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
