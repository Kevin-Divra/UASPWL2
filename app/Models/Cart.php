<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; // Use custom table name
    protected $fillable = ['id_user'];

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class, 'id_cart');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


