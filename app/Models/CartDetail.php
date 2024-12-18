<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_detail'; // Use custom table name
    protected $fillable = ['id_cart', 'id_product', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}