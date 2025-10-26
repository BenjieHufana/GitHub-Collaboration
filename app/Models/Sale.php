<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'total_price', 'customer', 'sold_at'];

    // A sale belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
