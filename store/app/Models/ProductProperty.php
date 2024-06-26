<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'value'];

    /**
     * Get the product that owns the property.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
