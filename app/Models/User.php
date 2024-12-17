<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserAddress;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // For admin or user
    ];

    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_user(){
        $sql = $this->select("user.*");
        return $sql;
    }
    
    public function address(){
        return $this->hasOne(UserAddress::class, 'id_user', 'id');
    }

    public function cart()
{
    return $this->hasMany(Cart::class, 'user_id');
}

}
